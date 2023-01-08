<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class variation extends Model
{
    use HasFactory;
    public function index()
    {
        $variation = DB::table('variations')
            ->join('services','variations.id_servive','=','services.id')
            ->join('rooms','variations.id_room','=','rooms.id')
            ->join('service_types','variations.id_type_service','=','service_types.id')
            ->select('variations.*','services.name','rooms.room_name','service_types.type')
            ->get();
        return $variation;
    }
    public function store($variation){
        DB::table('variations')->insert([
            'id_room' =>   $variation -> id_room,
            'id_servive' => $variation -> id_servive,
            'id_type_service' => $variation -> id_type_service,
        ]);
    }
}
