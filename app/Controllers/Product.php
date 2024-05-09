<?php

namespace App\Controllers;

use App\Models\Product as ModelsProduct;

class Product extends BaseController
{
    protected $product;
    protected $rules;

    public function __construct()
    {
        $this->product = new ModelsProduct();
        $this->rules   = [
            'name'  => 'required',
            'stock' => 'required',
            'price' => 'required',
        ];
    }

    public function index()
    {
        $data = [
            'data'  => $this->product->paginate('5', 'product'),
            'title' => 'List Barang',
            'pager' => $this->product->pager,
        ];

        return view('product/index', $data);
    }

    public function detail(int $id)
    {
        return $this->response->setJSON($this->product->find($id));
    }

    public function create()
    {
        return view('product/create', ['title' => 'Tambah Barang']);
    }

    public function store()
    {
        $data = $this->request->getPost();

        if (! $this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->product->save($data);

        sendTelegramNotification('User ' . session()->get('username') . ' menambahkan Barang ' . $data['name']);

        return redirect()->route('Product::index')->with('message', 'Sukses tambah data');
    }

    public function edit(int $id)
    {
        $data = [
            'title'   => 'Edit Barang',
            'product' => $this->product->find($id),
        ];

        return view('product/edit', $data);
    }

    public function update(int $id)
    {
        $data = $this->request->getPost();

        if (! $this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->product->update($id, $data);

        return redirect()->route('Product::index')->with('message', 'Sukses ubah data');
    }

    public function destroy(int $id)
    {
        $this->product->delete($id);

        return redirect()->back()->with('message', 'Sukses hapus data');
    }
}
