<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Staff;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        $staffs = new User();// tạo đối tượng của model
        // nhan dl từ model gửi về
        $staff = $staffs->index();
        return view('staff.index',['staffs'=> $staff]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequestRequest $request)
    {
        $staffs = new User();
        $staffs -> name = $request -> name;
        $staffs -> email = $request -> email;
        $staffs -> password = $request -> password;
        $staffs -> phone = $request -> phone;
        $staffs -> gender = $request -> gender;
        $staffs -> birth = $request -> birth;
        $staffs -> role = $request -> role;
        $staffs ->store($staffs);
        return Redirect::route('hienthistaff');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        return view('staff.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $staff)
    {
        $staff -> name = $request -> name;
        $staff -> email = $request -> email;
        $staff -> password = $request -> password;
        $staff -> phone = $request -> phone;
        $staff -> gender = $request -> gender;
        $staff -> birth = $request -> birth;
        $staff -> role = $request -> role;
        $staff->edit($staff);
        return Redirect::route('hienthistaff');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $staff)
    {
        $staff -> destroyer($staff);
        return  Redirect::route('hienthistaff');
    }
}
