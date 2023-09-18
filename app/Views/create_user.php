<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>


<body style="background-image: url(<?= base_url('./assets/img/backg.jpg') ?>)">

<div class="row alignment-items-center" 
        style="position:absolute; 
        background-color:pink;
        width:45%;
        left:52%;
        top:50%;
        transform:translate(-50%, -45%);
        border-radius:15px;
        padding:15px;
        padding-bottom: 35px;
        color: Pink;
        background-color: #fdfeff47;
        -webkit-backdrop-filter: blur(5px);
        backdrop-filter: blur(5px);"
    >

        <form action="<?= base_url('/user/store') ?>" method="POST">
        <h1 style="text-align:center;">Isi Data Anda!<h1>
            <div class="mb-3 row d-flex justify-content-center">
                <label for="nama" class="col-sm-10 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input name="nama" type="text" class="form-control" id="nama" required>
                </div>
            </div>
            <div class="mb-3 row d-flex justify-content-center">
                <label for="npm" class="col-sm-10 col-form-label">NPM</label>
                <div class="col-sm-10">
                    <input name="npm" type="number" class="form-control" id="npm" required>
                </div>
            </div>
            <div class="mb-3 row d-flex justify-content-center">
                <label for="kelas" class="col-sm-10 col-form-label">Kelas</label>
                <div class="col-sm-10">
                    <input name="kelas" type="text" class="form-control" id="kelas" rows=5 required>
                </div>

            <div style='margin-top:50px'></div>
            <div class="text-center">
                <button type="submit" class="btn btn-dark mb-3 w-25 p-2">Kirim</button>
            </div>
        
        </form>
        </div>
    </body>
</html>