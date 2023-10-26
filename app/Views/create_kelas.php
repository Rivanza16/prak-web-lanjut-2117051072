<?=$this->extend('layouts/app')?>
<?=$this->section('content')?>
<div class="row alignment-items-center" 
        style="position:absolute; 
        background-color:pink;
        width:45%;
        left:52%;
        top:50%;
        transform:translate(-50%, -45%);
        border-radius:15px;
        "
    >

    <?php $nama_kelas = session()->getFlashdata('nama_kelas');  ?>
     <form action="<?= base_url('/kelas/store') ?>" method="POST" enctype="multipart/form-data">
        <h1 style="text-align:center;">Tambah Data Kelas<h1>
            <div class="mb-3 row d-flex justify-content-center">
                <label for="nama_kelas" class="col-sm-10 col-form-label">Nama Kelas</label>
                <div class="col-sm-10">
                <input name="nama_kelas" type="text" placeholder="Masukkan nama kelas" id="kelas" 
                class="form-control <?= (empty(validation_show_error('nama_kelas'))) ? '':'is-invalid' ?>"  
                    value="<?= old('nama_kelas') ?>" >
                    <div class="invalid-feedback">
                        <?= validation_show_error('nama_kelas') ?>
                    </div>
                     </div>

                 <!-- <input name="kelas" type="text" class="form-control" id="kelas" rows=5 required> -->

            <div style='margin-top:50px'></div>
            <div class="text-center">
                <button type="submit" class="btn btn-dark mb-3 w-25 p-2">Kirim</button>
            </div>
        
        </form>
        </div>
        <?=$this->endSection()?>