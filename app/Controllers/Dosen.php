<?php

namespace App\Controllers;

use App\Models\Dosen as DosenModel;

class Dosen extends BaseController
{
    public function index()
    {
        $dosen = new DosenModel();

        $data = [
            'data'  => $dosen->paginate('2', 'dosen'),
            'title' => 'List Dosen',
            'pager' => $dosen->pager,
        ];

        return view('dosen/index', $data);
    }
}
