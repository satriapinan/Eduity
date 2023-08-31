<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasPilihanModel extends Model
{
  protected $table = 'kelas_pilihan';
  protected $primaryKey = 'id_kelas_pilihan';
  protected $allowedFields = ['id_kelas_pilihan', 'id_user', 'id_kelas'];

  public function getKelasPilihan($id_kelas_pilihan = false)
  {
    if ($id_kelas_pilihan == false) {
      return $this->findAll();
    }

    return $this->where(['id_kelas_pilihan' => $id_kelas_pilihan])->first();
  }

  public function updateKelasPilihan($id_kelas_pilihan, $data)
  {
    return $this->update($id_kelas_pilihan, $data);
  }

  public function deleteKelasPilihan($id_kelas_pilihan)
  {
    return $this->where('id_kelas_pilihan', $id_kelas_pilihan)->delete();
  }

  public function saveKelasPilihan($data)
  {
    return $this->insert($data);
  }
}
