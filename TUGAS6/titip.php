<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_sekolah");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data) {
	global $conn;

	$nisn = htmlspecialchars($data["nisn"]);
	$Nama_Siswa = htmlspecialchars($data["Nama_Siswa"]);
	$Tanggal_Lahir = htmlspecialchars($data["Tanggal_Lahir"]);
	$Jenis_Kelamin = htmlspecialchars($data["Jenis_Kelamin"]);
	$Alamat = htmlspecialchars($data["Alamat"]);
	$Email = htmlspecialchars($data["Email"]);
	$No_Hp = htmlspecialchars($data["No_Hp"]);
	

	// upload gambar
	$Gambar = upload();
	if( !$Gambar ) {
		return false;

	$Aksi = htmlspecialchars($data["Aksi"]);
	}

	$query = "INSERT INTO tbl_siswa
				VALUES
			  ('', '$nisn', '$Nama_Siswa', '$Tanggal_Lahir', '$Jenis_Kelamin', '$Alamat', '$Email', '$No_Hp', '$Gambar', 'Aksi')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload(){

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4){
        echo "<script>
            alert('Pilih gambar terlebih dahulu');
        </script>";
        return false;
    }
    $gambarvalid = ['jpg', 'jpeg', 'png'];
    $eksengambar = explode('.', $namaFile);
    $eksengambar = strtolower(end($eksengambar));
    if(!in_array($eksengambar, $gambarvalid)){
        echo "<script>
            alert('silakan pilih gambar kembali');
        </script>";
        return false;
    }

    if($ukuranFile > 1000000) {
        echo "<script>
        alert('Ukuran foto terlalu besar');
    </script>";
    return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $eksengambar;
    move_uploaded_file($tmpName, 'img/'. $namaFileBaru);

    return $namaFileBaru;

}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tbl_siswa WHERE id = $id");
	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	$id = $data["id"];
	$nisn = htmlspecialchars($data["nisn"]);
	$Nama_Siswa = htmlspecialchars($data["Nama_Siswa"]);
	$Tanggal_Lahir = htmlspecialchars($data["Tanggal_Lahir"]);
	$Jenis_Kelamin = htmlspecialchars($data["Jenis_Kelamin"]);
	$Alamat = htmlspecialchars($data["Alamat"]);
	$Email = htmlspecialchars($data["Email"]);
	$No_Hp = htmlspecialchars($data["No_Hp"]);
	$GambarLama = htmlspecialchars($data["GambarLama"]);
	$Aksi = htmlspecialchars($data["Aksi"]);
	
	// cek apakah user pilih gambar baru atau tidak
	if( $_FILES['Gambar']['error'] === 4 ) {
		$Gambar = $GambarLama;
	} else {
		$Gambar = upload();
	}
	

	$query = "UPDATE tbl_siswa SET
				nisn = '$nisn',
				Nama_Siswa = '$Nama_Siswa',
				Tanggal_Lahir = '$Tanggal_Lahir',
				Jenis_Kelamin = '$Jenis_Kelamin',
				Alamat = '$Alamat',
				Email = '$Email',
				No_Hp = '$No_Hp',
				Gambar = '$Gambar',
				Aksi = '$Aksi',
			  WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}

?>