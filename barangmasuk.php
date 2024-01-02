<?php 
include 'koneksi.php';
include 'header.php'; 
?>
<?php 

if(isset($_POST['barang'])) {
  // $ = date('dmYHis');
	$namabarang =  strip_tags(strtoupper(htmlentities($_POST['id_brg'])));
  $namasuplier =  strip_tags(strtoupper(htmlentities($_POST['id_sup'])));
  $tanggal =  strip_tags(strtoupper(htmlentities($_POST['tgl_trx'])));
	$jumlah =  strip_tags(strtoupper(htmlentities($_POST['jml'])));
  $query = mysqli_query($conn,"SELECT * FROM product WHERE id_brg = '".$namabarang."'");
  $brg = mysqli_fetch_assoc($query);
  $stoklama = $brg['stok'];
  $stokbaru = $jumlah + $stoklama;
  // $alamat = $_SESSION['id']''


 $query = "INSERT INTO trxbarang(tgl_trx,id_brg,id_sup,jml) VALUES ('$tanggal','$namabarang','$namasuplier','$jumlah')";
 $exec = mysqli_query($conn,$query);
 if($exec) {
  $query = "UPDATE product SET stok = '".$stokbaru."' WHERE id_brg = '".$namabarang."'";
  $ex = mysqli_query($conn,$query);
  if($ex) {
    echo "<script> alert('Data Berhasil disimpan')</script>";
    echo "<script type='text/javascript'> document.location = 'barangmasuk.php'; </script>";
  }
 }


}

?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Input Stock</h1>
                   <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Data</button>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            	<?php $query = "SELECT trxbarang.*,product.*,suplier.* FROM trxbarang,product,suplier WHERE trxbarang.id_brg = product.id_brg AND trxbarang.id_sup=suplier.id_sup ORDER BY trxbarang.tgl_trx DESC";
                            		$exec = mysqli_query($conn,$query);
                            	 ?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                          <th>No</th>
                                          <!-- <th>Id Trx</th> -->
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Nama Supplier</th>
                                            <th></th>
                              
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                      <?php
                                       $no=1;
                                       while($res = mysqli_fetch_assoc($exec)) { ?>
                                        <tr>
                                           <td><?= $no++ ?></td>
<!--                                             <td><?= $res['id_trx'] ?></td> -->
                                            <td><?=$res['nama']?></td>
                                            <td><?= $res['jml'] ?></td>
                                            <td><?= $res['tgl_trx'] ?></td>
                                             <td><?=$res['nama_sup']?></td>
                                           <td><a class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin?')" href="hapus.php?id_trx=<?= $res['id_trx'] ?>">Delete</a></td>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Barang Masuk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
      </div>
      <div class="modal-body">
       <form action="" method="POST">
          <select style="width: 100%;" class="form-control barang mb-2" name="id_brg">
            <option selected>==Pilih Barang==</option>
            <?php
                          $sql_don = "SELECT * FROM product WHERE jenis ='BARANG' ORDER BY nama ASC";
                          $ress_don = mysqli_query($conn, $sql_don);
                          while($li = mysqli_fetch_array($ress_don)) {
                            echo '<option value="'. $li['id_brg'] .'">'. $li['nama'].'</option>';
                            
                          }
                        ?>
          </select>
          <select class="form-control mb-2 suplier" name="id_sup">
            <option selected>-Pilih Suplier-</option>
            <?php
                          $sql_don = "SELECT * FROM suplier ORDER BY nama_sup ASC";
                          $ress_don = mysqli_query($conn, $sql_don);
                          while($li = mysqli_fetch_array($ress_don)) {
                            echo '<option value="'. $li['id_sup'] .'">'. $li['nama_sup'].'</option>';
                          }
                        ?>
          </select>
          <input class="form-control mb-2" type="date" name="tgl_trx">
          <input class="form-control mb-2" type="text" name="jml" placeholder="Jumlah">
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="Submit" name="barang" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>



    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/select.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script type="text/javascript">
           $(document).ready(function() {
     // $('.barang').select2();
     //   $('.suplier').select2();

    })
  </script>
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
        data: {id_jasa:id},   // nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
        success:function(data){   // kode dibawah ini jalan kalau sukses
          $('#data_brg').html(data);  // mengisi konten dari -> <div class="modal-body" id="data_siswa">
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
