<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Sekolah</title>
</head>
<body>

<h2>Form Pendaftaran Sekolah</h2>

<form action="proses_pendaftaran.php" method="post">
    <label for="nama">Nama:</label>
    <input type="text" name="nama" required><br>

    <label for="umur">Umur:</label>
    <input type="number" name="umur" required><br>

    <label for="jenis_kelamin">Jenis Kelamin:</label>
    <select name="jenis_kelamin" required>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select><br>

    <label for="alamat">Alamat:</label>
    <textarea name="alamat" required></textarea><br>

    <label for="kelas">Kelas:</label>
    <input type="text" name="kelas" required><br>

    <label for="jurusan">Jurusan:</label>
    <input type="text" name="jurusan" required><br>

    <label for="nilai_matematika">Nilai Matematika:</label>
    <input type="number" name="nilai_matematika" required><br>

    <label for="nilai_bahasa">Nilai Bahasa:</label>
    <input type="number" name="nilai_bahasa" required><br>

    <label for="nilai_ipa">Nilai IPA:</label>
    <input type="number" name="nilai_ipa" required><br>

    <input type="submit" value="Daftar">
</form>

</body>
</html>

