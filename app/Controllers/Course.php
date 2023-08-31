<?php

namespace App\Controllers;

use App\Models\KelasModel;

class Course extends BaseController
{
    protected $KelasModel;
    public function __construct()
    {
        $this->kelasModel = new KelasModel();
    }

    public function index()
    {
        $kelas = $this->kelasModel->getKelas();
        $kategori = $this->kelasModel->getKategori();
        $data = [
            'title' => 'Course',
            'kelas' => $kelas,
            'kategori' => $kategori,
        ];
        return view('user/course', $data);
    }

    public function display($kategori)
    {
        $kelas = $this->kelasModel->getKelasKategori($kategori);
        $kategori = $this->kelasModel->getKategori();
        $data = [
            'title' => 'Course',
            'kelas' => $kelas,
            'kategori' => $kategori,
        ];
        return view('user/course', $data);
    }

    public function detail($id)
    {
        $kelas = $this->kelasModel->getKelas($id);
        $data = [
            'kelas' => $kelas,
        ];
        return view('user/detail_course', $data);
    }
}
