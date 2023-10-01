<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\UserModel;

class UserController extends BaseController
{
    public $userModel;
    public $kelasModel;
    protected $helpers=['form'];

    public function __construct()
    {
        $this->userModel= new UserModel();
        $this->kelasModel= new KelasModel();
        
    }
    
    public function index()
    {
        $data=[
        'title'=> 'List User',
        'user' => $this->userModel->getUser(),
        ];
        return view ('list_user',$data);
    }

    public function profile($nama="", $kelas="", $npm=""){
        $data = [
            
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ];

        return view('profile',$data);
    }

    public function create(){
        
        $kelas = $this->kelasModel->getKelas();
       
        $data =[
            'title'=> 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function store(){
       
        if($this->request->getVar('kelas') != ''){
            $kelas_select = $this->kelasModel->where('id', $this->request->getVar('kelas'))->first();
            $nama_kelas = $kelas_select['nama_kelas'];
        }
        else{
            $nama_kelas = '';
        }

        // $userModel = new UserModel();
        if(!$this->validate([
            'nama' => 'required|alpha_space',
            'npm' => 'required|is_unique[user.npm]|integer|min_length[12]',
            'kelas' => 'required'
        ]))
            {
                session()->setFlashdata('nama_kelas');
                return redirect()->back()->withInput()->with('nama_kelas', $nama_kelas);
            }
            

        $this->userModel->saveUser([
            'nama' => $this->request->getVar('nama'),
            'npm' => $this->request->getVar('npm'),
            'id_kelas' => $this->request->getVar('kelas'),
        ]);
        
        return redirect()->to('/user');
        // $showed_data = [

        //     'title'=> 'Profile',
        //     'nama' => $this->request->getVar('nama'),
        //     'npm' => $this->request->getVar('npm'),
        //     'kelas' => $nama_kelas,
        // ];
        
        // return view('profile', $showed_data);
    }
}
