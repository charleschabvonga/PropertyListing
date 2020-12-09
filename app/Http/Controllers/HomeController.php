<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole('Buyer'))
        {
            $properties = Property::orderBy('created_at', 'desc')
                ->where('is_paid', true)
                ->where('buyer_id', auth()->user()->id)
                ->paginate(5);
        }
        else {
            $properties = Property::orderBy('created_at', 'desc')
                ->where('user_id', auth()->user()->id)
                ->paginate(5);
        }
        return view('/home')->with('properties', $properties);
    }
}
