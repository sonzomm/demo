<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Room;
use App\Models\Room_type;
use Illuminate\Http\Request;

class Reservasion extends Controller
{
    public function index(){

        $customers = new Customer();// tạo đối tượng của model
        $customer = $customers ->index();
        $types = new Room_type();
        $type = $types -> index();
        $rooms = new Room();
        $room = $rooms -> index();
        return view('reservation.index',['rooms' => $room,'type'=>$type,'customer'=> $customer]);

    }
}
