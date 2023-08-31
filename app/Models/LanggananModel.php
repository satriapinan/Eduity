<?php

namespace App\Models;

use CodeIgniter\Model;

class LanggananModel extends Model
{
  protected $table = 'langganan';
  protected $primaryKey = 'id_langganan';
  protected $allowedFields = ['id_langganan', 'nama', 'total_hari', 'harga'];

  public function getLangganan($id_langganan = false)
  {
    if ($id_langganan == false) {
      return $this->findAll();
    }

    return $this->where(['id_langganan' => $id_langganan])->first();
  }

  public function orderLangganan($order)
  {
    if ($order == false) {
      return $this->findAll();
    }

    return $this->orderBy($order, 'asc')->findAll();
  }

  public function updateLangganan($id_langganan, $data)
  {
    return $this->update($id_langganan, $data);
  }

  public function deleteLangganan($id_langganan)
  {
    return $this->where('id_langganan', $id_langganan)->delete();
  }

  public function saveLangganan($data)
  {
    return $this->insert($data);
  }
}
