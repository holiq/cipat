<?php

namespace App\Controllers;

use App\Models\User;

class Login extends BaseController
{
    protected $user;
    protected $rules;

    public function __construct()
    {
        $this->user  = new User();
        $this->rules = [
            'username' => 'required',
            'password' => 'required',
        ];
    }

    public function index()
    {
        return view('auth/login', ['title' => 'Login']);
    }

    public function process()
    {
        $data = $this->request->getPost();

        if (! $this->validateData($data, $this->rules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $check = $this->user->where('username', $data['username'])->first();

        if ($check) {
            if (password_verify($data['password'], $check['password'])) {
                session()->set('name', $check['name']);
                session()->set('username', $check['username']);

                sendTelegramNotification('User ' . $check['username'] . ' telah login!');

                return redirect()->route('Home::index')->with('message', 'Selamat datang ' . $data['username']);
            }
        }

        return redirect()->back()->with('errors', ['Invalid Username or Password!']);
    }

    public function destroy()
    {
        session()->destroy();

        return redirect()->route('Login::index');
    }
}
