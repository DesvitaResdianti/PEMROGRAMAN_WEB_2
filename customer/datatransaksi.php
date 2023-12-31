<?php 
include '../koneksi.php';
include 'header.php';
include '../function/format_tanggal.php';
include "../function/format_rupiah.php";
 ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Transaction in DEC</h1>
                 
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
                               ?>


                            	<?php 
                              $aktif = $_SESSION['cust'];
                              if($trx['status_transaksi']==1){ 

                              $query = "";

                            }else

                            {
                               $query = "SELECT trx.*,konsumen.*,kasir.*, disc.*, status_transaksi.* from trx, konsumen, kasir, disc, status_transaksi WHERE trx.id_kon=konsumen.id_kon 
                              AND trx.id_kasir=kasir.id_kasir AND nama_kon = '$aktif' and trx.id_discount=disc.id_disc and trx.status_transaksi=status_transaksi.id_transaksi and trx.status_transaksi!=1 ORDER BY id_trx DESC";

                            }
                            		$exec = mysqli_query($conn,$query);
                                

                            	 ?>


                              
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Invoice</th>
                                            <th>Date</th> 
                                            <th>Cashier</th>
                                            <th>Total</th>
                                            <th>Discount</th>
                                            <th>Total Bayar</th>
                                            <th>Status Transaksi</th>
                                            <th>Bukti Foto</th>
                                            <th></th>
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
                                            <td><?= format_rupiah($res['total']) ?></td>
                                            <td><?= $res['discount'] ?> %</td>
                                             <td><?= format_rupiah($total_bayar) ?></td>
                                             <td><?php echo $res['status']; ?></td>
                                             <td style="width: 200px;">
                                          <img src='../foto/foto_bukti/<?= $res['bukti_foto'] ?>' width=50%>
                                          </td>

                                           <td><a href="" class="view_data btn btn-sm btn-primary"data-bs-toggle="modal" data-bs-target="#myModal" id="<?php echo $res['id_trx']; ?>">details</a>
                                            <a href="trx_cetak.php?id=<?= $res['id_trx'] ?>" target="_blank" class="btn btn-sm btn-warning">Print</a>
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
    <!-- End of Page Wrapper -->
<!-- Button trigger modal -->

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