<?php

namespace App\Http\Controllers;

use App\Models\Service_type;
use App\Http\Requests\StoreService_typeRequest;
use App\Http\Requests\UpdateService_typeRequest;
use Illuminate\Support\Facades\Redirect;

class ServiceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service_type = new Service_type();
        $service_types = $service_type -> index();
        return view('service_type.index',['service_type' => $service_types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreService_typeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreService_typeRequest $request)
    {
        $service_type = new Service_type() ;
        $service_type -> type_service = $request -> type_service;
        $service_type -> store($service_type);
        return Redirect::route('service_type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service_type  $service_type
     * @return \Illuminate\Http\Response
     */
    public function show(Service_type $service_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service_type  $service_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Service_type $service_type)
    {
        return view('service_type.edit',['service_type' => $service_type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateService_typeRequest  $request
     * @param  \App\Models\Service_type  $service_type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateService_typeRequest $request, Service_type $service_type)
    {
        $service_type -> type_service = $request -> type_service;
        $service_type -> edit($service_type);
        return Redirect::route('service_type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service_type  $service_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service_type $service_type)
    {
        $service_type ->  destroyer($service_type);
        return Redirect::route('service_type.index');
    }
}
