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
    >

    <?php $nama_kelas = session()->getFlashdata('nama_kelas');  ?>
     <form action="<?= base_url('/user/store') ?>" method="POST">
        <h1 style="text-align:center;">Isi Data Anda!<h1>
            <div class="mb-3 row d-flex justify-content-center">
                <label for="nama" class="col-sm-10 col-form-label">Nama</label>
                <div class="col-sm-10">
                <input name="nama" type="text" id="nama" 
                class="form-control <?= (empty(validation_show_error('nama'))) ? '':'is-invalid' ?>"  
                    value="<?= old('nama') ?>" >
                    <div class="invalid-feedback">
                        <?= validation_show_error('nama') ?>
                    </div>
                </div>
            </div>

            <div class="mb-3 row d-flex justify-content-center">
                <label for="npm" class="col-sm-10 col-form-label">NPM</label>
                <div class="col-sm-10">
                <input name="npm" type="text" id="npm"
                class="form-control <?= (empty(validation_show_error('npm'))) ? '':'is-invalid' ?>"  
                     value="<?= old('npm') ?>" >
                        <div class="invalid-feedback">
                        <?= validation_show_error('npm') ?>
                    </div>
                </div>
            </div>

            <div class="mb-3 row d-flex justify-content-center">
                <label for="kelas" class="col-sm-10 col-form-label">Kelas</label>
                <div class="col-sm-10">
                <select name="kelas" id="kelas"  aria-label="Default select example"
                class="form-control <?= (empty(validation_show_error('kelas'))) ? '':'is-invalid' ?>">
                        <option selected hidden value="<?= old('kelas') ?>">
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
                 <!-- <input name="kelas" type="text" class="form-control" id="kelas" rows=5 required> -->

            <div style='margin-top:50px'></div>
            <div class="text-center">
                <button type="submit" class="btn btn-dark mb-3 w-25 p-2">Kirim</button>
            </div>
        
        </form>
        </div>
        <?=$this->endSection()?>