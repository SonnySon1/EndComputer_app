<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // index view
    public function index() {
        $users = User::where('role', '!=', '3')->get();
        return view('pages.users.index', compact('users'));
    }



    // create view
    public function create(){
        return view('pages.users.create');
    }



    // store process
    public function store(Request $request){
       try {
             $request->validate([
                'name'              => 'required', 
                'address'           => 'required',  
                'phonenumber'       => 'required',  
                'email'             => 'required|unique:users,email',
                'role'              => 'required', 
                'status'            => 'required',
                'password'          => 'required', 
                'confirm_password'  => 'required',  
            ]);

            if ($request->password != $request->confirm_password) {
                return redirect()->back()->with('error', 'Password and Confirm Password must be same');
            }

            $storeDataUser = [
                'image'         => 'default.png',
                'name'          => $request->name,
                'address'       => $request->address,
                'phonenumber'   => $request->phonenumber,
                'email'         => $request->email,
                'role'          => $request->role,
                'is_active'     => $request->status,
                'password'      => $request->password,
            ];

            User::create($storeDataUser);

            return redirect()->route('users.index')->with('success', 'User Created Successfully');
       } catch (\Throwable $th) {
            return redirect()->back()->with('errors', $th->getMessage());
       }
    }
    


    // edit view
    public function edit($id){
        $user = User::find($id);
        return view('pages.users.edit', compact('user'));
    }


    
    // update process
    public function update(Request $request, $id){
        
    }
}
