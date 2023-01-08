<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Room_type extends Model
{
    use HasFactory;
    public function index(){
        $type = DB::table('room_types')->get();
        return $type;
    }
    public function store($type){
        DB::table('room_types')->insert([
            'name' => $type -> name,
            'price' => $type -> price,
            'max_person' => $type -> max_person,
        ]);

    }
    public function edit($type){
        DB::table('room_types')->where('id','=',$type->id)-> update([
            'name' => $type -> name,
            'price' => $type -> price,
            'max_person' => $type -> max_person,
        ]);

    }
    public  function  destroyer($type)
    {
        DB::table('room_types')->delete($type -> id);
    }
}
