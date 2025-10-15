<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Http\Request;

class LaptopController extends Controller
{
    // index view
    public function index() {
        $laptops = Laptop::all();
        return view('pages.laptops.index', compact('laptops'));
    }



    // create view
    public function create(){
        return view('pages.laptops.create');
    }



    // store process
    public function store(Request $request){
        try {
            $request->validate([
                'brand'  => 'required',
                'model'  => 'required',
                'status' => 'required'
            ]);    

            $laptop = Laptop::where('brand', $request->brand)->where('model', $request->model)->first();
            if ($laptop) {
                return redirect()->back()->with('errors', 'Laptop already exist');
            }

            $dataStoreLaptop = [
                'image'       => 'default.png',
                'brand'       => $request->brand,
                'model'       => $request->model,
                'release_year'=> $request->year,
                'is_active'   => $request->status
            ];

            Laptop::create($dataStoreLaptop);

            return redirect()->route('laptops.index')->with('success', 'Laptop created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors', $th->getMessage());
        }
    }
    


    // edit view
    public function edit($id){
        $laptop = Laptop::find($id);
        return view('pages.laptops.edit', compact('laptop'));
    }


    
    // update process
    public function update(Request $request, $id){
         try {
            $laptop = Laptop::find($id);

            $request->validate([
                'brand'  => 'required',
                'model'  => 'required',
                'status' => 'required'
            ]);    

            $laptop = Laptop::where('brand', $request->brand)->where('model', $request->model)->first();
            if ($laptop && $laptop->id != $id) {
                return redirect()->back()->with('errors', 'Laptop already exist');
            }

            $dataStoreLaptop = [
                'image'       => 'default.png',
                'brand'       => $request->brand,
                'model'       => $request->model,
                'release_year'=> $request->year,
                'is_active'   => $request->status
            ];

            $laptop->update($dataStoreLaptop);

            return redirect()->route('laptops.index')->with('success', 'Laptop updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors', $th->getMessage());
        }
    }
}
