<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
class UserController extends Controller
{
    function __construct()
    {
        $this->users = new UserModel();
    }
    public function tampil()
    {
        //$users = new UserModel();
        $data['data'] = $this->users->findAll();
        return view('user',$data);
    }
    public function create()
    {
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('useruname'),
            'password' => password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
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
        $this->users->update($id,$data);
        return redirect('user')->with ('succes','data berhasil diedit');
    }
}
?>