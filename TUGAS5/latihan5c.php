<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FAF8ED;
            text-align: center;
        }
        .box{
            width: 400px;
            height: 450px;
            background-color: #D2E3C8;
            margin: 10px auto;
            padding: 10px;
        }

        .card {
            width: 300px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
            text-align: center;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .kembali {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2>Profil Mahasiswa</h2>
<div class="box">

    <div class="card">
        <img class="profile-image" src="img/<?= $_GET["Gambar"]; ?>">
        <h2><?= $_GET["Nama"]; ?></h2>
        <p><?= $_GET["email"]; ?></p>
        <p><?= $_GET["Jurusan"]; ?> <?= $_GET["universitas"]; ?></p>
        <a href="latihan5b.php" class="kembali">Kembali</a>
    </div>
</div>
    
</body>
</html>