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
            'location_id' => 'required',
            ]);    
        $location = new Location();
        $location->location_id = $request->input('location_id');
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
    public function show($id) //location/id
    {
        $sales = Location::find($id)->salesz()->get();

        $locations = Location::find($id)->orders()
        ->where('added_to_drawer', 1)
        ->whereDate('created_at', '=', Carbon::today()->toDateString()); //show orders
        
        $wallets = Location::find($id)->locsales()
        ->where('added_to_drawer', 1)
        ->whereDate('created_at', '=', Carbon::today()->toDateString())
        ->get(); //show payments
        $loc = Location::find($id); //to show location name
        return view('location')
        ->with('sales', $sales)
        ->with('locations', $locations)
        ->with('wallets', $wallets)
        ->with('loc', $loc);
    }
  
    public function wallet($id) //location/id/up
    {
        $sales = Location::find($id)->salesz()->get();

        $locations = Location::find($id)->orders()
        ->where('added_to_drawer', 1);
        // ->whereDate('created_at', '=', Carbon::today()->toDateString()); //show orders
        
        $wallets = Location::find($id)->locsales()
        ->where('added_to_drawer', 1)
        // ->whereDate('created_at', '=', Carbon::today()->toDateString())
        ->get(); //show payments
        $loc = Location::find($id); //to show location name

        return view('edit_location')
        ->with('sales', $sales)
        ->with('locations', $locations)
        ->with('wallets', $wallets)
        ->with('loc', $loc);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $orders = Order::all();
    //     $locations = Location::find($id);
    //     $loc = Location::find($id)->orders()->whereDate('created_at', '=', Carbon::today()->toDateString());

    //     $orders = Order::where('event', '=', 'Lion King')->whereRaw('Date(created_at) = CURDATE()')->get();

        
    //     return view('edit_location')
    //     ->with('loc', $loc)
    //     ->with('locations', $locations)
    //     ->with('orders', $orders);
    // }

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
            'amount' => 'nullable',
            'paid_in' => 'nullable',
            'paid_out' => 'nullable',
            'paid_total' => 'nullable',
            ]);    
        // $wallet = Sales::find($id);
        $wallet = new Sales();
        $resetOrders = Location::find($id)->orders()->update(array('added_to_drawer' => 0)); //reset orders counting
        $resetPayments = Location::find($id)->locsales()->where('added_to_drawer', '=', '1')->delete(); //reset payments counting

        $wallet->location_id = $request->input('location_id');
        $wallet->start_cash = $request->input('start_cash');
        $wallet->amount = $request->input('amount');
        $wallet->paid_in = $request->input('paid_in');
        $wallet->paid_out = $request->input('paid_out');
        $wallet->paid_total = $request->input('paid_total');
        $wallet->save();
        return redirect()->to('/drawer')->with('success', 'Drawer closed successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::find($id);
        $location->delete();

        return redirect()->to('/location')->with('success', 'Location deleted successfully.');
    }
    public function start(Request $request)
    {
        $this->validate($request, [
            'location_id' => 'nullable',
            'start_cash' => 'nullable',
            'info' => 'nullable',

            ]);    
        $wallet = new Wallet();
        $wallet->location_id = $request->input('location_id');
        $wallet->start_cash = $request->input('start_cash');
        $wallet->info = $request->input('info');
        $wallet->save();

        return redirect()->to('/location')->with('success', 'Starting cash added succesfully.');
        }
    //Validation for In/Out payment
    public function record(Request $request)
    {
        $this->validate($request, [
            'location_id' => 'nullable',
            'start_cash' => 'nullable',
            'pay_in' => 'nullable',
            'pay_out' => 'nullable',
            'info' => 'nullable',

            ]);    
        $wallet = new Wallet();
        $wallet->location_id = $request->input('location_id');
        $wallet->start_cash = $request->input('start_cash');
        $wallet->pay_in = $request->input('pay_in');
        $wallet->pay_out = $request->input('pay_out');
        $wallet->info = $request->input('info');
        $wallet->save();

        return redirect()->back()->with('success', 'Successfully processed transaction!');
        //->to('/location')
        }
         
        // Make Pay IN/OUT
        public function drawer()
    {
        $locations = Location::all();
       
        return view('drawer')
        ->with('locations', $locations);
    }

//show maked orders and payments
public function indexWallet()
{
    $wallets = Wallet::all();
    $sales = Sales::all();
    // $sales = Sales::whereRaw('Date(created_at) = CURDATE()')->get();
    // $wallets = Wallet::whereRaw('Date(created_at) = CURDATE()')->get();
    return view('index_wallet', compact('wallets', 'sales'));
}
    // Page with table history of maked orders and pays
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
        return redirect()->back()->with('success', 'Submitted successfully.');
    }
}
