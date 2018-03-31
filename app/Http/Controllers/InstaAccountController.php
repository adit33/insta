<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\InstaAccount;

use Crypt;

class InstaAccountController extends Controller
{
    public function create(){
    	return view('insta_account.create');
    }

    public function store(Request $request){
    	$request->validate([
	        'user_id' => 'required|unique:insta_accounts',
	        'password' => 'required|confirmed',
	        'password_confirmation'=>'required'
    	]);

    	InstaAccount::create([
    		'user_id'=>$request->input('user_id'),
    		'password'=>Crypt::encrypt($request->input('password'))
    	]);
    }
}
