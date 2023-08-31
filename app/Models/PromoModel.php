<?php

namespace App\Models;

use CodeIgniter\Model;

class PromoModel extends Model
{
  protected $table = 'promo';
  protected $primaryKey = 'id_promo';
  protected $allowedFields = ['id_promo', 'nama', 'persen_promo'];

  public function getPromo($id_promo = false)
  {
    if ($id_promo == false) {
      return $this->findAll();
    }

    return $this->where(['id_promo' => $id_promo])->first();
  }

  public function getPromoNama($nama = false)
  {
    if ($nama == false) {
      return $this->findAll();
    }

    return $this->where(['nama' => $nama])->first();
  }

  public function updatePromo($id_promo, $data)
  {
    return $this->update($id_promo, $data);
  }

  public function deletePromo($id_promo)
  {
    return $this->where('id_promo', $id_promo)->delete();
  }

  public function savePromo($data)
  {
    return $this->insert($data);
  }
}
