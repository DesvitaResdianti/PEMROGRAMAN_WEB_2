<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari formulir
    $id_mahasiswa = $_POST["id_mahasiswa"];
    $nama = $_POST["nama"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $tanggal_lahir = $_POST["tgl_lahir"];
    $alamat = $_POST["alamat"];
    $jurusan = $_POST["jurusan"];
    $minat = $_POST["minat"];

    // Upload file foto
    $foto = $_FILES["foto"];
    $foto_name = $foto["name"];
    $foto_tmp = $foto["tmp_name"];
    $foto_path = "uploads/" . $foto_name;
    move_uploaded_file($foto_tmp, $foto_path);

    // Lakukan koneksi ke database
    $host = "localhost";  // Ganti dengan host database Anda
    $username = "username_database";  // Ganti dengan username database Anda
    $password = "password_database";  // Ganti dengan password database Anda
    $database = "nama_database";  // Ganti dengan nama database Anda

    // Buat koneksi
    $koneksi = mysqli_connect($host, $username, $password, $database);

    // Cek koneksi
    if (!$koneksi) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Persiapkan query untuk menyimpan data ke database
    $query = "INSERT INTO mahasiswa (id_mahasiswa, nama, jenis_kelamin, tgl_lahir, alamat, jurusan, minat, foto)
              VALUES ('$id_mahasiswa', '$nama', '$jenis_kelamin', '$tgl_lahir', '$alamat', '$jurusan', '$minat', '$foto_name')";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        echo "Terima kasih, $nama! Pendaftaran Anda dengan ID Mahasiswa $id_mahasiswa, jenis kelamin $jenis_kelamin, tgl lahir $tgl_lahir, alamat $alamat, jurusan $jurusan, minat $minat, dan foto $foto_name telah berhasil.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulir Pendaftaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    body h5 {
      te
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 750px;
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input, select, textarea {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
    }

    button {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

  <form action="proses_pendaftaran.php" method="post">
    <h5>FORMULIR PENDAFTARAN</h5>
    <br>
    <label for="id_mahasiswa">ID Mahasiswa:</label>
    <input type="text" id="id_mahasiswa" name="id_mahasiswa" required>

    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" required>

    <label for="jenis_kelamin">Jenis Kelamin:</label>
    <select id="jenis_kelamin" name="jenis_kelamin" required>
      <option value="pria">Pria</option>
      <option value="wanita">Wanita</option>
    </select>

    <label for="tanggal_lahir">Tanggal Lahir:</label>
    <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>

    <label for="alamat">Alamat:</label>
    <textarea id="alamat" name="alamat" rows="4" required></textarea>


    <label for="jurusan">Jurusan:</label>
    <input type="text" id="jurusan" name="jurusan" required>

    <label for="jenis_kelamin">Minat</label>
    <select id="jenis_kelamin" name="jenis_kelamin" required>
      <option value="progreming">Prongreming</option>
      <option value="animasi">Animasi</option>
      <option value="desain">Desain</option>
      <option value="mapala">Mapala</option>
    </select>

    

    <label for="foto">foto:</label>
    <input type="file" id="foto" name="foto" accept="image/*" required>

    <button type="submit">Daftar</button>
    <button type="submit">Batal</button>

    </select>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>