<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table = 'user';
  protected $primaryKey = 'id_user';
  protected $allowedFields = ['id_user', 'nama', 'username', 'email', 'password', 'gambar', 'role'];

  public function getUser($id_user = false)
  {
    if ($id_user == false) {
      return $this->where(['role' => 0])->findAll();
    }

    return $this->where(['id_user' => $id_user])->first();
  }

  public function getUsername($username)
  {
    return $this->where(['username' => $username])->first();
  }

  public function orderUser($order)
  {
    if ($order == false) {
      return $this->findAll();
    }

    return $this->where(['role' => 0])->orderBy($order, 'asc')->findAll();
  }

  public function updateUser($id_user, $data)
  {
    return $this->update($id_user, $data);
  }

  public function deleteUser($id_user)
  {
    return $this->where('id_user', $id_user)->delete();
  }

  public function saveUser($data)
  {
    return $this->insert($data);
  }
}
