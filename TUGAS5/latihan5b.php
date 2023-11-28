<?php

$mahasiswa = [
   [
        "Nama" => "Desvita Resdianti",
        "email" => "desvitaresdianti@gmail.com",
        "Gambar" => "des.jpg",
        "Jurusan" => "Sistem informasi",
        "universitas" => "universitas Islam Negeri Sulthan Thaha Saifuddin Jambi"
    ],
     [
        "Nama" => "Nurmawaddah",
        "email" => "waddah@gmail.com",
        "Gambar" => "waddah.jpg",
        "Jurusan" => "sistem informasi",
        "universitas" => "Universitas Islam Negeri Sulthan Thaha Saifuddin Jambi"
    ],
    [
        "Nama" => "Salsabillah Izmirafifah",
        "email" => "salsabillahizmirafifah@gmail.com",
        "Gambar" => "salsa.jpg",
        "Jurusan" => "sistem informasi",
        "universitas" => "Universitas Islam Negeri Sulthan Thaha Saifuddin Jambi"
    ],
    [
        "Nama" => "Isti Markamah",
        "email" => "istiiiiii@gmail.com",
        "Gambar" => "isti.jpg",
        "Jurusan" => "sistem informasi",
        "universitas" => "Universitas Islam Negeri Sulthan Thaha Saifuddin Jambi"
    ],
   
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FAF8ED;
            text-align: center;
        }
        .box{
            width: 450px;
            height: 500px;
            background-color: white;
            margin: 20px auto;
            padding: 10px;
        }
        .card {
            width: 400px;
            background-color: #floralwhite;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
        }
        .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            float: left;
            margin-bottom: 10px;
        }
        a{
           
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    
    <div class="box">
    <?php foreach ($mahasiswa as $mhs) : ?>
            <div class="card">
                <img class="profile-image" src="img/<?= $mhs["Gambar"];?>">
                <h2><a href="profil-mahasiswa.php?Nama=<?= $mhs ["Nama"];?>&Gambar=<?= $mhs ["Gambar"];?>&email=<?= $mhs ["email"];?>&Jurusan= <?= $mhs ["Jurusan"];?>&universitas= <?= $mhs ["universitas"]; ?>"><?= $mhs["Nama"];?></a></h2>  
                <p><?= $mhs["email"];?></p>
            </div>
            <?php endforeach; ?>
        </div>


</body>
</html>