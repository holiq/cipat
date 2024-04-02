<?php

namespace App\Controllers;

use App\Models\User;

class Register extends BaseController
{
    protected $user;
    protected $rules;

    public function __construct()
    {
        $this->user  = new User();
        $this->rules = [
            'name'                  => 'required',
            'username'              => 'required|is_unique[users.username]',
            'password'              => 'required',
            'password_confirmation' => 'required|matches[password]',
        ];
    }

    public function index()
    {
        return view('auth/register', ['title' => 'Register']);
    }

    public function process()
    {
        $data = $this->request->getPost();

        if (! $this->validateData($data, $this->rules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        $this->user->save($data);

        sendTelegramNotification('Telah mendaftar user: ' . $data['name'] . ' dengan username ' . $data['username']);

        return redirect()->route('Login::index')->with('message', 'Pendaftaran berhasil!');
    }
}
