<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MenuModel;
class MenuController extends Controller
{
/**
     * 
     * Instance of the main Request objek.
     * 
     * @var HTTP//IncomingRequest
     */
    protected $request;
    function __construct()
    {
        $this->menus = new MenuModel();
    }
    public function tampil()
    {
        //$menus = new MenuModel();
        $data['data'] = $this->menus->findAll();
        return view('menu',$data);
    }
    public function create()
    {
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'jumlah' => $this->request->getPost('jumlah'),
            'keterangan' => $this->request->getPost('keterangan'),
            'jenis' => $this->request->getPost('jenis'),
        );
    }
    public function edit()
    {
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('useruname'),
            'password' => password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'jenis' => $this->request->getPost('jenis'),
        );
        $this->menus->update($id,$data);
        return redirect('menu')->with ('succes','data berhasil diedit');
    }
}