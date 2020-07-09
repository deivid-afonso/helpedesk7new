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
use RealRashid\SweetAlert\Facades\Alert;

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
        //$email = $request->all('email');
        //dd($email);
       User::create($request->all())->roles()->attach($request->role_id);

        Alert::success('Usuário criado com sucesso','Success Message');
        return redirect()->route('admin.users.index');

      }
      catch (\Throwable $th)
      {
        Alert::error('Ocorreu um erro ao criar o usuário', 'Error Message');
        return view('admin.users.create', compact('users', 'roles'));
      }

    }

    public function edit($user)
    {

      $roles = \Spatie\Permission\Models\Role::all();


      $user = \App\User::findOrFail($user);
      return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UserRequest $request, $id)
    {

      try
      {
//
         $data = $request->all();
         $user = User::find($id);
         //dd($user);
         $user->name = $data['name'];
         $user->email = $data['email'];
         $user->password = $data['password'];
         $user->save();

         Alert::success('Usuário atualizado com sucesso','Success Message');

        return redirect()->route('admin.users.index');
      }
      catch (\Throwable $th)
      {
        Alert::error('Ocorreu um erro ao atualizar o usuário', 'Error Message');

        return redirect()->route('admin.users.index');
      }

    }

    public function destroy($user)
    {
      $user = \App\User::findOrFail($user);
      //dd($user);
      $user->delete();

      Alert::success('Usuário deletado com sucesso','Success Message');

      return redirect()->route('admin.users.index');
    }
}
