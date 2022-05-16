<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function viewProfile(){
        $account = Auth::user();
        $genders = Gender::all();
        $roles = Role::all();
        return view('profile',[
            'account' => $account,
            'genders' => $genders,
            'roles' => $roles
        ]);
    }

    public function updateProfile(Request $request){
        $account = Account::find($request->id);
        $rules = [
            'first_name' => 'required|alpha_num|max:25',
            'middle_name' => 'max:25',
            'last_name' => 'required|alpha_num|max:25',
            'gender_id' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
            'display_picture_link' => 'mimes:jpeg,jpg,png|image'
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $account->first_name = $request->first_name;
        $account->middle_name = $request->middle_name;
        $account->last_name = $request->last_name;
        $account->gender_id = $request->gender_id;
        $account->email = $request->email;
        $account->password = Hash::make($request->password);
        $file = $request->file('display_picture_link');

        if($file != null){
            $imageName = time().".".$file->getClientOriginalExtension();
            Storage::putFileAs('public/images',$file,$imageName);

            Storage::delete('public/'.$account->display_picture_link);
            $account->display_picture_link = 'images/'.$imageName;
        }
        else{
            $request->display_picture_link = $account->display_picture_link;
        }

        $account->save();

        return redirect('/saved');
    }

    public function viewAccountMaintenance(Account $account){
        $accounts = Account::all();
        $role = $account->role;
        return view('accmaintenance',[
            'accounts' => $accounts,
            'role' => $role,
            'account' => $account
        ]);
    }

    public function deleteAccount(Request $request){
        $account = Account::find($request->id);

        if(isset($account)){
            $account->delete();
        }

        return redirect()->back();
    }

    public function viewUpdateRole($id){
        $account = Account::find($id);
        $roles = Role::all();
        return view('updaterole',[
            'account' => $account,
            'roles' => $roles
        ]);
    }

    public function updateRole(Request $request){
        $account = Account::find($request->id);

        $rules = [
            'role_id' => 'required'
        ];

        $account->role_id = $request->role_id;

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $account->save();

        return redirect('/saved');
    }
}
