<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function root()
    {
        if(auth()->user()->hasRole('Admin'))
        {
            dd('entrou admin');
            return redirect('admin/occurrences');
        }
        else if(auth()->user()->hasRole('User'))
        {
            dd('entrou user');
            return redirect()->route('user.occurrence.index');
        }
        else
        {
            dd('login');
            return redirect()->route(login);
        }
    }
}
