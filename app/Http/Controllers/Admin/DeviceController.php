<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Device;
use App\Place;
use App\Http\Requests\DeviceRequest;


class DeviceController extends Controller
{
   private $device;
   

   public function __construct(Device $device)
   {
      $this->device = $device;
   }

   public function index()
   {
     $places = \App\Place::pluck('description', 'id')->all();
     //dd($lab_list);
     $devices = $this->device->paginate(10);

     return view('admin.devices.index', compact('devices'));
   }

   public function create()
   {
      $places = Place::all();//lista places
      //dd($places);
      $device = \App\Device::all(['id', 'description', 'patrimony', 'place_id']);
      return view('admin.devices.create', compact('places'));
   }

   


   public function store(DeviceRequest $request)
   {
     try 
     {
       $data = $DeviceRequest->all();
       
       $device = new Device;
       $device->place_id = $data['place_id']; // esse valor deve vir de algum select depois ... nao se esqueca
       $device->description = $data['description'];
       $device->patrimony = $data['patrimony'];
       $device->save();
    
       flash('Equipamento cadastrado com sucesso')->success();
       return redirect()->route('admin.devices.index');

     } 
     catch (\Throwable $th)
     {
       throw $th;
     }
    
   }

   public function edit($device)
   {
      $device = \App\Device::findOrFail($device);
      return view('admin.devices.edit', compact('device'));
   }

   public function update(DeviceRequest $request, $id)
   {
      try 
      {
        $data = $request->all();
       
        $device = device::find($id);

        $device->description = $data['description'];
        $device->patrimony = $data['patrimony'];
        $device->save();
 
        flash('Usuário atualizado com sucesso')->success();
        return redirect()->route('admin.devices.index');
      } 
      catch (\Throwable $th) 
      {
        throw $th;
      }
   }

   public function destroy($device)
   {
      $device = \App\Device::findOrFail($device);
      //dd($device);
      $device->delete();

      flash('Usuário Deletado com sucesso')->success();
      return redirect()->route('admin.devices.index');
   }
}
