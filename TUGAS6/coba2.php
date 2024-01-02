<?php
// Sambungkan ke database (gantilah sesuai dengan konfigurasi Anda)
$koneksi = new mysqli("localhost", "root", "", "db_sekolah");

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data dari formulir pendaftaran
$nama = $_POST['nama'];
$umur = $_POST['umur'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$nilai_matematika = $_POST['nilai_matematika'];
$nilai_bahasa = $_POST['nilai_bahasa'];
$nilai_ipa = $_POST['nilai_ipa'];

// Simpan data ke database
$sql = "INSERT INTO data_siswa (nama, umur, jenis_kelamin, alamat, kelas, jurusan, nilai_matematika, nilai_bahasa, nilai_ipa)
        VALUES ('$nama', $umur, '$jenis_kelamin', '$alamat', '$kelas', '$jurusan', $nilai_matematika, $nilai_bahasa, $nilai_ipa)";

if ($koneksi->query($sql) === TRUE) {
    echo "Pendaftaran berhasil";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

// Tutup koneksi
$koneksi->close();
?>
