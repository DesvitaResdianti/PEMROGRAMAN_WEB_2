
<?php 
session_start();
include '../function/format_rupiah.php';
include '../koneksi.php';
 $sql2 = mysqli_query($conn, "SELECT * FROM `disc` WHERE disc.id_disc ORDER by id_disc");
                               $disc = mysqli_fetch_array($sql2);

if(isset($_POST['jml'])) {
	if($_POST['jml'] !== ""){
	$jml = $_POST['jml'];
	$id_tmp = $_POST['id_tmp'];
	$id_brg = $_POST['id_brg'];
	$data['pesan']="";
	if($_POST['jenis'] === "BARANG") {
		$query = "SELECT * FROM product WHERE id_brg = '$id_brg' AND jenis = 'Barang'";
		$exec = mysqli_query($conn,$query);
		$res = mysqli_fetch_assoc($exec);
		if($res['stok'] >= $jml) {
			$stokbaru = $res['stok'] - $jml;
			$query = "UPDATE tmp_trx SET jml = '$jml' WHERE id_tmp = '$id_tmp'";
			$exec = mysqli_query($conn,$query);
			if($exec) {
				$query = "UPDATE product SET stok = '$stokbaru' WHERE id_brg = '$id_brg'";
				$exec = mysqli_query($conn,$query);
				$data['pesan'] = "STOK BERHASIL DI UPDATE";
			}else{
				$data['pesan'] = "STOK GAGAL DI UPDATE";
			}
		}else {
			$data['pesan'] = "DATA STOK TIDAK CUKUP";
		}

	}elseif($_POST['jenis'] === "JASA") {
			$query = "UPDATE tmp_trx SET jml = '$jml' WHERE id_tmp = '$id_tmp'";
			$exec = mysqli_query($conn,$query);
			if($exec) {
				$data['pesan'] = "STOK BERHASIL DI UPDATE";
			}else{
				$data['pesan'] = "STOK GAGAL DI UPDATE";
			}
	}elseif($_POST['jenis'] === "LAINNYAJASA") {
		$query = "UPDATE tmp_trx SET jml = '$jml' WHERE id_tmp = '$id_tmp'";
			$exec = mysqli_query($conn,$query);
			if($exec) {
				$data['pesan'] = "STOK BERHASIL DI UPDATE";
			}else{
				$data['pesan'] = "STOK GAGAL DI UPDATE";
			}
	}elseif($_POST['jenis'] === "LAINNYABARANG") {
		$query = "UPDATE tmp_trx SET jml = '$jml' WHERE id_tmp = '$id_tmp'";
			$exec = mysqli_query($conn,$query);
			if($exec) {
				$data['pesan'] = "STOK BERHASIL DI UPDATE";
			}else{
				$data['pesan'] = "STOK GAGAL DI UPDATE";
			}
	}
	
	echo json_encode($data);
}
}



if(isset($_POST['nama'])) {
	$nama = htmlentities(strtoupper(strip_tags($_POST['nama'])));
	$jml =  htmlentities(strtoupper(strip_tags($_POST['jumlah'])));
	$harga =  htmlentities(strtoupper(strip_tags($_POST['harga'])));
	$jenis = "LAINNYAJASA";
	$id_kasir = $_SESSION['id_kasir'];
	$data['barang'] = "";
	$query = "INSERT INTO product(nama,jenis,harga_jual) VALUES('$nama','$jenis','$harga')";
	$exec = mysqli_query($conn,$query);
	if($exec) {
		$query = "SELECT * FROM product ORDER BY id_brg DESC LIMIT 1";
		$exec  = mysqli_query($conn,$query);
		$res = mysqli_fetch_assoc($exec);
		$id_brg = $res['id_brg'];
		
		$insertmp_trx = "INSERT into tmp_trx(id_brg,jml,id_kasir) VALUES ('$id_brg','$jml','$id_kasir') ";
		$insert = mysqli_query($conn,$insertmp_trx);
		if($insert){
			$data['barang'] = $id_brg;
			$data['pesan'] = "STOK BERHASIL DI UPDATE";
		}
	}
	echo json_encode($data);
}

if(isset($_POST['nama2'])) {
	$nama = htmlentities(strtoupper(strip_tags($_POST['nama2'])));
	$jml =  htmlentities(strtoupper(strip_tags($_POST['jumlah'])));
	$harga_modal =  htmlentities(strtoupper(strip_tags($_POST['harga_modal'])));
	$harga_jual =  htmlentities(strtoupper(strip_tags($_POST['harga_jual'])));
	$jenis = "LAINNYABARANG";
	$id_kasir = $_SESSION['id_kasir'];
	$data['barang'] = "";
	$query = "INSERT INTO product(nama,jenis,harga_modal,harga_jual) VALUES('$nama','$jenis','$harga_modal','$harga_jual')";
	$exec = mysqli_query($conn,$query);
	if($exec) {
		$query = "SELECT * FROM product ORDER BY id_brg DESC LIMIT 1";
		$exec  = mysqli_query($conn,$query);
		$res = mysqli_fetch_assoc($exec);
		$id_brg = $res['id_brg'];
		$insertmp_trx = "INSERT into tmp_trx(id_brg,jml,id_kasir) VALUES ('$id_brg','$jml','$id_kasir') ";
		$insert = mysqli_query($conn,$insertmp_trx);
		if($insert){
			$data['barang'] = $id_brg;
			$data['pesan'] = "STOK BERHASIL DI UPDATE";
		}
	}
	echo json_encode($data);
}

if(isset($_POST['getgrand'])) {
	$query = "SELECT product.*,tmp_trx.* FROM product, tmp_trx WHERE product.id_brg = tmp_trx.id_brg AND tmp_trx.status = 'onprocess'";
	$exec = mysqli_query($conn,$query);
	$total =0;
	while($res = mysqli_fetch_assoc($exec)){
		$harga = $res['harga_jual'];
		$jumlah = $res['jml'];
		$grand = $jumlah * $harga;
		$total += $grand ;

       
	}	

	echo format_rupiah($total);

}

if(isset($_POST['datakon'])) {
	$id_kon = $_POST['datakon'];
	$query = "SELECT * FROM konsumen WHERE id_kon = '$id_kon'";
	$exec= mysqli_query($conn,$query);
	$res = mysqli_fetch_assoc($exec);
	$data['id_kon'] = $res['id_kon'];
	$data['nama_kon'] = $res['nama_kon'];
	$data['no_telp'] = $res['telp'];
	$data['alamat'] = $res['alamat'];
	$data['auth'] = "1";
 	echo json_encode($data);
}


 ?>