<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;

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

      
      $users = \App\User::all(['id', 'name', 'email', 'password']);

      return view('admin.users.create', compact('users'));
    }

    public function store(Request $request)
    {
      try 
      {
        $data = $request->all();
        $user = \App\User::find($data['email']);
        //dd($user);
        $user->user()->create($data);
       
        flash('Usuário criado com sucesso')->success();
      return redirect()->route('admin.users.index');

      } 
      catch (\Throwable $th)
      {
        throw $th;
      }
     
    }

    public function edit($user)
    {
      $user = \App\User::find($user);

      return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $user)
    {
      $data = $request->all();

      $user = \App\User::find($user);
      $user->update($data);

      flash('Usuário atualizado com sucesso')->success();
      return redirect()->route('admin.users.index');
    }

    public function destroy($user)
    {
      $user = \App\User::find($user);
      $user->delte();

      flash('Usuário Deletado com sucesso')->success();
      return redirect()->route('admin.users.index');
    }
} 
