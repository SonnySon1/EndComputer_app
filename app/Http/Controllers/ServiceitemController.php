<?php

namespace App\Http\Controllers;

use App\Models\Serviceitem;
use Illuminate\Http\Request;

class ServiceitemController extends Controller
{
    // index view
    public function index() {
        $serviceitems = Serviceitem::all();
        return view('pages.serviceitems.index', compact('serviceitems'));
    }



    // create view
    public function create(){
        return view('pages.serviceitems.create');
    }



    // store process
    public function store(Request $request){
        try {
            $request->validate([
                'name'   => 'required | unique:serviceitems,name',
                'price'  => 'required',
                'status' => 'required'
            ]);

            $storeDataServiceitem = [
                'name'      => $request->name,
                'price'     => str_replace('.', '', $request->price),
                'is_active' => $request->status
            ];

            Serviceitem::create($storeDataServiceitem);
            return redirect()->route('serviceitems.index')->with('success', 'Service Item created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors', $th->getMessage());
        }
    }
    


    // edit view
    public function edit($id){
        $serviceitem = Serviceitem::find($id);
        return view('pages.serviceitems.edit', compact('serviceitem'));
    }


    
    // update process
    public function update(Request $request, $id){
        try {
            $serviceitem = Serviceitem::find($id);
            
            $request->validate([
                'name'   => 'required | unique:serviceitems,name,' . $serviceitem->id,
                'price'  => 'required',
                'status' => 'required'
            ]);

            $storeDataServiceitem = [
                'name'      => $request->name,
                'price'     => str_replace('.', '', $request->price),
                'is_active' => $request->status
            ];

            $serviceitem->update($storeDataServiceitem);
            return redirect()->route('serviceitems.index')->with('success', 'Service Item updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors', $th->getMessage());
        }
    }

    // destroy process
    public function destroy($id){
        $serviceitem = Serviceitem::find($id);
        $serviceitem->delete();
        return redirect()->route('serviceitems.index')->with('success', 'Service Item deleted successfully');
    }
}
