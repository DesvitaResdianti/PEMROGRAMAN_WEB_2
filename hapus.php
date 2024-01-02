<?php
include "sess_check.php";
 include 'koneksi.php';

if(isset($_GET['id_sup'])) {
	$id_sup=$_GET['id_sup'];
	$query = "DELETE FROM suplier WHERE id_sup = $id_sup";
	$exec = mysqli_query($conn,$query);
	if($exec) {
		echo "<script>alert('Data Berhasil Dihapus')</script>";
		echo "<script>document.location = 'datasuplier.php'</script>";
	}
}

if(isset($_GET['id_kasir'])) {
	$id_kasir=$_GET['id_kasir'];
	$query = "DELETE FROM kasir WHERE id_kasir = $id_kasir";
	$exec = mysqli_query($conn,$query);
	if($exec) {
		echo "<script>alert('Data Berhasil Dihapus')</script>";
		echo "<script>document.location = 'kasir.php'</script>";
	}
}

if(isset($_GET['id_brg'])) {
	$id_brg=$_GET['id_brg'];
	$query = "DELETE FROM product WHERE id_brg = $id_brg";
	$exec = mysqli_query($conn,$query);
	if($exec) {
		echo "<script>alert('Data Berhasil Dihapus')</script>";
		echo "<script>document.location = 'barang.php'</script>";
	}
}
if(isset($_GET['id_disc'])) {
	$id_disc=$_GET['id_disc'];
	$query = "DELETE FROM disc WHERE id_disc = $id_disc";
	$exec = mysqli_query($conn,$query);
	if($exec) {
		echo "<script>alert('Data Berhasil Dihapus')</script>";
		echo "<script>document.location = 'discount.php'</script>";
	}
}
if(isset($_GET['id_trx'])) {
	$id_trx=$_GET['id_trx'];
	$query = "DELETE FROM trxbarang WHERE id_trx = $id_trx";
	$exec = mysqli_query($conn,$query);
	if($exec) {
		echo "<script>alert('Data Berhasil Dihapus')</script>";
		echo "<script>document.location = 'barangmasuk.php'</script>";
	}
}

if(isset($_GET['id_kon'])) {
	$id=$_GET['id_kon'];
	$query = "DELETE FROM konsumen WHERE id_kon = $id";
	$exec = mysqli_query($conn,$query);
	if($exec) {
		echo "<script>alert('Data Berhasil Dihapus')</script>";
		echo "<script>document.location = 'datakonsumen.php'</script>";
	}
}


 ?>