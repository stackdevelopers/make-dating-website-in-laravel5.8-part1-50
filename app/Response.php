<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Response extends Model
{
    public static function newResponsesCount(){
    	$receiver_id = Auth::user()->id;
    	$newResponsesCount = Response::where(['receiver_id'=>$receiver_id,'seen'=>0])->count();
    	return $newResponsesCount;	
    }
}
