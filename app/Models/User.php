<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function index(){
        $staff  = DB::table('users')->get();
        return $staff;

    }
    public function store($staffs){
        DB::table('users')->insert([
            'name' =>   $staffs -> name,
            'email' => $staffs -> email,
            'password' => $staffs -> password,
            'phone' =>  $staffs -> phone,
            'gender' =>$staffs -> gender,
            'birth' =>  $staffs -> birth,
            'role' =>  $staffs -> role,
        ]);
    }
    public function edit($staffs){
        DB::table('users') -> where('id','=',$staffs->id)
            ->update([ 'name' =>   $staffs -> name,
                'email' => $staffs -> email,
                'password' => $staffs -> password,
                'phone' =>  $staffs -> phone,
                'gender' =>$staffs -> gender,
                'birth' =>  $staffs -> birth,
                'role' =>  $staffs -> role,
            ]);
    }
    public function destroyer($staffs){
        DB::table('users') -> delete($staffs->id);
    }

}
