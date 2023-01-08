<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Room extends Model
{
    use HasFactory;
    public function index(){
        $room = DB::table('rooms')
            ->join('room_types','rooms.id_type_room','=','room_types.id')
            ->select('rooms.*','room_types.name')
            ->get();
        return $room;
    }
    public function store($rooms){
        DB::table('rooms')->insert([
            'room_name' => $rooms -> room_name,
            'status' => $rooms -> status,
            'id_type_room' => $rooms -> id_type_room,
        ]);
    }
    public function edit($rooms){
        DB::table('rooms') -> where('id','=',$rooms->id)
            ->update([
                'room_name' =>   $rooms -> room_name,
                'id_type_room' => $rooms -> id_type_room,
            ]);
    }
    public function destroyer($rooms){
        DB::table('rooms') -> delete($rooms->id);
    }
}
