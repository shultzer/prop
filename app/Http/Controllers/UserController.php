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


    public function searchform () {

        return view('user.searchform');
    }

    public function search ( Request $request ) {
        $inventory_number = $request->inventory_number;
        $pledgeholders = Pledgeholder::with([
            'realestateassets' => function( $query) use ( $inventory_number )
            {
                $query->where('inventory_number', $inventory_number)->get();
            },
        ])->get();
        $assets_under_pledge = Realestateasset::has('pledgeholder')->with('pledgeholder')->get();

        //dd($assets_under_pledge->pluck('name','inventory_number'));
        return view('user.searchresult', compact('assets_under_pledge'));
    }
}
