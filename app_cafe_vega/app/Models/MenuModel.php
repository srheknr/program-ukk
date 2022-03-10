<?php 
namespace App\Models;

use CodeIgniter\Model;

class Menu extends Model{
    protected $table      = 'MenuModel';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id';
     protected $allowedField = ['nama','harga','jumlah','keterangan','jenis'];
}