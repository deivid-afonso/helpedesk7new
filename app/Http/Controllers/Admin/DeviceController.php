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
     $place_list = \App\Place::pluck('description', 'id')->all();
     //dd($lab_list);
     $devices = $this->device->paginate(10);

     return view('admin.devices.index', compact('devices'));
   }

   public function create()
   {
      $device = \App\Device::all(['id', 'description', 'patrimony', 'place_id']);
      return view('admin.devices.create');
   }

   


   public function store(Request $request)
   {
     try 
     {
       $data = $request->all();
       
       $device = new Device;
       $device->place_id = $data['place_id']; // esse valor deve vir de algum select depois ... nao se esqueca
       $device->description = $data['description'];
       $device->patrimony = $data['patrimony'];
       $device->save();
    
       flash('Equipamento cadastrado com sucesso')->success();
       return redirect()->route('devices.index');

     } 
     catch (\Throwable $th)
     {
       throw $th;
     }
    
   }

   public function edit($device)
   {
      $device = $this->device->find($device);
      return view('admin.devices.edit', compact('device'));
   }

   public function update(Request $request, $id)
   {
      $data = $request->all();

      $user = \App\User::find($user);
      $user->update($data);

      flash('Usuário atualizado com sucesso')->success();
      return redirect()->route('admin.users.index');
   }

   public function destroy($id)
   {
      $user = \App\User::find($user);
      $user->delte();

      flash('Usuário Deletado com sucesso')->success();
      return redirect()->route('admin.users.index');
   }
}
