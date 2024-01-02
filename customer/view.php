<!-- <link rel="stylesheet" href="css/printing.css"> -->
<?php 
include 'sess_check.php';
include '../koneksi.php';
include '../function/format_tanggal.php';
include '../function/format_rupiah.php';
 ?>
 <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <?php 
    if(isset($_POST['id_trx'])){
      $id = $_POST['id_trx'];
        $sql = "SELECT trx.*, tmp_trx.*, product.*, konsumen.*, disc.*, kasir.*, status_transaksi.* FROM trx, tmp_trx, product, konsumen, disc,  kasir , status_transaksi  WHERE trx.id_trx=tmp_trx.id_trx AND trx.id_kon=konsumen.id_kon AND tmp_trx.id_brg=product.id_brg
        and trx.id_discount=disc.id_disc AND trx.id_kasir = kasir.id_kasir and trx.status_transaksi=status_transaksi.id_transaksi  AND trx.id_trx='". $id ."'";




    $query = mysqli_query($conn,$sql);
    $res = mysqli_fetch_array($query);
         ?>
        <div id="section-to-print">
  <section id="header-kop">
    <div class="container-fluid">
      <table class="table table-borderless">
        <tbody>
          <tr>
            <td class="text-left" width="20%">
              <img src="../foto/book.png" alt="logo-dkm" width="65" />
            </td>
            <td class="text-center" width="60%">
            <?php $exec = mysqli_query($conn,"SELECT * FROM info");
                $info = mysqli_fetch_assoc($exec);
               ?>
            <b><?= $info['nama_toko'] ?></b> <br>
            <?= $info['alamat'] ?><br>
            <?= $info['no_telp'] ?><br>
            <td class="text-right" width="20%">
            </td>
          </tr>
        </tbody>
      </table>
      <hr class="line-top" />
    </div>
  </section>

  <section id="body-of-report">
    <div class="container-fluid">
      <h4 class="text-center">Detail Transaksi</h4>
      <br />
<table width="100%">
  <tr>
    <td width="20%"><b>ID. Transaksi</b></td>
    <td width="2%"><b>:</b></td>
    <td width="78%"><?php echo $res['id_trx'];?></td>
  </tr>
  <tr>
    <td width="20%"><b>Tanggal</b></td>
    <td width="2%"><b>:</b></td>
    <td width="78%"><?php echo format_tanggal($res['tgl_trx']);?></td>
  </tr>
 
  <tr>
    <td width="20%"><b>Konsumen</b></td>
    <td width="2%"><b>:</b></td>
    <td width="78%"><?php echo $res['nama_kon'];?></td>
  </tr>
  <tr>
    <td width="20%"><b>Kasir</b></td>
    <td width="2%"><b>:</b></td>
    <td width="78%"><?php echo $res['nama_ksr'];?></td>
  </tr>
  
</table>
</br>
  
   
 <?php
  $dis=($res['discount']);
  $total=($res['total']);
  $discount=(($total*$dis)/100);
  $total_bayar=($total-$discount);
  ?>

  <table class="table table-bordered table-keuangan">
        <thead>
          <tr>
            <th width="1%">No</th>
            <th width="10%">Nama Barang/Jasa</th>
            <th width="5%">Jumlah</th>
            <th width="10%">Harga Satuan</th>
            <th width="10%">Total</th>
            <th width="10%">Diskon</th>
            <th width="10%">Total Bayar</th>
             <th width="10%">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i=1;
            $grand=0;
            $sqltmp = "SELECT tmp_trx.*, product.* FROM tmp_trx, product WHERE tmp_trx.id_brg=product.id_brg
                AND tmp_trx.id_trx='$id' ORDER BY product.nama ASC";
            $querytmp = mysqli_query($conn,$sqltmp);
            
            while($data = mysqli_fetch_array($querytmp)) {
              $ttl = $data['jml']*$data['harga_jual'];
              echo '<tr>';
              echo '<td class="text-center">'. $i .'</td>';
              echo '<td>'. $data['nama'] .'</td>';
              echo '<td>'. $data['jml'] .'</td>';
              echo '<td>'. format_rupiah($data['harga_jual']) .'</td>';
              echo '<td>'. format_rupiah($ttl) .'</td>';
              echo '<td>'. $res['discount'] .' %</td>';
              echo '<td>'. format_rupiah($total_bayar) .' </td>';
               echo '<td>'. $res['status'] .' </td>';


              echo '</tr>';
              $i++;
              $grand+=$ttl;
              $discount=(($grand*$dis)/100);
              $total_bayar=($grand-$discount);

            }
          
          ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="4" class="text-center">Total </th>
            <th class="text-right"><?php echo format_rupiah($total_bayar);?></th>
          </tr>
        </tfoot>
  </table>
  <br />
    </div><!-- /.container -->
  </section>
  <div class="modal-footer">
    <a href="trx_cetak.php?id=<?php echo $id;?>" target="_blank" class="btn btn-warning">Cetak</a>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  </div>
</div>
     <?php }


if(isset($_POST['id_feed'])){
  $id = $_POST['id_feed'];
    $sql = "SELECT feedback.*,konsumen.* from feedback, konsumen WHERE feedback.id_kon=konsumen.id_kon AND feedback.id_feed='". $id ."'
    ";
$query = mysqli_query($conn,$sql);
$res = mysqli_fetch_array($query);
     ?>
    <div id="section-to-print">
<section id="header-kop">
<div class="container-fluid">
  <table class="table table-borderless">
   
  </table>
  
</div>
</section>

<section id="body-of-report">
<div class="container-fluid">
  <h4 class="text-center">Feedback Details</h4>
  <br />
<table width="100%">
<tr>
<td width="20%"><b>Customer Name</b></td>
<td width="2%"><b>:</b></td>
<td width="78%"><?php echo $res['nama_kon'];?></td>
</tr>
<tr>
<td width="20%"><b>Feedback</b></td>
<td width="2%"><b>:</b></td>
<td width="78%"><?php echo ($res['feedback']);?></td>
</tr>
<tr>
<td width="20%"><b>Product Request</b></td>
<td width="2%"><b>:</b></td>
<td width="78%"><?php echo ($res['request']);?></td>
</tr>
<tr>
<td width="20%"><b>Reply</b></td>
<td width="2%"><b>:</b></td>
<td width="78%"><?php echo $res['reply'];?></td>
</tr>
</table>
</section>
</br>
<div class="modal-footer">
    
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  </div>

<?php }
        ?>

         