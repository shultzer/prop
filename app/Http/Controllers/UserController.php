<?php

namespace App\Http\Controllers;

use App\Models\Pledgeholder;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function searchform () {
        return view('user.searchform');
    }

    public function search ( Request $request ) {
        $inventory_number = $request->inventory_number;
        $assets_under_pledge = Pledgeholder::with([
            'realstateassets' => function( $query) use ( $inventory_number )
            {
                $query->where('inventory_number', $inventory_number)->get();
            },
        ]);
        dd($assets_under_pledge);
    }
}
