<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\InstaAccount;

use App\DataTables\InstaAccountDataTable;

use Crypt;

class InstaAccountController extends Controller
{
    public function __construct(InstaAccount $insta_account){
        $this->insta_account=$insta_account;
    }

    public function index(InstaAccountDataTable $dataTable){
        return $dataTable->render('insta_account.index');
    }

    public function create(){
    	return view('insta_account.create');
    }

    public function store(Request $request){
    	$request->validate([
	        'user_id' => 'required|unique:insta_accounts',
	        'password' => 'required|confirmed',
	        'password_confirmation'=>'required'
    	]);

        $this->insta_account->saveInstaAccount($insta_account,$request);

    }

    public function edit($id){
        $insta_account=InstaAccount::find($id);
        return view('insta_account.edit',compact('insta_account'));
    }

    public function update($id,Request $request){
        $request->validate([
            'user_id' => 'required|unique:insta_accounts,user_id,'.$id,
            'password' => 'required|confirmed',
            'password_confirmation'=>'required'
        ]);

        $insta_account=InstaAccount::find($id);

        $this->insta_account->saveInstaAccount($insta_account,$request);        

        return redirect()->route('instaaccount.index');
    }

    public function destroy($id){
        $insta_account=InstaAccount::find($id);
        $insta_account->delete();

        return redirect()->route('instaaccount.index');
    }


}
