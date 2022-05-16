<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function viewRegister(){
        return view('auth.register',[
            'roles' => Role::all(),
            'genders' => Gender::all()
        ]);
    }

    public function store(Request $request){
        $rules = [
            'first_name' => 'required|alpha_num|max:25',
            'middle_name' => 'max:25',
            'last_name' => 'required|alpha_num|max:25',
            'role_id' => 'required',
            'gender_id' => 'required',
            'email' => 'required|email:dns|unique:accounts',
            'password' => 'required|min:8|alpha_num',
            'display_picture_link' => 'required|mimes:jpeg,jpg,png|image'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $file = $request->file('display_picture_link');
        $imageName = time() . '.' . $file->getClientOriginalExtension();
        
        Storage::putFileAs('public/images', $file, $imageName);

        $validatedData = $request->all();
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['display_picture_link'] = 'images/' . $imageName;

        Account::create($validatedData);

        return redirect()->intended('/login');
    }
}
