<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Service_type;
use App\Models\variation;
use App\Http\Requests\StorevariationRequest;
use App\Http\Requests\UpdatevariationRequest;
use Illuminate\Support\Facades\Redirect;

class VariationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variation = new variation();
        $variations = $variation ->index();
        return view('Variation.index',['variation'=>$variations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::get()->pluck('name', 'id');
        $types = Service_type::get()->pluck('type', 'id');
        return view('Variation.create',compact('services'),compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorevariationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorevariationRequest $request)
    {
        $variation = new variation();
        $variation -> id_room = $request -> id_room;
        $variation -> id_servive = $request -> id_servive;
        $variation -> id_type_service = $request -> id_type_service;
        $variation -> store($variation);
        return Redirect::route('variation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function show(variation $variation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function edit(variation $variation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatevariationRequest  $request
     * @param  \App\Models\variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatevariationRequest $request, variation $variation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function destroy(variation $variation)
    {
        //
    }
}
