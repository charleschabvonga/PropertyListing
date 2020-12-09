<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole('Buyer'))
        {
            $properties = Property::orderBy('created_at', 'desc')
                ->where('is_paid', false)->paginate(5);
        }
        else {
            $properties = Property::orderBy('created_at', 'desc')->paginate(5);
        }
        return view('property.index')->with('properties', $properties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $user = auth()->user();
        return view('property.create')
            ->with('user', $user)
            ->with('property', (new Property()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'image' => 'image|nullable|max:1999',
            'price' => 'required',
        ]);

        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            request()->image->move(public_path('images'), $fileNameToStore);
        }else {
            $fileNameToStore = 'noimage.png';
        }

        $property = new Property;
        $property->user_id = auth()->user()->id;
        $property->name = $request->input('name');
        $property->description = $request->input('description');
        $property->body = $request->input('body');
        $property->address = $request->input('address');
        $property->price = $request->input('price');
        $property->is_paid = $request->input('is_paid', false);
        $property->image = $fileNameToStore;
        $property->save();

        if($validatedData){
            $request->session()->flash('success', $property->name . ' ' . '\'s details have been added.');
        }else{
            $request->session()->flash('error', 'There was an error updating the property listing.');
        }

        return redirect()->action('PropertyController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param Property $property
     * @return Response
     */
    public function show(Property $property)
    {
        return view('property.show')
            ->with('property', $property);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Property $property
     * @return Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Property $property
     * @return Response
     */
    public function update(Request $request, Property $property)
    {

        $property = Property::find($property->id);

        $property->is_winner = true;

        if($property->save()){
            $request->session()->flash('success', $property->name . ' ' . '\'s bid has been accepted.');
        }else{
            $request->session()->flash('error', 'There was an error updating the property winning bidder.');
        }

        return redirect()->action('BidController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Property $property
     * @return Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
