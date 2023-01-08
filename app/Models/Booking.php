<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Booking extends Model
{
    use HasFactory;
    public function index(){
        $booking = DB::table('bookings')
            ->join('staff','bookings.id_staff','=','staff.id')
            ->join('customers','bookings.id_customer','=','customers.id')
            ->join('rooms','bookings.id_room','=','rooms.id')
            ->join('services','bookings.id_service','=','services.id')
            ->select('bookings.*','rooms.room_name','staff.name_staff'
                ,'customers.name_customer','services.name_service')
            ->get();
        return $booking;
    }


    public function store($booking){
        DB::table('bookings')->insert([
            'booking_date' => $booking -> booking_date,
            'id_staff' =>   $booking -> name_staff,
            'id_customer' => $booking -> name_cus,
            'id_room' => $booking -> room,
            'id_service' => $booking -> id_service,
            'date_checkin' =>  $booking -> date_checkin,
            'date_checkout' =>$booking -> date_checkout,
            'day'=>$booking->day,
            'price_room' => $booking -> price_room,
            'price_service'=> $booking -> price_service,
            'total_price' => $booking -> total_price ,
            'status' => $booking -> status,
        ]);
    }

    public function edit($booking){
        DB::table('bookings') -> where('id','=',$booking->id)
            ->update([
                'room_name' =>   $booking -> room_name,
                'id_type_room' => $booking -> id_type_room,
            ]);
    }
    public function destroyer($booking){
        DB::table('bookings') -> delete($booking->id);
    }
    static function get_room_theo_type($id){
//        dd($id);
        $room_theo_type = DB::table('rooms')
            ->where('id_type_room', $id)
            ->orderBy('room_name','desc')
            ->get();
//        dd($room_theo_type);
        return $room_theo_type;
    }
    static function  get_price_theo_type($id){
        $get_price_theo_type = DB::table('room_types')
            ->where('id',$id)->orderBy('price')->get();
        return $get_price_theo_type;
    }
    static function  get_max_theo_type($id){
        $get_max_theo_type = DB::table('room_types')
            ->where('id',$id)->orderBy('max_person')->get();
        return $get_max_theo_type;
    }
    static function  get_price_theo_service($id){
        $get_price_theo_service = DB::table('services')
            ->where('id',$id)->orderBy('price')->get();
        return $get_price_theo_service;
    }
}
