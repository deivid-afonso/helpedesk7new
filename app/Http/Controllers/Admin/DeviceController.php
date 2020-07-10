<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Device;
use App\Place;
use App\Http\Requests\DeviceRequest;
use RealRashid\SweetAlert\Facades\Alert;

class DeviceController extends Controller
{
   private $device;


   public function __construct(Device $device)
   {
    $this->middleware(['auth', 'role:Admin']);
    $this->device = $device;
   }

   public function index()
   {
    // $occurrences = $this->occurrence->paginate(10);
    // return view('admin.occurrences.index', compact('occurrences'));
    // $devices = \App\Device::paginate(10);

     $devices = $this->device->paginate(10);
     //dd($devices);
     return view('admin.devices.index', compact('devices'));
   }

   public function create()
   {
      $places = Place::all('id', 'description');//lista places

      //dd($places);
      $device = \App\Device::all(['id', 'description', 'patrimony', 'place_id']);
      return view('admin.devices.create', compact('device', 'places'));
   }




   public function store(DeviceRequest $request)
   {
     try
     {
       $data = $request->all();
      //  dd($data);
       $device = new Device;
       $device->description = $data['description'];
       $device->patrimony = $data['patrimony'];
       $device->place_id = $data['place_id']; // esse valor deve vir de algum select depois ... nao se esqueca

       $device->save();

       //$device->$places()->sync($data['places']);

       Alert::success('Equipamento criado com sucesso', 'Success Message');

       return redirect()->route('admin.devices.index');

     }
     catch (\Throwable $th)
     {
       throw $th;
     }

   }

   public function edit($device)
   {
      $places = Place::all('id', 'description');//lista places

      $device = \App\Device::findOrFail($device);
      return view('admin.devices.edit', compact('device', 'places'));
   }

   public function update(DeviceRequest $request, $id)
   {
      try
      {
        $data = $request->all();

        $device = device::find($id);

        $device->description = $data['description'];
        $device->patrimony = $data['patrimony'];
        $device->place_id = $data['place'];
        $device->save();

       //$device->$places()->sync($data['places']);


       Alert::success('Equipamento atualizado com sucesso', 'Success Message');

        return redirect()->route('admin.devices.index');
      }
      catch (\Throwable $th)
      {
        throw $th;
      }
   }

   public function destroy($device)
   {
      try
      {
        $device = \App\Device::findOrFail($device);
        $device->delete();

        Alert::success('Equipamento deletado com sucesso', 'Success Message');

      return redirect()->route('admin.devices.index');
      }
      catch (\Throwable $th)
      {
        Alert::error('Não pode ser deletado!', 'Possui ocorrências cadastradas!');

        return redirect()->route('admin.devices.index');
      }
   }
}
