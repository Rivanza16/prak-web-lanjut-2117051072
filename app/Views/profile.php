<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
<div class="content">
<h1>Selamat Datang!</h1>
        <img src="<?php echo base_url('assets/img/passft.jpeg'); ?>" alt="photo profile"> <br>
<table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?=$nama?></td>
</tr>
<tr>
            <td>Kelas</td>
            <td>:</td>
            <td><?=$kelas?></td>
</tr>
<tr>
            <td>NPM</td>
            <td>:</td>
            <td><?=$npm?></td>
</tr>
</table>
</div>
</body>
</html>