<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
	/*
	*To show the list of created/registered users
	*/
    public function index(){
    	$users = User::all();
        $i = 1;
    	return view('users.index', compact('users', 'i'));
    }

    public function create(){
    	return view('users.create');
    }

    public function login_form(){
    	return view('users.login');
    }

    public function show($id){
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function verify_mail($verify_code, $user_id){
        $user = User::find($user_id);
        if($user->verify_code == $verify_code){
            $user->email_verification = 1;
            $user->save();
            return view('home');
        }        
    }
    public function edit($user_id){
        $user = User::find($user_id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $user_id){
        $user = User::find($user_id);
        $file = $request->file('profile_pic');
            $filename_with_extension = $request->file('profile_pic')->getClientOriginalName();
            //To get only file name
            $filename = pathinfo($filename_with_extension, PATHINFO_FILENAME);
            //To get extension
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $filename_to_store = $user->unique_id."_".uniqid().".".$ext;
            $file->move(storage_path() . '/app/public/profile_pic', $filename_to_store); //original image

        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone' => ['required', 'numeric', 'digits:10']
        ]);
        
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->profile_pic = $filename_to_store;
        $user->save();
        return redirect()->back()->with('msg', "Profile updated successfully");

    }

    public function verify_email_view(){
        return view('email_verify');
    }
}
