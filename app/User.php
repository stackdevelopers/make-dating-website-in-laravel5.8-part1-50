<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function details(){
        return $this->hasOne('App\UsersDetail','user_id');
    }

    public function photos(){
        return $this->hasMany('App\UsersPhoto','user_id');
    }

    public static function datingProfileExists($user_id){
        $datingCount = UsersDetail::select('user_id','status')->where(['user_id'=>$user_id,'status'=>1])->count();
        return $datingCount;
    }

    public static function datingProfileDetails($user_id){
        $datingProfile = UsersDetail::where('user_id',$user_id)->first();
        return $datingProfile;
    }

    public static function getName($user_id){
        $getName = User::select('name')->where('id',$user_id)->first();
        return $getName->name;
    }

    public static function getCity($user_id){
        $getCity = UsersDetail::select('city')->where('user_id',$user_id)->first();
        return $getCity->city;
    }

    public static function getUsername($user_id){
        $getUsername = User::select('username')->where('id',$user_id)->first();
        return $getUsername->username;
    }
}
