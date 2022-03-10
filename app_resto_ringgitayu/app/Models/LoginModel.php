<?php
namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model{
    protected $table    = 'tb_login';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields=['username','password'];
}