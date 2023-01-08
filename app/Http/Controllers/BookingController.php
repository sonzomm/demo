<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Customer;
use App\Models\Room;
use App\Models\Room_type;
use App\Models\Service;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking =  new Booking();
        $bookings = $booking->index();
        return view('Booking.index',['booking'=> $bookings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staffs = Staff::get()->pluck('name_staff', 'id');
        $customers = Customer::get()->pluck('name_customer','id');
        $room_name = Room::get()->pluck('room_name','id');
        $type = Room_type::get()->pluck('name','id');
        $service = Service::get()->pluck('name_service','id');
        $booking = Booking::all();
        return view('Booking.create',
            compact('staffs','customers','room_name','type','service','booking'),
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingRequest $request)
    {
        $booking = new Booking();
        $day = Carbon::now();
        $booking -> booking_date = $day;
        $booking -> name_staff = $request -> name_staff;
        $booking -> name_cus = $request -> name_cus;
        $booking -> room = $request -> room;
        $booking -> id_service = $request -> id_service;
        $booking -> date_checkin = $request -> date_checkin;
        $booking -> date_checkout = $request -> date_checkout;
        $i=Carbon::create( $request -> date_checkout);
        $o=Carbon::create($request -> date_checkin);
        $booking -> day = $i->diffInDays($o);
        $booking -> price_room = $request -> price_room;
        $booking -> price_service = $request -> price_service;
        $booking -> total_price = ($booking->price_room * $booking->day)+$booking->price_service  ;
        $booking -> status = $request -> status;
        $booking -> store($booking);
//        dd($booking);
        return redirect()->route('booking.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookingRequest  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking -> destroyer($booking);
        return  Redirect::route('booking.index');
    }
    public function get_room_theo_type (Request $rq){
        $id = $rq->id;
        $room_theo_type = Booking::get_room_theo_type($id);
        $string_option = "<option value='0'>-Chọn room-</option>";
        foreach ($room_theo_type as $each) {
            $string_option .= "<option value='$each->id'>$each->room_name</option>";
        }
        echo $string_option;
    }
    static function get_price_theo_type(Request $request){
        $id = $request -> id;
        $price_theo_type = Booking::get_price_theo_type($id);
        $s  ="<h4 style='font-weight: bold'>Price :</h4>";
        foreach ($price_theo_type as $item){
            $s = "<h4>Price Room:$item->price</h4>";
        }
        echo $s;
    }
    static function get_price_theo_service(Request $request){
        $id = $request -> id;
        $price_theo_service = Booking::get_price_theo_service($id);
        $s  ="<h4 style='font-weight: bold'>Price service:</h4>";
        foreach ($price_theo_service as $item){
            $s = "<h4>Price service:$item->price</h4>";
        }
        echo $s;
    }
    static function get_max_theo_type(Request $request){
        $id = $request -> id;
        $max_theo_type = Booking::get_max_theo_type($id);
        $s  ="<label>Max Person</label>";
        foreach ($max_theo_type as $item){
            $s = "<label>max person:$item->max_person</label>";
        }
        echo $s;
    }

//    static function total(Request $request){
//        $id = $request -> id;
//        $price_theo_type = Booking::get_price_theo_type($id);
//        $price_theo_service = Booking::get_price_theo_service($id);
//        $s  ="<h4 style='font-weight: bold'>Price service:</h4>";
//        foreach ($price_theo_service as $price_theo_type){
//            $s = "<h4>Price service:$item->price </h4>";
//        }
//        echo $s;
//
//    }

}
