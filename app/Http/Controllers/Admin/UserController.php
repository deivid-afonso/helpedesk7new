<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
  private $user;
   

    public function __construct(user $user)
    {
       $this->user = $user;
    }
    public function index()
    {
      

        $users = \App\User::paginate(10);
        //dd($users);
        return view('admin.users.index', compact('users'));
    }

   
    public function create()
    {

      
      $users = \App\User::all(['id', 'name', 'email', 'password']);

      return view('admin.users.create', compact('users'));
    }

    public function store(UserRequest $request)
    {
      try 
      {
        $user =auth()->user();//tras os dados do user, usar depois no user default pra gravar os chamados no

        $data = $request->all();
        $user = new user;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->save();
       
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
      $user = \App\User::findOrFail($user);

      return view('admin.users.edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {

      try 
      {
        $data = $request->all();

        $user = User::find($id);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->save();
 
        flash('Usuário atualizado com sucesso')->success();
        return redirect()->route('admin.users.index');
      } 
      catch (\Throwable $th) 
      {
        //throw $th;
      }
     
    }

    public function destroy($user)
    {
      $user = \App\User::findOrFail($user);
      //dd($user);
      $user->delete();

      flash('Usuário Deletado com sucesso')->success();
      return redirect()->route('admin.users.index');
    }
} 
