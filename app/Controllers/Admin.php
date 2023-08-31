<?php

namespace App\Controllers;

set_time_limit(120);

use App\Models\KelasModel;
use App\Models\LanggananModel;
use App\Models\UserModel;
use TCPDF;

class Admin extends BaseController
{
    protected $KelasModel;
    protected $LanggananModel;
    protected $UserModel;

    public function __construct()
    {
        $this->kelasModel = new KelasModel();
        $this->langgananModel = new LanggananModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        if(session()->get('role') == "1"){
            $kelas = $this->kelasModel->getKelas();
            $kategori = $this->kelasModel->getKategori();
            $data = [
                'kelas' => $kelas,
                'kategori' => $kategori,
            ];
            return view('admin/admin_home1', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function display_course($kategori)
    {
        if(session()->get('role') == "1"){
            $kelas = $this->kelasModel->getKelasKategori($kategori);
            $kategori = $this->kelasModel->getKategori();
            $data = [
                'kelas' => $kelas,
                'kategori' => $kategori,
            ];
            return view('admin/admin_home1', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function order_course($order)
    {
        if(session()->get('role') == "1"){
            $kelas = $this->kelasModel->orderKelas($order);
            $kategori = $this->kelasModel->getKategori();
            $data = [
                'kelas' => $kelas,
                'kategori' => $kategori,
            ];
            return view('admin/admin_home1', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function home_subscription()
    {
        if(session()->get('role') == "1"){
            $langganan = $this->langgananModel->getLangganan();
            $data = [
                'langganan' => $langganan,
            ];
            return view('admin/admin_home2', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function order_subscription($order)
    {
        if(session()->get('role') == "1"){
            $langganan = $this->langgananModel->orderLangganan($order);
            $data = [
                'langganan' => $langganan,
            ];
            return view('admin/admin_home2', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function member()
    {
        if(session()->get('role') == "1"){
            $user = $this->userModel->getUser();
            $data = [
                'user' => $user,
            ];
            return view('admin/admin_member', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function order_member($order)
    {
        if(session()->get('role') == "1"){
            $user = $this->userModel->orderUser($order);
            $data = [
                'user' => $user,
            ];
            return view('admin/admin_member', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function form_course($id = null)
    {
        if(session()->get('role') == "1"){
            if ($id != null) {
                $kelas = $this->kelasModel->getKelas($id);
                $data = [
                    'kelas' => $kelas,
                ];

                return view('admin/edit_course', $data);
            } else {
                return view('admin/form_course');
            }
            return view('admin/form_course');
        } else {
            return redirect()->to('/');
        }
    }

    public function save_course($id = null)
    {
        if(session()->get('role') == "1"){
            $validation = $this->validate([
                'file_upload' => 'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,4096]'
            ]);
     
            if ($validation == TRUE) {
                $upload = $this->request->getFile('file_upload');
                $upload->move(WRITEPATH . '../public/img/');

                $data = [
                    'nama' => $this->request->getVar('nama'),
                    'kategori' => $this->request->getVar('kategori'),
                    'jumlah_materi' => $this->request->getVar('materi'),
                    'deskripsi' => $this->request->getVar('deskripsi'),
                    'gambar' => $upload->getName(),
                ];
            } else {
                $data = [
                    'nama' => $this->request->getVar('nama'),
                    'kategori' => $this->request->getVar('kategori'),
                    'jumlah_materi' => $this->request->getVar('materi'),
                    'deskripsi' => $this->request->getVar('deskripsi'),
                ];
            }
         
            if ($id == null) {
                $this->kelasModel->saveKelas($data);
            } else {
                $this->kelasModel->updateKelas($id, $data);
            }
            return redirect()->to('/admin/home/course');
        } else {
            return redirect()->to('/');
        }
    }

    public function delete_course($id)
    {
        if(session()->get('role') == "1"){
            $this->kelasModel->deleteKelas($id);
            return redirect()->to('/admin/home/course');
        } else {
            return redirect()->to('/');
        }
    }

    public function form_subscription($id = null)
    {
        if(session()->get('role') == "1"){
            if ($id != null) {
                $langganan = $this->langgananModel->getLangganan($id);
                $data = [
                    'subs' => $langganan,
                ];

                return view('admin/edit_subscription', $data);
            } else {
                return view('admin/form_subscription');
            }
        } else {
            return redirect()->to('/');
        }
    }

    public function save_subscription($id = null)
    {
        if(session()->get('role') == "1"){
            $data = [
                'nama' => $this->request->getVar('nama'),
                'total_hari' => $this->request->getVar('total_hari'),
                'harga' => $this->request->getVar('harga'),
            ];
            if ($id == null) {
                $this->langgananModel->saveLangganan($data);
            } else {
                $this->langgananModel->updateLangganan($id, $data);
            }
            return redirect()->to('/admin/home/subscription');
        } else {
            return redirect()->to('/');
        }
    }

    public function delete_subscription($id)
    {
        if(session()->get('role') == "1"){
            $this->langgananModel->deleteLangganan($id);
            return redirect()->to('/admin/home/subscription');
        } else {
            return redirect()->to('/');
        }
    }

    public function exportPDF()
    {
        if(session()->get('role') == "1"){
            $data['user'] = $this->userModel->getUser();
            $html_view = view('admin/user_report', $data);

            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Satria Pinandita Abyatarsyah');
            $pdf->SetTitle('TUBES | User Data');
            $pdf->setSubject('Mata Kuliah Desain dan Pemrograman Web');

            $pdf->SetPrintHeader(false);
            $pdf->SetPrintFooter(false);

            $pdf->AddPage();
            $pdf->writeHTML($html_view, true, false, true, false, '');
            $this->response->setContentType('application/pdf');
            $pdf->Output('user_report.pdf', 'I');
        } else {
            return redirect()->to('/');
        }
    }

    // DOMPDF

    // public function exportPDF()
    // {
    //     $user = $this->userModel->getUser();
    //     $data = [
    //         'user' => $user,
    //     ];

    //     $filename = date('y-m-d-H-i-s'). '-qadr-labs-report';

    //     $dompdf = new Dompdf();
    //     $dompdf->loadHtml(view('admin_member', $data));
    //     $dompdf->setPaper('A4', 'landscape');
    //     $dompdf->render();
    //     $dompdf->stream($filename);
    // }
}
