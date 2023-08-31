<?php

namespace App\Controllers;

use App\Models\KelasModel;

class Home extends BaseController
{
    protected $KelasModel;
    public function __construct()
    {
        $this->kelasModel = new KelasModel();
    }

    public function index()
    {
        $limit = 8;
        $kategori = $this->kelasModel->getKategori($limit);

        $data = [
            'kategori' => $kategori,
        ];

        return view('user/home', $data);
    }
}
