<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceitemController extends Controller
{
    // index view
    public function index() {
        return view('pages.serviceitems.index');
    }



    // create view
    public function create(){
        return view('pages.serviceitems.create');
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
