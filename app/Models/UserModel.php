<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $allowedFields = ['name', 'email', 'password', 'fone', 'address', 'user_rg'];

    public function getUsers($id = null) {
        if(is_null($id)) return $this->findAll();

        return $this->find($id);
    }
}