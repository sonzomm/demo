<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Service_type extends Model
{
    use HasFactory;
    public function index(){
       $service_type = DB::table('service_types') ->get();
       return $service_type;
    }

    public function store($service_type)
    {
        DB::table('service_types')->insert([
            'type' => $service_type-> type_service,

        ]);

    }
    public function edit($service_type)
    {
        DB::table('service_types')->where('id', '=', $service_type->id)->update([
            'type' => $service_type-> type_service,
        ]);

    }
    public  function  destroyer($service_type)
    {
        DB::table('service_types')->delete($service_type -> id);
    }
}
