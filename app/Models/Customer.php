<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;
    public function index(){
        $customer = DB::table('customers')->get();
        return $customer;
    }
    public function store($customer){
        DB::table('customers')->insert([
            'name_customer' =>    $customer -> name,
            'phone' =>   $customer -> phone,
            'address' => $customer -> address,
            'gender' =>  $customer -> gender,
            'idcard' =>  $customer -> idcard,
        ]);
    }
    public function edit($customer){
        DB::table('customers') -> where('id','=',$customer->id)
            ->update([
                'name_customer' =>   $customer -> name,
            'phone' =>  $customer -> phone,
            'address' => $customer -> address,
            'gender' => $customer -> gender,
            'idcard' =>  $customer -> idcard,
            ]);
    }
    public function destroyer($customer){
        DB::table('customers') -> delete($customer->id);
    }

}
