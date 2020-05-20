<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Device;

class DeviceController extends Controller
{
   private $device;

   public function __construct(Device $device)
   {
      $this->device = $device;
   }

   public function index()
   {
     $devices = $this->device->paginate(10);

     return view('admin.devices.index', compact('devices'));
   }

   public function create()
   {
      $device = \App\Device::all(['id', 'description', 'patrimony']);
      return view('admin.devices.create');
   }

   


   public function store(Request $request)
   {
     try 
     {
       $data = $request->all();
       //dd($data);
       //$device = $this->device->find('id')->all();
       //dd($device);
       $device->store()->create($data);
       dd($device);
       flash('Equipamento cadastrado com sucesso')->success();
       return redirect()->route('devices.index');

     } 
     catch (\Throwable $th)
     {
       throw $th;
     }
    
   }

   public function edit($id)
   {
      $device = $this->device->find($id);
      return view('admin.devices.edit', compact('devices'));
   }

   public function update(Request $request, $id)
   {

   }

   public function destroy($id)
   {
     
   }
}
