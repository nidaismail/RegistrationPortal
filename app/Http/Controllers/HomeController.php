<?php

namespace App\Http\Controllers;

use App\Models\PreRegistration;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        // Check the user ID and filter pre-registrations accordingly
        if ($user->id === 1) {
            // Show registrations that include "MLT"
            $preRegistrations = PreRegistration::where('programs', 'like', '%BS MLT%')->get();
        } elseif ($user->id === 2) {
            // Show registrations that include "DPT"
            $preRegistrations = PreRegistration::where('programs', 'like', '%DPT%')->get();
        } elseif ($user->id === 3) {
            // Show registrations that include "BSN"
            $preRegistrations = PreRegistration::where('programs', 'like', '%BSN%')->get();
        } elseif ($user->id === 4) {
            // Show registrations that include "Post RN"
            $preRegistrations = PreRegistration::where('programs', 'like', '%POST RN-BSN%')->get();
        } else {
            // Show nothing
            $preRegistrations = collect(); // Returns an empty collection
        }

        // Retrieve and sort users
        $persons = User::all()->sortBy(function ($person) {
            return $person->name;
        });

        return view('home', compact('user', 'persons', 'preRegistrations'));
    }

}
