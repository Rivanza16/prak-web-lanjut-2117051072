<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;


class KelasController extends BaseController
{
    public $kelasModel;
    protected $helpers=['form'];
    public function __construct()
    {
        $this->kelasModel  = new KelasModel();
    }
    public function index()
    {
        $data=[
        'title'=> 'List Kelas',
        'kelas' => $this->kelasModel->getKelas(),
        ];
        return view ('list_kelas',$data);
    }
    public function create(){
        
        $kelas = $this->kelasModel->getKelas();
       
        $data =[
            'title'=> 'Create Kelas',
            'kelas' => $kelas,
        ];

        return view('create_kelas', $data);
    }
    public function store(){
        if(!$this->validate([
            'nama_kelas' => 'required|alpha_space'
        ]))

        return redirect()->back()->withInput();
        $data=[
            'nama_kelas'=>$this->request->getVar('nama_kelas'),
        ];
        $this ->kelasModel->saveKelas($data);
        return redirect()->to ('/kelas');
    }

    public function edit($id)
    {
        $kelas= $this->kelasModel->getKelas($id);
        $data=[
        'title'=>'Edit Kelas',
        'kelas' => $kelas,
        ];
        return view ('edit_kelas',$data);
    }
    public function update($id){
       
        $data=[
            'kelas' => $this->request->getVar('kelas'),
        ];

        $result=$this->kelasModel->updateKelas($data,$id);

        if (!$result){
            return redirect()->back()->withInput()
                ->with('error', 'Gagal Menyimpan data');
        }
        return redirect()->to('/kelas');
    }
    public function destroy($id)
    {
        $result= $this->kelasModel->deleteKelas($id);
        if(!$result){
            return redirect()->back()->with('error','Gagal menghapus data');
        }
        return redirect ()->to(base_url('/kelas'))
        ->with('success','Berhasil menghapus data');
    }
}
