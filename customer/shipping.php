<?php 
include '../koneksi.php';
include 'header.php';
include '../function/format_tanggal.php';
include "../function/format_rupiah.php";
 ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Shipping</h1>
                 
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Shipping Transaction Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                               <?php 
                               $sql2 = mysqli_query($conn, "SELECT * FROM `trx` WHERE trx.id_trx ORDER by id_trx");
                               $trx = mysqli_fetch_array($sql2);
                               ?>

                            	<?php 
                              $aktif = $_SESSION['cust'];
                              if($trx['status_transaksi']==1){ 

                              $query = "";

                            }else

                            {
                               $query = "SELECT trx.*,konsumen.*, tmp_trx.*,product.*,kasir.*,disc.*,status_transaksi.* from trx, tmp_trx, product, konsumen, kasir, disc, status_transaksi WHERE trx.id_trx=tmp_trx.id_trx and trx.id_kon=konsumen.id_kon AND trx.id_kasir=kasir.id_kasir and trx.id_discount=disc.id_disc and tmp_trx.id_brg=product.id_brg  and trx.status_transaksi=status_transaksi.id_transaksi and trx.status_transaksi!=1 ORDER BY trx.id_trx DESC";



                            }
                            		$exec = mysqli_query($conn,$query);
                                

                            	 ?>

                              
                                

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Invoice</th>
                                            <th>Date</th>
                                            <th>Cashier</th>
                                            <th>Jumlah Barang</th>
                                            <th>Total Bayar</th>
                                            <th>Status Transaksi</th>
                                            <th>Bukti Foto</th>

                                        </tr>
                                    </thead>
                                    

                                   
                                    <tbody>
                                    	<?php while($res = mysqli_fetch_assoc($exec)) { ?>
                                         <?php
                                          $dis=($res['discount']);
                                          $total=($res['total']);
                                          $discount=(($total*$dis)/100);
                                          $total_bayar=($total-$discount);

                                       ?>
                                        <tr>
                                           <td><?= $res['id_trx'] ?></td>
                                            <td><?= format_tanggal($res['tgl_trx']) ?></td>
                                            <td><?= $res['nama_ksr'] ?></td>
                                             <td><?= $res['jml'] ?></td>
                                      
                                             <td><?= format_rupiah($total_bayar) ?></td>

                                           <td><a href="" class="view_data btn btn-sm btn-primary"><i class="fas fa-fw fa-map"></i> <?php echo $res['status']; ?>  </a> 
                                              <?php if($res['status_transaksi']==5)

                                                    {

                                                      echo '<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#refund'.$res['no_trx'].'"><i class="fas fa-fw fa-undo"></i>Refund</button>
                                                        ';} else

                                                       {

                                                        echo '
                                                        ';
                                                      } ?>

                                                
                                              <?php if($res['status_transaksi']==7)

                                                    {

                                                      echo '<h4 style="font-size:15px;">Konsultasi <br>Kontak Admin : 081370561143</h4>
                                                        ';} else

                                                       {

                                                        echo '
                                                        ';
                                                      } ?>

                                                       <?php if($res['status_transaksi']==7)

                                                    {

                                                      echo 'Catatan : '.$res['catatan_refund'].'
                                                        ';} else

                                                       {

                                                        echo '
                                                        ';
                                                      } ?>

                                                       <?php if($res['status_transaksi']==8)

                                                    {

                                                      echo 'Catatan : '.$res['catatan_refund'].'
                                                        ';} else

                                                       {

                                                        echo '
                                                        ';
                                                      } ?>
                                                       <?php if($res['status_transaksi']==9)

                                                    {

                                                      echo 'Catatan : '.$res['catatan_refund'].'
                                                        ';} else

                                                       {

                                                        echo '
                                                        ';
                                                      } ?>



                                          </td>
                                          <td style="width: 200px;">
                                          <img src='../foto/foto_bukti/<?= $res['bukti_foto'] ?>' width=50%>
                                          </td>
                                        </tr>
                                        <?php } ?>
                                   </tbody>
                               
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

          

        </div>
        <!-- End of Content Wrapper -->

    </div>


    <?php
if (isset($_POST['refund'])) {
    $id_tmp = $_POST['id_tmp'];
    $no_trx = $_POST['no_trx'];
    $catatan_refund=$_POST['catatan_refund'];
    $jml_brngrefund = $_POST['jml_brngrefund'];
    $filename = $_FILES["foto_bukti"]["name"];
    $tempname = $_FILES["foto_bukti"]["tmp_name"];  

    $folder = "../foto/foto_bukti/".$filename; 

        include "../koneksi.php"; 

   $sql2 = mysqli_query($conn, "SELECT trx.*,konsumen.*, tmp_trx.*,product.*,kasir.*,disc.*,status_transaksi.* from trx, tmp_trx, product, konsumen, kasir, disc, status_transaksi WHERE trx.id_trx=tmp_trx.id_trx and trx.id_kon=konsumen.id_kon AND trx.id_kasir=kasir.id_kasir and trx.id_discount=disc.id_disc and tmp_trx.id_brg=product.id_brg  and trx.status_transaksi=status_transaksi.id_transaksi and tmp_trx.id_tmp=$id_tmp and trx.status_transaksi!=1 ORDER BY trx.id_trx DESC");

    $sto    =mysqli_fetch_array($sql2);
    $stok    =$sto['jml'];
    //menghitung sisa stok
    $sisa    =$stok-$jml_brngrefund;

        // query to insert the submitted data

        $sql1 = "UPDATE `trx` SET `status_transaksi` = '7', `bukti_foto` = '$filename', `catatan_refund` = '$catatan_refund' WHERE `trx`.`no_trx` = $no_trx";

        $sql= "UPDATE tmp_trx SET jml='$sisa' WHERE id_tmp='$id_tmp'";


        // function to execute above query

        mysqli_query($conn, $sql);

        mysqli_query($conn, $sql1);     

        // Add the image to the "image" folder"

        if (move_uploaded_file($tempname, $folder)) {

           echo "<script> alert('Status Transaksi Berhasil diubah')</script>";
     echo "<script>document.location = 'shipping.php'</script>";

        }else{

           echo "<script> alert('Status Transaksi Gagal diubah')</script>";
     echo "<script>document.location = 'shipping.php'</script>"; 

    }

}

?>

    <!-- End of Page Wrapper -->
<!-- Button trigger modal -->
<!-- Modal -->
  <?php 
$sqldisp = mysqli_query($conn, "SELECT trx.*,konsumen.*, tmp_trx.*,product.*,kasir.*,disc.*,status_transaksi.* from trx, tmp_trx, product, konsumen, kasir, disc, status_transaksi WHERE trx.id_trx=tmp_trx.id_trx and trx.id_kon=konsumen.id_kon AND trx.id_kasir=kasir.id_kasir and trx.id_discount=disc.id_disc and tmp_trx.id_brg=product.id_brg  and trx.status_transaksi=status_transaksi.id_transaksi and trx.status_transaksi!=1 ORDER BY trx.id_trx DESC");

while ($disp = mysqli_fetch_array($sqldisp)) {
$no_trx = $disp['no_trx']; ?>

<div class="modal fade" id="refund<?php echo $no_trx ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="width: 500px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Refund Transaksi  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
      </div>
        <form method="POST" action="" enctype="multipart/form-data">        
      <div class="modal-body" >
        <div class="form-group"> 
        <input type="hidden" name="no_trx" value="<?php echo $no_trx ?>">
        <label>Kenapa Refund/Total Refund</label><br>
        <textarea placeholder="isi catatan" name="catatan_refund" required=""></textarea> 
          </div>
          <div class="form-group">
           <label>Uploud Bukti Foto</label>
           <input type="file" name="foto_bukti" value="" / required="" >

         </div>
          <div class="form-group">
           <label>Jumlah Barang</label><br>
           <input type="text" name="jml" disabled="true"  value="<?php echo $disp['jml']; ?>">

         </div>

        

        <input type="hidden" name="id_tmp"  value="<?php echo $disp['id_tmp']; ?>" >

        <div class="form-group"> 
        <label>Jumlah Barang Refund</label><br>
        <input type="number" name="jml_brngrefund" value="" required="">
          </div>


    <section id="body-of-report">
    <div class="container-fluid">

    </div><!-- /.container -->
  </section>
  <div class="modal-footer">
 <button type="submit" name="refund" class="btn btn-warning">Refund</button>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
  </div>
</div>
</form>
      
      </div>
    </div>
  </div>
  <?php } ?>
</div>


<!-- modal edit -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
      </div>
      <div class="modal-body" id="data_transaksi">

      
      </div>
    </div>
  </div>
</div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
    <script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<script type="text/javascript">
	$('.view_data').click(function(){
      // membuat variabel id, nilainya dari attribut id pada button
      // id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
      var id = $(this).attr("id");
      
      // memulai ajax
      $.ajax({
        url: 'view.php',  // set url -> ini file yang menyimpan query tampil detail data siswa
        method: 'post',   // method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
        data: {id_trx:id},   // nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
        success:function(data){   // kode dibawah ini jalan kalau sukses
          $('#data_transaksi').html(data);  // mengisi konten dari -> <div class="modal-body" id="data_siswa">
          $('#myModal').modal("show");  // menampilkan dialog modal nya
        }
      });
    });
</script>
<script type="text/javascript">
       $('input').attr('autocomplete','off');
   </script>

</body>

</html>