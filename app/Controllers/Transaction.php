<?php

namespace App\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Transaction as ModelsTransaction;
use App\Models\TransactionDetail;

class Transaction extends BaseController
{
    protected $customer;
    protected $product;
    protected $rules;
    protected $transaction;
    protected $transactionDetail;

    public function __construct()
    {
        $this->customer          = new Customer();
        $this->product           = new Product();
        $this->transaction       = new ModelsTransaction();
        $this->transactionDetail = new TransactionDetail();

        $this->rules = [
            'no_transaction'   => 'required',
            'customer_id'      => 'required',
            'transaction_date' => 'required',
            'product_id'       => 'required',
            'qty'              => 'required',
            'sub_total'        => 'required',
            'discount'         => 'required',
            'tax'              => 'required',
            'pay'              => 'required',
        ];
    }

    public function index()
    {
        $transactions = $this->transaction
            ->select('transactions.*, customers.name as customer_name')
            ->join('customers', 'transactions.customer_id = customers.id')
            ->paginate(5, 'transaction');

        foreach ($transactions as &$row) {
            $row['details'] = $this->transactionDetail
                ->select('transactiondetails.*, transactiondetails.id as detail_id, products.name as product_name')
                ->join('products', 'products.id = transactiondetails.product_id')
                ->where('transactiondetails.transaction_id', $row['id'])
                ->findAll();
        }

        $data = [
            'data'  => $transactions,
            'title' => 'List Transaksi',
            'pager' => $this->transaction->pager,
        ];

        return view('transaction/index', $data);
    }

    public function create()
    {
        $data = [
            'title'    => 'Tambah Transaksi',
            'customer' => $this->customer->findAll(),
            'product'  => $this->product->findAll(),
        ];

        return view('transaction/create', $data);
    }

    public function store()
    {
        $data = $this->request->getPost();

        if (! $this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $transaction = $this->transaction->insert($data);
        $dataDetail  = [];

        foreach ($data['product_id'] as $key => $productId) {
            $dataDetail[] = [
                'transaction_id' => $transaction,
                'product_id'     => $productId,
                'qty'            => $data['qty'][$key],
                'price'          => $data['price'][$key],
                'amount'         => $data['amount'][$key],
            ];
        }

        $this->transactionDetail->insertBatch($dataDetail);

        sendTelegramNotification('User ' . session()->get('username') . ' menambahkan Transaksi ' . $data['no_transaction']);

        return redirect()->route('Transaction::index')->with('message', 'Sukses tambah data');
    }
}
