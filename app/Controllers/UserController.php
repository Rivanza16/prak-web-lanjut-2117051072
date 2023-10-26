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
            'title' =>'Profile',
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
            'npm' => 'required|is_unique[user.npm]|integer|min_length[10]',
            'kelas' => 'required'
        ]))
            {
                session()->setFlashdata('nama_kelas');
                return redirect()->back()->withInput()->with('nama_kelas', $nama_kelas);
            }

        $path='assets/uploads/img/';
        $foto=$this->request->getFile('foto');
        $name=$foto->getRandomName();

        //opload foto
        if($foto->move($path, $name)){
            $foto=base_url($path.$name);
        }
            

        $this->userModel->saveUser([
            'nama' => $this->request->getVar('nama'),
            'npm' => $this->request->getVar('npm'),
            'id_kelas' => $this->request->getVar('kelas'),
            'foto' => $foto
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
    public function show($id)
    {
        $user= $this->userModel->getUser($id);
        $data=[
        'title'=> 'Profile',
        'user' => $user,
        ];
        return view ('profile',$data);
    }

    public function edit($id)
    {
        $user= $this->userModel->getUser($id);
        $kelas= $this->kelasModel->getKelas();
        $data=[
        'title'=> 'Edit User',
        'user' => $user,
        'kelas' => $kelas,
        ];
        return view ('edit_user',$data);
    }

    public function update($id){
        $path='assets/uploads/img/';
        $foto=$this->request->getFile('foto');
        
        $data=[
            'nama' => $this->request->getVar('nama'),
            'npm' => $this->request->getVar('npm'),
            'id_kelas' => $this->request->getVar('kelas'),
            // 'foto' => $foto_path,
        ];
        if($foto->isValid()){
            $name=$foto->getRandomName();

            if($foto->move($path,$name)){
                $foto_path=base_url($path.$name);
                $data['foto'] = $foto_path;
            }
        }

        $result=$this->userModel->updateUser($data,$id);

        if (!$result){
            return redirect()->back()->withInput()
                ->with('error', 'Gagal Menyimpan data');
        }
        return redirect()->to('/user');
    }
    public function destroy($id)
    {
        $result= $this->userModel->deleteUser($id);
        if(!$result){
            return redirect()->back()->with('error','Gagal menghapus data');
        }
        return redirect ()->to(base_url('/user'))
        ->with('success','Berhasil menghapus data');
    }
}
