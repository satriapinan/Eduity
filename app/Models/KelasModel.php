<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
  protected $table = 'kelas';
  protected $primaryKey = 'id_kelas';
  protected $allowedFields = ['id_kelas', 'nama', 'kategori', 'jumlah_materi', 'jumlah_siswa', 'rating', 'deskripsi', 'gambar'];

  public function getKelas($id_kelas = false)
  {
    if ($id_kelas == false) {
      return $this->findAll();
    }

    return $this->where(['id_kelas' => $id_kelas])->first();
  }

  public function getKategori($limit = false)
  {
    $builder = $this->db->table("kelas");

    $builder->select("kategori");
    $builder->groupBy("kategori");

    if ($limit != false) {
      $builder->limit($limit);
    }
    
    $query = $builder->get();

    return $query->getResultArray();
  }

  public function getKelasKategori($kategori)
  {
    if ($kategori == false) {
      return $this->findAll();
    }

    return $this->where(['kategori' => $kategori])->findAll();
  }

  public function orderKelas($order)
  {
    if ($order == false) {
      return $this->findAll();
    }

    return $this->orderBy($order, 'asc')->findAll();
  }

  public function updateKelas($id_kelas, $data)
  {
    return $this->update($id_kelas, $data);
  }

  public function deleteKelas($id_kelas)
  {
    return $this->where('id_kelas', $id_kelas)->delete();
  }

  public function saveKelas($data)
  {
    return $this->insert($data);
  }
}
