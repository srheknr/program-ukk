<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MenuModel;
use App\Models\PesanModel;
use App\models\DetailpesanModel;

class PesanController extends Controller
{
    /** 
     * instance of the main request.
     * 
     * @var HTTP\IncomingRequest
     */
    protected $request;

    function __construct()
    {
         $this->menu = new MenuModel();
         $this->session = session();
         $this->pesan = new PesanModel();
         $this->Detailpesan = new DetailpesanModel();
    }
    public function index()
    {
        //$users= $UserMode->select('name,email')->findAll($id);
        # code... 
        $data['data'] = $this->menu->select('id,nama')->findAll();

        if (session ('cart') != null) 
        {
            $data['menu'] = array_values(session('cart'));
        }
        else
        {
            $data['menu'] = null;
        }
        return view("pesan",$data);
    }
    public function addCart()
    {
        # code... 
        $id = $this->request->getPost('id_menu');
        $jumlah =$this->request->getPost('jumlah');
        $menu = $this->menu->find($id);
        if($menu)
        {
        }
        // print_r($id);
        $isi = array(
            'id_menu' =>$id,
            'nama' =>$menu['nama'],
            'harga' =>$menu['harga'],
            'jumlah' =>$jumlah,
        );

        if ($this->session->has('cart')){
            $index = $this->cek($id);
            $cart = array_values(session('cart'));
            if ($index == -1){
                array_push($cart, $isi);
            }else{
                $cart[$index]['jumlah'] += $jumlah;
            }
            $this->session->set('cart',$cart);
        }else{
            $this->session->set('cart', array($isi));
        }
        return redirect('pesan')->with('succes',"data berhasil ditambahkan ".$menu['nama']);
    }
    public function cek($id)
    {
         #code... 
        $cart = array_values(session('cart'));
        for ($i = 0; $i < count($cart); $i++){
            if ($cart[$i]['id_menu'] == $id){
                return $i;
            }
        }
        return -1;
    }
    public function hapusCart($id)
    {
        # code... 
        $index = $this->cek($id);
        $cart= array_values(session('cart'));
        unset($cart[$index]);
        $this->session->set('cart',$cart);
        return redirect('transaksi')->with('success',"data berhasil dihapus");
    }
    public function simpan()
    {
        if (session('cart')!=null)
        {
            $mPesan=array(
                'id_user'=>'7',
                'tanggal'=>date('Y/m/d'),
                'total_harga'=>'0',
                'no_meja'=>$this->request->getPost('no_meja'),
                'status'=>'dibayar',
                'nama_pesanan'=>$this->request->getPost('nama_pemesan'),
            );
            $id=$this->pesan->insert($mPesan);
            $cart = array_values(session('cart'));
            $tharga=0;
            foreach ($cart as $val)
            {
                $dPesan=array(
                    'id_pesan'=>$id,
                    'id_menu'=>$val['id_menu'],
                    'jumlah'=>$val['jumlah'],
                    'harga'=>$val['harga'],
                );
                $tharga +=$val['jumlah']*$val['harga'];
                $this->Detailpesan->insert($dPesan);
            }
            $dtharga=array(
                'total_harga'=>$tharga,);
            $this->pesan->update($id,$tharga);
            $this->session->remove('cart');
            return redirect('pesan')->with('success','pesan berhasil disimpan');
        }
    }
}