<?php

namespace App\Controllers;

use App\Models\Dosen as DosenModel;

class Dosen extends BaseController
{
    protected $dosen;
    protected $rules;

    public function __construct()
    {
        $this->dosen = new DosenModel();
        $this->rules = [
            'kode_dosen'   => 'required',
            'nama_dosen'   => 'required',
            'status_dosen' => 'required',
        ];
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
        $data = $this->request->getPost();

        if (! $this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->dosen->save($data);

        sendTelegramNotification('User ' . session()->get('username') . ' menambahkan Dosen ' . $data['nama_dosen']);

        return redirect()->route('Dosen::index')->with('message', 'Sukses tambah data');
    }

    public function edit(int $id)
    {
        $data = [
            'title' => 'Edit Dosen',
            'dosen' => $this->dosen->find($id),
        ];

        return view('dosen/edit', $data);
    }

    public function update(int $id)
    {
        $data = $this->request->getPost();

        if (! $this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->dosen->update($id, $data);

        return redirect()->route('Dosen::index')->with('message', 'Sukses ubah data');
    }

    public function destroy(int $id)
    {
        $this->dosen->delete($id);

        return redirect()->back()->with('message', 'Sukses hapus data');
    }
}
