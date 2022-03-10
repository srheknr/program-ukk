<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TransaksiModel;

class TransaksiController extends Controller{
    public function tampil()
    {
        # code...
        $transaksis=new TransaksiModel();
        $data['dtransaksi']=$transaksis->findAll();
        return view('transaksi',$data);
    }
}