<?= $this->extend('layouts/app'); ?>

<?= $this->section('content') ?>

    <div class="container-header">
        <br>
        <br>
        <br>
        <center><h1>Daftar Data Users</h1></center>
    </div>
    <div class="container" 
    style="
    
    height: 500px;
    margin-top: 10px; 
    width: 50%;
    padding-top: 20px;
    padding-bottom: 50px;
    overflow-x: hidden;
    overflow-y: auto;
    
    <a href='<?base_url('user/create')?>"></a>
        <table class="table table-danger table-striped">
            <thead>
                <tr>
                    <th class="col justify-content-center text-center">Id</th>
                    <!-- <th class="col justify-content-center text-center">Foto</th> -->
                    <th class="col justify-content-center text-center">Nama</th>
                    <th class="col justify-content-center text-center">NPM</th>
                    <th class="col justify-content-center text-center">Kelas</th>
                    <th class="col justify-content-center text-center">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($user as $user){
                ?>
                    <tr>
                        <td class="col justify-content-center text-center"><?= $user['id'] ?></td>
                        <td class="col justify-content-center"><?= $user['nama'] ?></td>
                        <td class="col justify-content-center text-center"><?= $user['npm'] ?></td>
                        <td class="col justify-content-center text-center"><?= $user['nama_kelas'] ?></td>
                        <td class="col justify-content-center text-center">
                            
                            
                            <a class="btn btn-dark" href="<?= base_url('user/'.$user['id']) ?>">Detail</a>
                            <button type="button" class="btn btn-danger">Hapus</button>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <a href="<?=base_url('/user/create')?> "class="btn btn-info">Tambah Data</a>
    </div>

<?= $this->endSection() ?>