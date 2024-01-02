<?php 
include 'koneksi.php';
include 'header.php';
include 'function/format_tanggal.php';
include "function/format_rupiah.php";
 ?>
                      <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Transaction Data</h1>
                 
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Transaction Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">


                                <?php 
                                  $sql2 = mysqli_query($conn, "SELECT * FROM `trx` WHERE trx.id_trx ORDER by id_trx");
                                  $trx = mysqli_fetch_array($sql2);
                               
                                 if($trx['status_transaksi']==1){

                                    $query = "";
                                  }
                                  else{
                                     $query = "SELECT trx.*,konsumen.*,kasir.*,disc.*,status_transaksi.* from trx, konsumen, kasir, disc, status_transaksi WHERE trx.id_kon=konsumen.id_kon AND trx.id_kasir=kasir.id_kasir and trx.status_transaksi=status_transaksi.id_transaksi and trx.id_discount=disc.id_disc and trx.status_transaksi!=1 and trx.status_transaksi!=8 and trx.status_transaksi!=1 and trx.status_transaksi!=10  ORDER BY id_trx DESC";

                                  }

                                  $exec = mysqli_query($conn,$query);
                                   ?>

                              
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Aksi</th>
                                            <th>Status Transaksi</th>
                                            <th>Invoice</th>
                                            <th>Transaction Date</th>
                                            <th>Customer</th>
                                            <th>Cashier</th>
                                            <th>Total</th>
                                            <th>Discount</th>
                                            <th>Total Bayar</th>
                                            
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
                                          <td><button class="view_data btn btn-sm btn-danger"data-bs-toggle="modal" data-bs-target="#status<?= $res['no_trx'] ?>" id="<?php echo $res['id_trx']; ?>"><i class="fas fa-fw fa-edit"></i> Ubah Status</button>

                                          </td>
                                            <td style="color: blue" width="400px;"><?= $res['status'] ?>
                                            <br>

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

                                             <img src='foto/foto_bukti/<?= $res['bukti_foto'] ?>' width=15%>
                                                

                                           </td>
                                            <td><?= $res['id_trx'] ?></td>
                                            <td><?= format_tanggal($res['tgl_trx']) ?></td>
                                            <td><?= $res['nama_kon'] ?></td>
                                            <td><?= $res['nama_ksr'] ?></td>
                                            <td><?= format_rupiah($total) ?></td>
                                            <td><?= format_rupiah($discount) ?></td>
                                            <td><?= format_rupiah($total_bayar) ?></td>
          
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
    <!-- End of Page Wrapper -->

<!-- modal edit -->
<?php
if (isset($_POST['status'])) {

    $no_trx = $_POST['no_trx'];
    $id_transaksi=$_POST['id_transaksi'];
    $filename = $_FILES["foto_bukti"]["name"];
    $tempname = $_FILES["foto_bukti"]["tmp_name"];  

        $folder = "foto/foto_bukti/".$filename;   
        // query to insert the submitted data

        $sql = "UPDATE `trx` SET `status_transaksi` = '$id_transaksi', `bukti_foto` = '$filename' WHERE `trx`.`no_trx` = $no_trx";

        // function to execute above query

        mysqli_query($conn, $sql);       

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

   <?php 
$sqldisp = mysqli_query($conn, "SELECT trx.*,konsumen.*,kasir.*,status_transaksi.* from trx, konsumen, kasir, status_transaksi WHERE trx.id_kon=konsumen.id_kon AND trx.id_kasir=kasir.id_kasir and trx.status_transaksi=status_transaksi.id_transaksi and trx.status_transaksi!=1 ORDER BY id_trx DESC");
while ($disp = mysqli_fetch_array($sqldisp)) {
$no_trx = $disp['no_trx']; ?>

<!-- Modal -->
<div class="modal fade" id="status<?php echo $no_trx ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="width: 500px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Status Transaksi  <h4 style="color: red; margin-left: -130px; margin-top: 7px; font-size: 17px;">(<?php echo $disp['status']; ?>)</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
      </div>
        <form method="POST" action="" enctype="multipart/form-data">        
      <div class="modal-body" >
        <div class="form-group"> 
        <input type="hidden" name="no_trx" value="<?php echo $no_trx ?>">

       
        <label >Sesuaikan Status Transaksi</label><br>
     
        <select class="form-control" name="id_transaksi" required="" style="font-size: 17px;">

             <option value="0">Pilih Status</option>
              <?php
              $sqllvl = mysqli_query($conn, "SELECT * FROM `status_transaksi` WHERE status_transaksi.id_transaksi!=2 and status_transaksi.id_transaksi!=1 and status_transaksi.id_transaksi!=7 ORDER by id_transaksi");
              while ($rowlvl = mysqli_fetch_array($sqllvl)) { ?>               
              <option value="<?php echo $rowlvl['id_transaksi']?>"><?php echo $rowlvl['status']?></option>

              <?php } ?>
                        </select>
          </div>
          <div class="form-group">
           <label>Uploud Bukti Foto</label>
           <input type="file" name="foto_bukti" value="" / required="" >

         </div>

    <section id="body-of-report">
    <div class="container-fluid">

    </div><!-- /.container -->
  </section>
  <div class="modal-footer">
 <button type="submit" name="status" class="btn btn-warning">Simpan</button>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
  </div>
</div>
</form>
      
      </div>
    </div>
  </div>
   <?php } ?>
</div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

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

</body>

</html>