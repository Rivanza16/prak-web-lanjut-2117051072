<?=$this->extend('layouts/app')?>
<?=$this->section('content')?>
<div class="content">
<h1>Selamat Datang!</h1>
        <img src="<?php echo base_url('assets/img/passft.jpeg'); ?>" alt="photo profile"> <br>
        <h1><?= $nama ?></h1>
        <p>Kelas <?= $kelas ?></p>
        <p>NPM <?= $npm ?></p>
</div>
<?=$this->endSection()?>