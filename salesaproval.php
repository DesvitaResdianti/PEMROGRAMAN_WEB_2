<?php 
include 'koneksi.php';
include 'header.php';
include 'function/format_tanggal.php';
include "function/format_rupiah.php";
error_reporting('0');
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

                                    $query = "SELECT trx.*,konsumen.*, tmp_trx.*,product.*,kasir.*,disc.* from trx, tmp_trx, product, konsumen, kasir, disc WHERE trx.id_trx=tmp_trx.id_trx and trx.id_kon=konsumen.id_kon AND trx.id_kasir=kasir.id_kasir and trx.id_discount=disc.id_disc and tmp_trx.id_brg=product.id_brg  and trx.status_transaksi=1 ORDER BY trx.id_trx DESC";
                                  }
                                  else
                                  {
                                     $query = "";

                                  }
                                  $exec = mysqli_query($conn,$query);
                                   ?>

                                


                              

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Aksi</th>
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
                                          <td><button class="view_data btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#approval<?= $res['no_trx'] ?>" >Approve</button>
                                          </td>
                                           <td><?= $res['id_trx'] ?></td>
                                            <td><?= format_tanggal($res['tgl_trx']) ?></td>
                                            <td><?= $res['nama_kon'] ?></td>
                                            <td><?= $res['nama_ksr'] ?></td>
                                            <td><?= format_rupiah($res['total']) ?></td>
                                            <td><?= $res['discount'] ?> %</td>
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
<!-- Button trigger modal -->
<?php

if(isset($_POST['approval'])) {
    $no_trx = $_POST['no_trx'];
    $sql = mysqli_query($conn, "UPDATE `trx` SET `status_transaksi` = '2', `bukti_foto` = 'pengemasan.png' WHERE `trx`.`no_trx` = $no_trx");
    if($sql){
     echo "<script> alert('Approval Berhasil Mohon disesuaikan Proses Status Transaksi')</script>";
     echo "<script>document.location = 'shipping.php'</script>";
    }
    }
?>

<!-- modal edit -->
   <?php 
$sqldisp = mysqli_query($conn, "SELECT trx.*,konsumen.*,kasir.* from trx, konsumen, kasir WHERE trx.id_kon=konsumen.id_kon AND trx.id_kasir=kasir.id_kasir ORDER BY id_trx ASC");
while ($disp = mysqli_fetch_array($sqldisp)) {
$no_trx = $disp['no_trx']; ?>

<!-- Modal -->
<div class="modal fade" id="approval<?php echo $no_trx ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="width: 500px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sales Approval</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
      </div>
      <form method="POST">
      <div class="modal-body" >

    <section id="body-of-report">
    <div class="container-fluid">
      <h4 class="text-center">Approval Transaction Data <br>Apakah anda Yakin?</h4>
     
      <center> <input type="hidden" name="no_trx" value="<?php echo $no_trx ?>">
       <label style="font-weight: bold;font-size: 20px;">Invoice</label>
       <input type="text" disabled="true" name="no_trx" value="<?php echo $disp['id_trx']; ?>">
       </center>
    </div><!-- /.container -->
  </section>
  <div class="modal-footer">
    <button type="submit" name="approval" class="btn btn-warning">Ya</button>
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