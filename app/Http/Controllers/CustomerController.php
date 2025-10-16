<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // index view
    public function index() {
        $customers = User::where('role', '=', '3')->get();
        return view('pages.customers.index', compact('customers'));
    }



    // create view
    public function create(){
        return view('pages.customers.create');
    }



    // store process
    public function store(Request $request){
       try {
             $request->validate([
                'name'              => 'required', 
                'address'           => 'required',  
                'phonenumber'       => 'required',  
                'email'             => 'required|unique:users,email',
                'status'            => 'required',  
            ]);
            

            $storeDataUser = [
                'image'         => 'default.png',
                'name'          => $request->name,
                'address'       => $request->address,
                'phonenumber'   => $request->phonenumber,
                'email'         => $request->email,
                'role'          => 3,
                'is_active'     => $request->status,
                'password'      => bcrypt('customer123'),
            ];

            User::create($storeDataUser);

            return redirect()->route('customers.index')->with('success', 'Customer Created Successfully');
       } catch (\Throwable $th) {
            return redirect()->back()->with('errors', $th->getMessage());
       }
    }
    


    // edit view
    public function edit($id){
        $customer = User::find($id);
        return view('pages.customers.edit', compact('customer'));
    }


    
    // update process
    public function update(Request $request, $id){
        try {
            $user = User::find($id);
             $request->validate([
                'name'              => 'required', 
                'address'           => 'required',  
                'phonenumber'       => 'required',  
                'email'             => 'required|unique:users,email,' . $user->id,
                'status'            => 'required'
            ]);


            $storeDataUser = [
                'image'         => 'default.png',
                'name'          => $request->name,
                'address'       => $request->address,
                'phonenumber'   => $request->phonenumber,
                'email'         => $request->email,
                'is_active'     => $request->status
            ];

            $user->update($storeDataUser);

            return redirect()->route('customers.index')->with('success', 'Customer Created Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors', $th->getMessage());
        }
    }


    // destroy process
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('customers.index')->with('success', 'Customer Deleted Successfully');
    }
}
