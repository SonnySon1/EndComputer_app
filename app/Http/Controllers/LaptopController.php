<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaptopController extends Controller
{
    // index view
    public function index() {
        return view('pages.laptops.index');
    }



    // create view
    public function create(){
        return view('pages.laptops.create');
    }



    // store process
    public function store(Request $request){
        
    }
    


    // edit view
    public function edit($id){
        
    }


    
    // update process
    public function update(Request $request, $id){
        
    }
}
