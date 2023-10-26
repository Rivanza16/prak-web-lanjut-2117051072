<?= $this->extend('layouts/app'); ?>

<?= $this->section('content') ?>

    <div class="container-header">
        <br>
        <br>
        <br>
        <center><h1>Daftar Data Kelas</h1></center>
    </div>
    <div class="container" 
    style="
    
    height: 800px;
    margin-top: 10px; 
    width: 48%;
    padding-top: 20px;
    padding-bottom: 50px;
    overflow-x: hidden;
    overflow-y: auto;
    
    <a href='<?base_url('kelas/create')?>"></a>
        <table class="table table-danger table-striped">
            <thead>
                <tr>
                    <th class="col justify-content-center text-center">Id</th>
                    <!-- <th class="col justify-content-center text-center">Foto</th> -->
                    <th class="col justify-content-center text-center">Nama Kelas</th>
                    <th class="col justify-content-center text-center">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($kelas as $key){
                ?>
                    <tr>
                        <td class="col justify-content-center text-center"><?= $key['id'] ?></td>
                        <td class="col justify-content-center text-center"><?= $key['nama_kelas'] ?></td>
                        <!--  -->
                        <td class="col justify-content-center text-center">
                            
                            <a class="btn btn-light" href="<?= base_url('kelas/'.$key['id']) .'/edit_kelas'?>">Edit</a>
                            
                            <form class="btn-delete" action="<?=base_url('kelas/'.$key['id']) ?>" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <?=csrf_field()?>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <a href="<?=base_url('/kelas/create')?> "class="btn btn-info">Tambah Data</a>
    </div>

<?= $this->endSection() ?>