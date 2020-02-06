<?php

namespace App\Http\Controllers;

use App\Models\Realestateasset;
use Illuminate\Http\Request;

class RealestateassetController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index () {
        $assets = Realestateasset::doesntHave('pledgeholder')->latest()->get();

        return response()->json($assets, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ( $asset ) {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store ( Request $request ) {
            $data = [
                'name' =>$request->name,
                'inventory_number'=>$request->inventory_number,
                'raion'=>$request->raion,
                'oblast'=> $request->oblast,
                'address'=>$request->address,
                'company_id' =>$request->company
            ];


       //return $request->company;
        if ( Realestateasset::create($data) ) {
            return response('created', 201);
        }
        else {
            return response('Wrong', 500);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Realestateasset $realestateasset
     *
     * @return \Illuminate\Http\Response
     */
    public function show ( Realestateasset $realestateasset ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Realestateasset $realestateasset
     *
     * @return \Illuminate\Http\Response
     */
    public function edit ( Realestateasset $realestateasset ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @param  \App\Models\Realestateasset $realestateasset
     *
     * @return \Illuminate\Http\Response
     */
    public function update ( Request $request, Realestateasset $realestateasset ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Realestateasset $realestateasset
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy ( Realestateasset $realestateasset ) {
        //
    }
}
