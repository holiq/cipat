<?php

namespace App\Controllers;

use App\Models\Customer as ModelsCustomer;

class Customer extends BaseController
{
    protected $customer;
    protected $rules;

    public function __construct()
    {
        $this->customer = new ModelsCustomer();
        $this->rules    = [
            'name'    => 'required',
            'phone'   => 'required',
            'address' => 'required',
        ];
    }

    public function index()
    {
        $data = [
            'data'  => $this->customer->paginate('5', 'customer'),
            'title' => 'List Customer',
            'pager' => $this->customer->pager,
        ];

        return view('customer/index', $data);
    }

    public function create()
    {
        return view('customer/create', ['title' => 'Tambah Customer']);
    }

    public function store()
    {
        $data = $this->request->getPost();

        if (! $this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->customer->save($data);

        sendTelegramNotification('User ' . session()->get('username') . ' menambahkan Barang ' . $data['name']);

        return redirect()->route('Customer::index')->with('message', 'Sukses tambah data');
    }

    public function edit(int $id)
    {
        $data = [
            'title'    => 'Edit Customer',
            'customer' => $this->customer->find($id),
        ];

        return view('customer/edit', $data);
    }

    public function update(int $id)
    {
        $data = $this->request->getPost();

        if (! $this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->customer->update($id, $data);

        return redirect()->route('Customer::index')->with('message', 'Sukses ubah data');
    }

    public function destroy(int $id)
    {
        $this->customer->delete($id);

        return redirect()->back()->with('message', 'Sukses hapus data');
    }
}
