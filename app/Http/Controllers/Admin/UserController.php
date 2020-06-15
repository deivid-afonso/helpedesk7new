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
use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller
{
  private $user;


    public function __construct(user $user)
    {
      $this->middleware(['auth', 'role:Admin']);

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
      $roles = \Spatie\Permission\Models\Role::all();//tava dessa forma aqui pra listar os roles..sss ai no editar como puxo o id q ta salvo
      //dd($role);

      return view('admin.users.create', compact('users', 'roles'));
    }

    public function store(UserRequest $request)
    {
      try
      {

       User::create($request->all())->roles()->attach($request->role_id);
        // $data = $request->all();
        // $user = new user;
        // $user->name = $data['name'];
        // $user->email = $data['email'];
        // $user->password = $data['password'];
        // $user->save();

        // $model_has_roles = new model_has_roles;
        // $model_has_roles->role_id = $data['role_id'];
        // $model_has_roles->model_type ='App\User';
        // $model_has_roles->model_id = $user->id;
        // dd($model_has_roles);
        // $model_has_roles->save();
        //$role->//


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
      //entao no edit eu listo todos os roles, tem gente falando aqui do lado...ta, ate ai tranquilo entao
      $roles = \Spatie\Permission\Models\Role::all();


      $user = \App\User::findOrFail($user);
      return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UserRequest $request, $id)
    {

      try
      {

        //User::update($request->all())->roles()->attach($request->role_id);

        // $data = $request->all(); é synb ou update, ta, eu vo pegar la, pra ver certinho, por hora vlw ai ja matou o q eu precisava
        //document exist pivot / sync documentation

        // //dd($data);t

        // $user = User::find($id);
        // //dd($user);
        // $user->name = $data['name'];
        // $user->email = $data['email'];
        // $user->password = $data['password'];
        // $user->save();

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
