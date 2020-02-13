<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Order;
use App\Models\Agent;
use App\Models\Location;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use PDF;
use Redirect;

class LocationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['home']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index()
    {
        $locations = Location::all();
        // $locations = Location::where('location_name', '=', 'NC')->whereRaw('Date(created_at) = CURDATE()')->get();
 
        return view('show_locations', compact('locations'));}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_location');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'location_name' => 'required',
            'start_cash' => 'nullable',
            'end_cash' => 'nullable',
            ]);    
        $location = new Location();
        $location->location_name = $request->input('location_name');
        $location->start_cash = $request->input('start_cash');
        $location->end_cash = $request->input('end_cash');
        $location->save();

        return redirect()->to('/location')->with('success', 'Location added successfully.');
        //->to('/location')
        }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $locations = Location::find($id);
        $orders = Order::all();
        // $orders = Order::where('event', '=', 'Lion King')->whereRaw('Date(created_at) = CURDATE()')->get();
        
        // $orders = Order::where('location', '=', 'New York')->get();

        return view('location')
        ->with('locations', $locations)
        ->with('orders', $orders);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orders = Order::all();
        $orders = Order::where('event', '=', 'Lion King')->whereRaw('Date(created_at) = CURDATE()')->get();

        $locations = Location::find($id);
        
        return view('edit_location')
        ->with('locations', $locations)
        ->with('orders', $orders);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'location_name' => 'required',
            'start_cash' => 'nullable',
            'end_cash' => 'nullable',
        ]);

        $location = Location::find($id);
        $location->location_name = $request->input('location_name');
        $location->start_cash = $request->input('start_cash');
        $location->end_cash = $request->input('end_cash');
        $location->save();
        return redirect()->to('/location')->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /////////////////////////////////////////////////Wallet_locations
    public function chooseLocation($id)
    {
        $locations = Location::find($id);
        $orders = Order::all();

        if($location_name = NewYork ){
            $locations = $locations->where('location', '=', 'New York')->whereRaw('Date(created_at) = CURDATE()')->get();
        }
        if($locations = NC){
            $locations = $locations->where('location', '=', 'NC')->whereRaw('Date(created_at) = CURDATE()')->get();
        }
    }

    public function wallet($id)
    {
        $locations = Location::find($id);
        $wallets = Wallet::all();
        $orders = Order::all();
        $orders = Order::where('location', '=', 'Plovdiv')->whereRaw('Date(created_at) = CURDATE()')->get();
        // $orders = Order::where('location', '=', 'New York')->get();

        return view('wallet')
        ->with('locations', $locations)
        ->with('orders', $orders)
        ->with('wallets', $wallets);
    }
    public function wall2($id)
    {
        $locations = Location::find($id);
        $wallets = Wallet::all();
        $orders = Order::all();
        $orders = Order::where('location', '=', 'New York')->whereRaw('Date(created_at) = CURDATE()')->get();

        // $orders = Order::where('location', '=', 'New York')->get();

        return view('wallet')
        ->with('locations', $locations)
        ->with('orders', $orders)
        ->with('wallets', $wallets);
    }
    public function record(Request $request)
    {
        $this->validate($request, [
            'location' => 'nullable',
            'start_cash' => 'nullable',
            'end_cash' => 'nullable',
            ]);    
        $wallet = new Wallet();
        $wallet->location = $request->input('location');
        $wallet->start_cash = $request->input('start_cash');
        $wallet->end_cash = $request->input('end_cash');
        $wallet->save();

        return redirect()->to('/index_wallet')->with('success', 'Record added successfully.');
        //->to('/location')
        }
        public function indexWallet()
        {
            $wallets = Wallet::all();
            $locations = Location::all();
            // $locations = Location::where('location_name', '=', 'NC')->whereRaw('Date(created_at) = CURDATE()')->get();
     
            return view('index_wallet', compact('wallets'));
        }
}
