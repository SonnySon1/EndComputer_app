<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Laptop;
use App\Models\Service;
use App\Models\Serviceitem;
use Illuminate\Http\Request;
use App\Models\Servicedetail;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    // index view
    public function index() {
        $services = Service::all();
        return view('pages.services.index', compact('services'));
    }



    // create view
    public function create(){
        $customers    = User::where('role', '=', '3')->get();
        $technicians  = User::where('role', '=', '2')->get();
        $laptops      = Laptop::all();
        $serviceItems = Serviceitem::all();

        return view('pages.services.create', compact('customers', 'technicians', 'laptops', 'serviceItems'));
    }



    // store process
    public function store(Request $request){
        DB::beginTransaction();
        try {
            $request->validate([
                'customer'          => 'required', 
                'laptop'            => 'required', 
                'technician'        => 'required', 
                'damagedescription' => 'required' 
            ]);

            if (count($request->service_type) == 0) {
                return redirect()->back()->with('error', 'Service type is required');
            }

            $dataStoreService = [
                'no_invoice'            => 'ENV-'. rand(1000, 9999),
                'customer_id'           => $request->customer,
                'technician_id'         => $request->technician,
                'laptop_id'             => $request->laptop,
                'damage_description'    => $request->damagedescription,
                'estimation_cost'       => 0,
                'total_cost'            => 0
            ];

            $service = Service::create($dataStoreService);
            $estimationcost = 0;

            foreach ($request->service_type as $index => $servicetype) {
                $serviceitem = Serviceitem::find($servicetype);
                $dataStoreServicedetail = [
                    'service_id'      => $service->id,
                    'serviceitem_id'  => $servicetype,
                    'price'           => $serviceitem->price
                ];

                $estimationcost += $serviceitem->price;
                Servicedetail::create($dataStoreServicedetail);
            }

            $service->update([
                'estimation_cost' => $estimationcost,
                'total_cost'      => $estimationcost
            ]);

            DB::commit();
            return redirect()->route('services.index')->with('success', 'Service created successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('errors', $th->getMessage());
        }
    }
    


    // edit view
    public function edit($id){
        
    }


    
    // update process
    public function update(Request $request, $id){
        
    }
}
