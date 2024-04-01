<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if (! session()->has('username')) {
            return redirect('Login::index');
        }

        return view('home');
    }
}
