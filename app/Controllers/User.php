<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\KelasModel;

class User extends BaseController
{
    protected $UserModel;
    protected $KelasModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
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

    public function registration()
    {   
        $data = [
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => 0,
        ];

        $this->userModel->saveUser($data);

        $limit = 8;
        $kategori = $this->kelasModel->getKategori($limit);

        $data = [
            'regist' => 1,
            'kategori' => $kategori,
        ];

        return view('user/home', $data);
    }

    public function login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $this->userModel->getUsername($username);

        if ($dataUser) {
            if (password_verify($password, $dataUser['password'])) {
                session()->set([
                    'username' => $dataUser['username'],
                    'role' => $dataUser['role'],
                    'logged_in' => TRUE
                ]);
                session()->setFlashdata('success', 'Logged In!');
                
                if(session()->get('role') == "1"){
                    return redirect()->to('/admin');
                } else {
                    return redirect()->to('/');
                }
            } else {
                session()->setFlashdata('error', 'Please Enter The Correct Username & Password');
                if(session()->get('role') == "1"){
                    return redirect()->to('/admin');
                } else {
                    return redirect()->to('/');
                }
            }
        } else {
            session()->setFlashdata('error', 'Please Enter The Correct Username & Password');
            if(session()->get('role') == "1"){
                return redirect()->to('/admin');
            } else {
                return redirect()->to('/');
            }
        }
    }
    
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
