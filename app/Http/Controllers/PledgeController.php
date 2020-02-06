<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Movableasset;
use App\Models\Pledgeholder;
use App\Models\Realestateasset;
use Illuminate\Http\Request;

class PledgeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index () {
        $pledgeholders = Pledgeholder::all();

        return view('pledge.index', compact('pledgeholders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create ( Request $request ) {
        if ( Gate::denies('create', Pledgeholder::class) ) {
            return redirect()
                ->route('main')
                ->with([ 'message' => 'у вас нет  прав' ]);
        }
        $realestateassets = Realestateasset::all();
        $movableassets    = Movableasset::all();
        $companies        = Company::all();

        //dd($companies);
        return view('pledge.pledge_form', compact('realestateassets', 'movableassets', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store ( Request $request ) {

        if ( Gate::denies('create', Pledgeholder::class) ) {
            return redirect()
                ->route('main')
                ->with([ 'message' => 'у вас нет  прав' ]);
        }
        $assets       = Realestateasset::find($request->input('assets'));
        $pledgeholder = Pledgeholder::create($request->except('_token', 'assets'));
        foreach ( $assets as $asset ) {
            $asset->pledgeholder()->associate($pledgeholder);
            $asset->save();
        }

        return redirect('/pledge')->with('status', 'Запись сохранена');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pledgeholder $pledge_holder
     *
     * @return \Illuminate\Http\Response
     */
    public function show ( Pledgeholder $pledge_holder ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pledgeholder $pledge_holder
     *
     * @return \Illuminate\Http\Response
     */
    public function edit ( Pledgeholder $pledge_holder ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Pledgeholder $request
     * @param  \App\Models\Pledgeholder $pledge_holder
     *
     * @return \Illuminate\Http\Response
     */
    public function update ( Request $request, Pledgeholder $pledge_holder ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pledgeholder $pledge_holder
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy ( Pledgeholder $pledge_holder ) {
        //
    }
}
