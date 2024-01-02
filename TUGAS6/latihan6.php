<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>
    <link rel="stylesheet" href="latihan.css">
</head>
<body>
<h1>FORMULIR PENDAFTARAN</h1>
<div class="container">
    <form action="proses_pendaftaran.php" method="post">
        <label for="id_mahasiswa">ID Mahasiswa:</label>
        <input type="text" id="id_mahasiswa" name="id_mahasiswa" required>

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" required></textarea>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label for="tgl_lahir">Tanggal Lahir:</label>
        <input type="date" id="tgl_lahir" name="tgl_lahir" required>

        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" required>

        <label for="minat">Minat:</label>
        <input type="text" id="minat" name="minat" required>

        <label for="foto">Foto:</label>
        <input type="text" id="foto" name="foto" required>

        <div class="button-container">
            <button type="submit" name="daftar">Daftar</button>
            <button type="button" onclick="window.location.href='batal.php'">Batal</button>
        </div>
    </form>
</div>

</body>
</html>