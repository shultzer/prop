<?php

namespace App\Http\Controllers;

use App\Models\Pledgeholder;
use App\Models\Realestateasset;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct () {
        //$this->middleware('auth');
    }

    public function index (  ) {
        return view('user.index');
    }


    public function searchform () {

        return view('user.searchform');
    }

    public function search ( Request $request ) {
        $inventory_number = $request->inventory_number;

        $assets_under_pledge = Realestateasset::has('pledgeholder')->with('pledgeholder')->where('inventory_number', $inventory_number)->get();
        $request->flash();
        return view('user.searchresult', compact('assets_under_pledge'));
    }
}
