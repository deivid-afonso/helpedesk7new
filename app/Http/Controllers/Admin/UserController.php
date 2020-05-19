<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
      // $users = $this->repository->all();

        //return view('user.index', [
          //  'users' => $users
        //]);

        $users = \App\User::paginate(10);
        //dd($users);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
      $users = \App\User::all(['id', 'name']);

      return view('admin.users.create', compact('users'));
    }

    public function store(Request $request)
    {

      $user = new User;

        $user->name = $request->name;

        $user->save();
      //$data = $request->all();
      //dd($data);
      //$user =\App\User::find($data['id']);
      //dd($user);
      // $data->name = $request->all();
      // $data->save();
      // //$store = $user->store()->create($data);
      // //dd($store);
      return $user;
    }

    public function edit($user)
    {
      $user = \App\User::find($user);

      return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $user)
    {
      dd($request->all());

      $user = \App\User::find($user);
      $user->update($data);
    }
} 
