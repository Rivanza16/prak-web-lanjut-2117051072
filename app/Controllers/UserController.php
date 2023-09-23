<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\UserModel;

global $kelas;
$kelas = [
    [
        'id' => 1,
        'nama_kelas' => 'A'
    ],
    [
        'id' => 2,
        'nama_kelas' => 'B'
    ],
    [
        'id' => 3,
        'nama_kelas' => 'C'
    ],
    [
        'id' => 4,
        'nama_kelas' => 'D'
    ]

];

class UserController extends BaseController
{
    public function index()
    {
        //
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
        global $kelas;
        $data =[
            'kelas' => $kelas
        ];

        return view('create_user', $data);
    }

    public function store(){
        $kelasModel = new KelasModel();
        if($this->request->getVar('kelas') != ''){
            $kelas_select = $kelasModel->where('id', $this->request->getVar('kelas'))->first();
            $nama_kelas = $kelas_select['nama_kelas'];
        }
        else{
            $nama_kelas = '';
        }

        $userModel = new UserModel();
        if(!$this->validate([
            'nama' => 'required|alpha_space',
            'npm' => 'required|is_unique[user.npm]|integer|min_length[10]',
            'kelas' => 'required'
        ]))
            {
            global $kelas;
            $data = [
                'kelas' => $kelas,
                'validation' => $this->validator,
                'old_nama' => $this->request->getVar('nama'),
                'old_npm' => $this->request->getVar('npm'),
                'old_kelas' => $this->request->getVar('kelas'),
                'old_nama_kelas' => $nama_kelas
            ];
            return view('create_user', $data);
            }

        $userModel->saveUser([
            'nama' => $this->request->getVar('nama'),
            'npm' => $this->request->getVar('npm'),
            'id_kelas' => $this->request->getVar('kelas'),
        ]);
        
        $showed_data = [
            'nama' => $this->request->getVar('nama'),
            'npm' => $this->request->getVar('npm'),
            'kelas' => $nama_kelas,
        ];
        return view('profile', $showed_data);
    }
}
