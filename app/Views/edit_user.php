<?=$this->extend('layouts/app')?>
<?=$this->section('content')?>
<div class="row alignment-items-center" 
        style="position:absolute; 
        background-color:pink;
        width:48%;
        left:50%;
        top:66%;
        transform:translate(-50%, -45%);
        border-radius:5px;
    

    <?php $nama_kelas = session()->getFlashdata('nama_kelas');  ?>
     <form action="<?= base_url('/user/' .$user['id']) ?>" method="POST" enctype="multipart/form-data">
     <!-- untuk manipulasi -->
     <input type="hidden" name="_method" value="PUT"> 
     <!--untuk keamanan pd saat tekan tombol sumbit-->
     <?= csrf_field()?>

     <h1 style="text-align:center;">Edit Data Anda!<h1>
            <div class="mb-3 row d-flex justify-content-center">
                <label for="nama" class="col-sm-10 col-form-label">Nama</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" <?= (empty(validation_show_error('nama'))) ? '':'is-invalid' ?>name="nama"
                value="<?=$user['nama']?>"id="nama" >
                <!-- <?= (empty(validation_show_error('nama'))) ? '':'is-invalid' ?>"  
                    value="<?= old('nama') ?>" > -->
                    <div class="invalid-feedback">
                        <?= validation_show_error('nama') ?>
                    </div>
                </div>
            </div>

            <div class="mb-3 row d-flex justify-content-center">
                <label for="npm" class="col-sm-10 col-form-label">NPM</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" <?= (empty(validation_show_error('npm'))) ? '':'is-invalid' ?>name="npm"
                value="<?=$user['npm']?>"id="npm" >
                        <div class="invalid-feedback">
                        <?= validation_show_error('npm') ?>
                    </div>
                </div>
            </div>

            <div class="mb-3 row d-flex justify-content-center">
                <label for="kelas" class="col-sm-10 col-form-label">Kelas</label>
                <div class="col-sm-10">
                <!-- <select name="kelas" id="kelas"  aria-label="Default select example"
                class="form-control <?= (empty(validation_show_error('kelas'))) ? '':'is-invalid' ?>"> -->
                <select type="text" aria-label="Default select example" class="form-control" <?= (empty(validation_show_error('kelas'))) ? '':'is-invalid' ?>name="kelas"
                value="<?=$user['nama']?>"id="kelas" >
                        <!-- <option selected hidden value="<?= old('kelas') ?>"> -->
                            <?= ($nama_kelas=='')?'Pilih Kelas Anda': $nama_kelas?>
                        </option>
                        <?php
                            foreach ($kelas as $item){
                        ?>  
                            <option value="<?= $item['id'] ?>">
                                <?= $item['nama_kelas'] ?>
                            </option>
                        <?php 
                            }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= validation_show_error('kelas') ?>
                    </div>
                </div>
            </div>

            <div class="mb-3 row d-flex justify-content-center">
                <label for="foto" class="col-sm-10 col-form-label">Input Foto</label>
                <div class="text-center">
                <img src="<?=$user['foto']?? '<default-foto>'?>">
                <input type="file" name="foto" id="foto"
                class="form-control <?= (empty(validation_show_error('foto'))) ? '':'is-invalid' ?>"  
                     value="<?= old('foto') ?>" >
                        <div class="invalid-feedback">
                        <?= validation_show_error('foto') ?>
                    </div>
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