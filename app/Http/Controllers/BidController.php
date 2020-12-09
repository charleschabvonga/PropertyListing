<?php

namespace App\Http\Controllers;

use App\bid;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BidController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param null $property_id
     * @return Factory|View
     */
    public function __invoke(Request $request, $property_id = null)
    {
        if(isset($property_id)){
            $bids = Bid::orderBy('bid_amount', 'desc')->where('property_id', $property_id)->paginate(5);
        } else{
            $bids = Bid::orderBy('created_at', 'desc')->paginate(5);
        }
        return view('bid.index', ['bids' => $bids]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $bids = Bid::orderBy('created_at', 'desc')->paginate(5);

        return view('bid.index')
            ->with('bids', $bids);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $user = auth()->user();
        return view('bid.create')
            ->with('user', $user)
            ->with('bid', (new Bid()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bid_amount' => 'required',
            'property_id' => 'required',
        ]);

        $bid = new Bid;
        $bid->bid_amount = $request->input('bid_amount');
        $bid->property_id = $request->input('property_id');
        $bid->user_id = auth()->user()->id;
        $bid->save();

        if($validatedData){
            $request->session()->flash('success', 'Bid details have been added.');
        }else{
            $request->session()->flash('error', 'There was an error while recording the bidding details.');
        }

        return redirect()->action('BidController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\bid  $bid
     * @return Response
     */
    public function show(Bid $bid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bid  $bid
     * @return Response
     */
    public function edit(Bid $bid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bid  $bid
     * @return Response
     */
    public function update(Request $request, Bid $bid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bid  $bid
     * @return Response
     */
    public function destroy(Bid $bid)
    {
        //
    }
}
