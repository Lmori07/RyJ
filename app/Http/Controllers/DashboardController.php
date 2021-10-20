<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('user'))
        {
            return view('dashboard');
        }
        elseif(Auth::user()->hasRole('admin'))
        {
            return view('dashboard');
        }
        elseif(Auth::user()->hasRole('employee'))
        {
            return view('dashboard');
        }
    }

    public function menu()
    {
        return view('menu');
    }

    public function reservacion()
    {
        return view('reservacion');
    }

    public function administrarusuario()
    {
        if(Auth::user()->hasRole('admin'))
        {
            return view('administrarusuario');
        }
    }

    public function administrarproducto()
    {
        if(Auth::user()->hasRole('admin'))
        {
            return view('administrarproducto');
        }
    }

    public function administrarfactura()
    {
        if(Auth::user()->hasRole('admin'))
        {
            return view('administrarfactura');
        }
    }

    public function administrarreservacion()
    {
        if(Auth::user()->hasRole('admin'))
        {
            return view('administrarreservacion');
        }
    }

}
