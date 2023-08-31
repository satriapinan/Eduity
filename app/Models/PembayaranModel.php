<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
  protected $table = 'pembayaran';
  protected $primaryKey = 'id_pembayaran';
  protected $allowedFields = ['id_pembayaran', 'id_user', 'id_langganan', 'id_promo', 'total_harga'];

  public function getPembayaran($id_pembayaran = false)
  {
    if ($id_pembayaran == false) {
      return $this->findAll();
    }

    return $this->where(['id_pembayaran' => $id_pembayaran])->first();
  }

  public function updatePembayaran($id_pembayaran, $data)
  {
    return $this->update($id_pembayaran, $data);
  }

  public function deletePembayaran($id_pembayaran)
  {
    return $this->where('id_pembayaran', $id_pembayaran)->delete();
  }

  public function savePembayaran($data)
  {
    return $this->insert($data);
  }
}
