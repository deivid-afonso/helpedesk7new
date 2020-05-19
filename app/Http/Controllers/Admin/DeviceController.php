<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
      // $users = $this->repository->all();

        //return view('user.index', [
          //  'users' => $users
        //]);

        $users = \App\User::paginate(10);
        return view('admin.devices.index', compact('devices'));
    }

    public function create()
    {
      $users = \App\Device::all(['id', 'description']);

      return view('admin.devices.create');
    }

    public function store(Request $request)
    {
      dd($request->all()); 
    }
}
