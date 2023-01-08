<?php

namespace App\Http\Controllers;

use App\Models\Room_type;
use App\Http\Requests\StoreRoom_typeRequest;
use App\Http\Requests\UpdateRoom_typeRequest;
use Illuminate\Support\Facades\Redirect;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = new Room_type();
        $type = $types -> index();
        return view('room_type.index',['type'=>$type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoom_typeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoom_typeRequest $request)
    {
        $type = new Room_type();
        $type -> name = $request -> name;
        $type -> price = $request -> price;
        $type -> max_person = $request -> max_person;
        $type -> store($type);
        return Redirect::route('type.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room_type  $room_type
     * @return \Illuminate\Http\Response
     */
    public function show(Room_type $room_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room_type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Room_type $type)
    {

        return view('room_type.edit',['type' => $type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoom_typeRequest  $request
     * @param  \App\Models\Room_type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoom_typeRequest $request, Room_type $type)
    {
        $type -> name = $request -> name;
        $type -> price = $request -> price;
        $type -> max_person = $request -> max_person;
        $type -> edit($type);
        return Redirect::route('type.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room_type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room_type $type)
    {
        $type ->  destroyer($type);
        return Redirect::route('type.index');

    }
}
