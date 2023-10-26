<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('./assets/css/style.css'); ?>">  
</head>

<body style="background-image: url(<?= base_url('./assets/img/backg.jpg') ?>)">
<nav class="navbar navbar-expand-lg navbar-light bg-light bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/user')?>" id="user">List User</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="navbar-brand" href="<?= base_url('/kelas')?>" id="user">List Kelas</a>
                </li>
            </ul>
            
        </div>
        <span class="navbar-text" style="margin-top: 5px; font-weight: bold; font-size: large; font-style: inherit; ">2117051072</span>
    </div>
</nav>
    <?= $this->renderSection('content')?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>