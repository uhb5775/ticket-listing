<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use PDF;
use Redirect,Response,DB,Config;
// use Datatables;
use Yajra\Datatables\Datatables;


class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $listings = Listing::all();
        // return view('orders', compact('listings','orders'));}
        $orders = Order::all();
        $orders = Order::orderBy('created_at', 'DESC')->paginate(10); //order desc// ->paginate(3) or / ->get()
        return view('orders', compact('orders'));}

        public function ordersList()
        {
            $ordersQuery = Order::query();
 
        $start_date = (!empty($_GET["start_date"])) ? ($_GET["start_date"]) : ('');
        $end_date = (!empty($_GET["end_date"])) ? ($_GET["end_date"]) : ('');
 
        if($start_date && $end_date){
 
         $start_date = date('Y-m-d', strtotime($start_date));
         $end_date = date('Y-m-d', strtotime($end_date));
 
         $ordersQuery->whereRaw("date(orders.created_at) >= '" . $start_date . "' AND date(orders.created_at) <= '" . $end_date . "'");
        }
        $orders = $ordersQuery->select('*');
        return datatables()->of($orders) 
            ->make(true);
        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_order');
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
            'ename' => 'nullable',
            'location' => 'nullable',
            'event' => 'nullable',
            'info' => 'nullable',
            'price' => 'required',
            'quantity' => 'required',
            'total' => 'required',
            'created_at' => 'nullable',
        
        ]);    
        $order = new Order();
        $order->user_id = Auth::id();
        $order->ename = $request->input('ename');
        $order->location = $request->input('location');
        $order->event = $request->input('event');
        $order->info = $request->input('info');
        $order->price = $request->input('price');
        $order->quantity = $request->input('quantity');
        $order->total = $request->input('total');
        $order->date = $request->input('created_at');
        $order->save();

        $OrdersNewID = $order->id;
        return redirect()->to('/orders/'.$OrdersNewID)->with('success', 'Order created successfully.');
        }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $listing = Listing::find($id);

        return view('show_order')
        ->with('order', $order)
        ->with('listing', $listing);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
