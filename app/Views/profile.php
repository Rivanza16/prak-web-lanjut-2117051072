<?=$this->extend('layouts/app')?>
<?=$this->section('content')?>
<div class="content">
<h1>Selamat Datang!</h1>
<img class="photo profile" src="<?= $user['foto'] ?? base_url('/assets/img/placeholder-image.jpg') ?>" alt="">
<br>
<h2>-<?= $user['nama'] ?>-</h2>
        <p>NPM : <?= $user['npm'] ?></p>
        <p>Kelas : <?= $user['nama_kelas'] ?></p>
        
</div>
<?=$this->endSection()?>