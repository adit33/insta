<?php

namespace App\Models;

use Crypt;

use Illuminate\Database\Eloquent\Model;

class InstaAccount extends Model
{
    protected $table='insta_accounts';
    protected $fillable=['user_id','password'];

    public function saveInstaAccount($insta_account,$request){
    	$insta_account->user_id=$request->input('user_id');
    	$insta_account->password=Crypt::encrypt($request->input('password'));
    	$insta_account->save();
    }
}
