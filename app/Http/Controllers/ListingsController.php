<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Order;
use App\Models\Agent;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;
use PDF;
use Redirect;

class ListingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = Listing::all();
        $orders = Order::all();
        return view('index', compact('listings','orders'));
        // $listings = Listing::orderBy('created_at','desc')->get();
        // return view('index')->with('listings', $listings);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'event' => 'required',
            'date' => 'nullable',
            'price' => 'nullable',
            'info' => 'nullable',
            // 'total' => 'nullable',
        ]);
        $listing = new Listing();
        $listing->user_id = Auth::id();
        $listing->event = $request->input('event');
        // $listing->date = $request->input('date');
        // $listing->price = $request->input('price');
        // $listing->info = $request->input('info');
        // $listing->total = $request->input('total');
        $listing->save();

        return redirect()->to('/home')->with('success', 'Listing created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listings = Listing::find($id);
        $agents = Agent::all();
        $locations = Location::all();
        // $orders = Order::all();

         return view('show')
         ->with('listings', $listings)
        //  ->with('orders', $orders)
         ->with('agents', $agents)
         ->with('locations', $locations);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = Listing::find($id);
        // $agent = Agent::all();
    
        return view('edit')
        ->with('listing', $listing);
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
            'event' => 'required',
            'date' => 'required',
            'price' => 'required',
            'info' => 'required',
            // 'total' => 'nullable',
        ]);
        $listing = Listing::find($id);
        $listing->user_id = Auth::id();
        $listing->event = $request->input('event');
        $listing->date = $request->input('date');
        $listing->price = $request->input('price');
        $listing->info = $request->input('info');
        // $listing->total = $request->input('total');
        $listing->save();

        return redirect()->to('/home')->with('success', 'Listing edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing = Listing::find($id);
        $listing->delete();

        return redirect()->to('/home')->with('success', 'Listing created successfully.');
    }
}
