<?php 
namespace App\Models;

use CodeIgniter\Model;

class User extends Model{
    protected $table      = 'user';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedField = ['nama','username','password','jenis_kelamin','jenis'];
}