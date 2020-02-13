<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Order;
use App\Models\Agent;
use App\Models\Location;
use App\Models\Wallet;
use App\Models\Sales;
use Illuminate\Support\Facades\Auth;
use PDF;
use Carbon\Carbon;
use Redirect;
use DB;

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
            'location_id' => 'nullable',
            'start_cash' => 'nullable',
            'end_cash' => 'nullable',
            ]);    
        $location = new Location();
        $location->location_id = $request->input('location_id');
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
        $locations = Location::find($id)->orders()->whereDate('created_at', '=', Carbon::today()->toDateString());
        $loc = Location::find($id);
        // $orders = Order::all();
        // $wallets = Wallet::all();
        $wallets = Location::find($id)->locsales()->whereDate('created_at', '=', Carbon::today()->toDateString());
        // ->whereRaw('Date(created_at) = CURDATE()')->get();
        $sales = Sales::all();
        // $sales = Sales::whereRaw('Date(created_at) = CURDATE()')->get();

        return view('location')
        ->with('sales', $sales)
        ->with('locations', $locations)
        ->with('wallets', $wallets)
        ->with('loc', $loc);
        // ->with('orders', $orders);
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
        $locations = Location::find($id);
        $loc = Location::find($id)->orders()->whereDate('created_at', '=', Carbon::today()->toDateString());

        // $orders = Order::where('event', '=', 'Lion King')->whereRaw('Date(created_at) = CURDATE()')->get();

        
        return view('edit_location')
        ->with('loc', $loc)
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
            'location_id' => 'nullable',
            'start_cash' => 'nullable',
            'end_cash' => 'nullable',
            'paid_in' => 'nullable',
            'paid_out' => 'nullable',

        ]);

        $location = Location::find($id);
        $location->location_id = $request->input('location_id');
        $location->start_cash = $request->input('start_cash');
        $location->end_cash = $request->input('end_cash');
        $location->paid_in = $request->input('paid_in');
        $location->paid_out = $request->input('paid_out');

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

    public function wallet($id)
    {
        $orders = Order::all()->where('created_at', '=', Carbon::today()->toDateString());
        $locations = Location::find($id);
        
        return view('delocation')
        ->with('locations', $locations)
        ->with('orders', $orders);
    }
    
    public function record(Request $request)
    {
        $this->validate($request, [
            'location_id' => 'nullable',
            'start_cash' => 'nullable',
            'paid_in' => 'nullable',
            'paid_out' => 'nullable',
            ]);    
        $wallet = new Wallet();
        $wallet->location_id = $request->input('location_id');
        $wallet->start_cash = $request->input('start_cash');
        $wallet->paid_in = $request->input('paid_in');
        $wallet->paid_out = $request->input('paid_out');
        $wallet->save();

        return redirect()->to('/index_wallet')->with('success', 'Record added successfully.');
        //->to('/location')
        }
        public function indexWallet()
        {
            $wallets = Wallet::all();
            $sales = Sales::all();
            $locations = Location::all();
     
            return view('index_wallet', compact('wallets', 'sales'));
        }












        
        public function drawer()
    {
        $agents = Agent::all();
        $orders =Order::all();
        
        $sales = Sales::all();
        $wallets = Wallet::all();
        $locations = Location::all();
       
        return view('drawer')
        ->with('agents', $agents)
        ->with('orders', $orders)
        ->with('locations', $locations)
        ->with('sales', $sales)
        ->with('wallets', $wallets);
    }
    public function post_drawer(Request $request)
    {
        $this->validate($request, [
            'location_id' => 'nullable',
            'start_cash' => 'nullable',
            'amount' => 'nullable',
            'paid_in' => 'nullable',
            'paid_out' => 'nullable',
            'paid_total' => 'nullable',

            // 'date' => 'nullable',
            ]);    
        $wallet = new Sales();
        // $wallet->date = $request->input('date');
        $wallet->location_id = $request->input('location_id');
        $wallet->start_cash = $request->input('start_cash');
        $wallet->amount = $request->input('amount');
        $wallet->paid_in = $request->input('paid_in');
        $wallet->paid_out = $request->input('paid_out');
        $wallet->paid_total = $request->input('paid_total');

        $wallet->save();
        return redirect()->to('/index_wallet')->with('success', 'Paid In/Out successfully.');
    }
}
