<?php

namespace App\Controllers;

use App\Models\LanggananModel;
use App\Models\PromoModel;

class Subscription extends BaseController
{
    protected $LanggananModel;
    protected $PromoModel;
    public function __construct()
    {
        $this->langgananModel = new LanggananModel();
        $this->promoModel = new PromoModel();
    }

    public function index()
    {
        $langganan = $this->langgananModel->getLangganan();
        $data = [
            'title' => 'Subscription',
            'langganan' => $langganan,
        ];
        return view('user/subscription', $data);
    }

    public function payment($id)
    {
        $langganan = $this->langgananModel->getLangganan($id);
        $data = [
            'title' => 'Payment',
            'langganan' => $langganan,
        ];
        return view('user/payment', $data);
    }

    public function promo()
    {
        $id = $this->request->getVar('id');
        $nama_promo = $this->request->getVar('promo');

        $langganan = $this->langgananModel->getLangganan($id);
        $promo = $this->promoModel->getPromoNama($nama_promo);
        
        $data = [
            'promo' => $promo,
            'langganan' => $langganan,
            'promo' => $promo,
        ];
        return view('user/payment', $data);
    }
}
