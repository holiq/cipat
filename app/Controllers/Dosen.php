<?php

namespace App\Controllers;

use App\Models\Dosen as DosenModel;

class Dosen extends BaseController
{
    protected $helpers = ['url', 'form'];
    protected $dosen;

    public function __construct()
    {
        $this->dosen = new DosenModel();
    }

    public function index()
    {
        $data = [
            'data'  => $this->dosen->paginate('2', 'dosen'),
            'title' => 'List Dosen',
            'pager' => $this->dosen->pager,
        ];

        return view('dosen/index', $data);
    }

    public function create()
    {
        return view('dosen/create', ['title' => 'Tambah Dosen']);
    }

    public function store()
    {
        $data  = $this->request->getPost();
        $rules = [
            'kode_dosen'   => 'required',
            'nama_dosen'   => 'required',
            'status_dosen' => 'required',
        ];

        if (! $this->validateData($data, $rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->dosen->save($this->request->getPost());

        return redirect()->route('Dosen::index')->with('message', 'Sukses tambah data');
    }
}
