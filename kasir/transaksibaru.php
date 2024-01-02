 <?php 
include '../koneksi.php';
include 'header.php';
include '../function/format_rupiah.php'; 




?>
                         
                <!--- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">New Transaction</h1>
                   <button class="btn btn-warning btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Product</button> 
                    <!-- DataTales Example -->  
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          
                        </div>
                        

                            



                        <div class="card-body">
                           
                            <div class="table-responsive" >
                              <?php $query = "SELECT tmp_trx.*,product.* FROM tmp_trx, product WHERE tmp_trx.id_brg=product.id_brg AND tmp_trx.status = 'onprocess'";
                                $exec = mysqli_query($conn,$query);

                               ?>
                              <form action="transaksibaru.php" method="post" id="hapus">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                     
                                        <tr>
                                            <th >No</th>
                                            <th>Uraian</th>
                                            <th width="10%">Jumlah/pcs</th>
                                            <th>Harga Satuan</th>
                                            <th>Total</th>
                                         <!--    <th>Pilih</th> -->
                                            <th></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                      <?php 
                                      $no=1;
                                      $grand=0;
                                      while($res = mysqli_fetch_assoc($exec)) :
                                          $total = $res['jml'] * $res['harga_jual'] ;
                                       ?>
                                        <tr>
                                          <td><?= $no++; ?></td>
                                           <td><?= $res['nama'] ?></td>
                                            <td>
                                              <input type="text" id="<?= $res['id_brg'] ?>" name="jml[]" min="1" data="<?= $res['jenis'] ?>" data-id="<?= $res['id_tmp'] ?>" class="jml form-control" value="<?= $res['jml'] ?>"></td>
                                            <td>
                                              <input type="hidden" name="hagajual" id="tdharga" value="<?= $res['harga_jual']?>">
                                              
                                              <?= $res['harga_jual'] ?></td>
                                              
                                             <td><?= ($total) ?></td>
                                          

                                           <td><a class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin?')" href="hapus.php?id_brg=<?= $res['id_brg'] ?>&id_tmp=<?= $res['id_tmp'] ?>&jml=<?= $res['jml'] ?>">Delete</a></td>
                                        </tr>
                                        <?php 
                                        $grand+= $total ;

                                      endwhile; ?>
                                   </tbody>
                               <tfoot>
                                  <tr>
                                    </form>

                                    <!-- <th><button class="hapus btn btn-danger" type="submit" name="hapus" onclick="return confirm('Yakin Ingin Menghapus Data Yang Di Tandai?')">HAPUS TANDA</button></th> -->
                                     <th><a href="transaksibaru.php" id="update" class="btn btn-secondary">UPDATE CART</a></th>
                                  <th><a href="transaksibaru.php" id="clik" class="btn btn-success">HITUNG TOTAL</a></th>

                                    <th colspan="2" class="text-center">Total </th>
                                    <th class="text-right" id="thgrand"></th>
                                    <th class="text-center"> </th>
                                    <th class="text-center"> </th>
                               
                                  </tr>
                                 
                                </tfoot>
                                </table>
                                
                            </div>
                        </div>
                        <div class="panel-body">
                      <!-- <input type="hidden" name="tgl" class="form-control"> -->
                </div>
                <div class="panel-footer">
                  <button onclick="return confirm('Apakah Anda Ingin Checkout?')" class="btn btn-primary mb-2 ml-2" id="klik" data-bs-toggle="modal" data-bs-target="#exampleModal2">CHECKOUT</button>
                </div>
                 
           
              <!-- </form> -->
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

          

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
<!-- Button trigger modal -->

<!-- Modal add barang dan jasa-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
      </div>
      <div class="modal-body">
        <form action="transaksibaru.php" method="POST">
          <select style="width: 100%;" multiple="multiple" class="form-control barang" name="id_brg[]">
            <option selected disabled="disabled">==Pilih Barang==</option>
            <?php
                          $sql_don = "SELECT * FROM product WHERE jenis ='barang' ORDER BY nama ASC";
                          $ress_don = mysqli_query($conn, $sql_don);
                          while($li = mysqli_fetch_array($ress_don)) {
                            ?>
                            <option value="<?=$li['id_brg']?>"> <?=$li['nama']?> |
                            <i style="color: red" >Stok <?= $li['stok']?></i></option>
                         <?php }
                        ?>
          </select>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="Submit" name="barang" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>






<!-- Bayar -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 600px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CHECKOUT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
      </div>
      <div class="modal-body">
        <?php 
        $grand=0;
        $query = "SELECT tmp_trx.*,product.* FROM tmp_trx,product WHERE tmp_trx.id_brg=product.id_brg AND tmp_trx.status = 'onprocess'";
          $exec = mysqli_query($conn,$query);
          while ($res =mysqli_fetch_assoc($exec)) {
            $ttl = $res['jml'] * $res['harga_jual'];
            $grand+=$ttl;
          } 
        ?>
        
          <table class="table">         
         
         <tr>
          <td>
           Pilih Konsumen
             <select name="id_kon" id="id_kon" data-id="1" class="form-control mb-2" required>
                  <option selected="true">== Pilih Konsumen ==</option>
                                    <?php
                                      $sql_kon = "SELECT * FROM konsumen ORDER BY id_kon ASC";
                                      $ress_kon = mysqli_query($conn, $sql_kon);
                                      while($li = mysqli_fetch_array($ress_kon)) {
                                        echo '<option value="'. $li['id_kon'] .'">'. $li['nama_kon'].'</option>';
                                      }
                                    ?>
              </select>
              <form action="transaksibaru.php" method="POST">
              <p><b>Jika Konsumen Baru, Silahkan Tulis Manual di Bawah ini!</b></p>
              <input type="hidden" name="idkon" id="idkon">
            <input class="form-control mb-2" type="text" id="kon" name="kon" placeholder="Nama Konsumen">
             <input class="form-control mb-2"  type="text"  id="no_telp" name="no_telp" placeholder="Nomor Telpon">
            <input class="form-control mb-2"  type="text" id="alamat" name="alamat" placeholder="Alamat Singkat">
          
            <input type ="hidden"  name="dead_trx" id="dead_trx"  class="form-control mt-2" display:none; >
            <input type="hidden" name="auth" id="auth">


         
               <select name="id_discount" id="id_discount"  class="form-control mt-2" required>
                  <option value="">== Pilih Discount ==</option>
                                    <?php
                                      $sql_kon = "SELECT * FROM disc ORDER BY id_disc ASC";
                                      $ress_kon = mysqli_query($conn, $sql_kon);
                                      while($li = mysqli_fetch_array($ress_kon)) {
                                        echo '<option value="'. $li['id_disc'] .'">'. $li['discount'].'</option>';
                                        
                                      }
                                      
                                    ?>
              </select>
            
             <td>
              <?php
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

                }
                ?>

            <tr>
                <td><b>Total : <?= format_rupiah($grand) ?> - Discount</b></td>
              </tr>
          </td>
                                            
        </tr>
        
        
          <tr>
            <td>
              CASH TOTAL DISKON
                <input type="hidden" name="grand" id="grand" value="<?= $grand ?>">
            <input type="text" class="form-control" id="cash" name="cash">
            </td>
            <td><input type="hidden" id="hanyabarang" name="hanyabarang" value="hanyabarang"> </td>
          </tr>
         
        </table>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="Submit" name="simpan" id="bayar" class="btn btn-primary">Bayar</button>
        </form>

      </div>
    </div>
  </div>
</div>



<?php 





 

if(isset($_POST['barang'])) {

  foreach($_POST['id_brg'] as $brg) {
  $barang = $brg;
  
  // $alamat = $_SESSION['id']''
  $id_kasir = $_SESSION['id_kasir'];
  $stts = "onprocess";
  
  $query = "INSERT INTO tmp_trx(id_brg,id_kasir,status) VALUES ('$barang','$id_kasir','$stts')";
       $exec = mysqli_query($conn,$query);
      echo "<script type='text/javascript'> document.location = 'transaksibaru.php'; </script>";
    }
  }
  // die();
  

  if(isset($_POST['jasa'])) {
   foreach($_POST['id_brg'] as $brg) {
  $barang = $brg;
   $jumlah = (int) strip_tags(htmlentities($_POST['jml']));
  // $alamat = $_SESSION['id']''
  $id_kasir = $_SESSION['id_kasir'];
  $stts = "onprocess";

  $query = mysqli_query($conn,"SELECT * FROM product where id_brg = '$barang' ORDER BY id_brg DESC");
  $res = mysqli_fetch_assoc($query);

      $query = "INSERT INTO tmp_trx(id_brg,jml,id_kasir,status) VALUES ('$barang','$jumlah','$id_kasir','$stts')";
       $exec = mysqli_query($conn,$query);
        if($exec) {
          
          }    

  }
}


 ?>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    
    
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script type="text/javascript">
           $(document).ready(function() {
     $('.barang').select2();
       $('.jasa').select2();

    })
  </script>
  <script type="text/javascript">
  $('#hanyabarang').click(function(){
    $('#dead_trx').attr('disabled','disabled');
  })
</script>
  
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
       $('input').attr('autocomplete','off');
   </script>
  
  <script type="text/javascript">




    $('#id_kon').on('change',function(){
      var data = $(this).val();
       $.ajax({
          url: 'contoh.php',
          method: 'post',
          data: {datakon:data},
          success:function(data) {
            var data = JSON.parse(data);
            console.log(data);
            $('#idkon').val(data.id_kon)
            $('#kon').val(data.nama_kon)
            $('#no_telp').val(data.no_telp)
            $('#alamat').val(data.alamat)
            $('#auth').val(data.auth)

          }
       })
    })

    $('#clik').click(function(e){
      e.preventDefault();
      var grand = 'grand';
        $.ajax({
          url: "contoh.php",
          method : "post",
          data : {getgrand:grand},
          success:function(data){
            $('#thgrand').html(data)
          }
      })
      setTimeout(function(){
        $('.jml').attr('disabled','disabled');
      },300)
      
      
      
    })

    function checkEnter(e){
     e = e || event;
     var txtArea = /textarea/i.test((e.target || e.srcElement).tagName);
     return txtArea || (e.keyCode || e.which || e.charCode || 0) !== 13;
    }
    document.querySelector('#hapus').onkeypress = checkEnter;


    


    

    

    $('.jml').change(function(e){
      e.preventDefault()
      // e.preventDefault();
     var jml = $(this).val();
      var id_tmp = $(this).attr('data-id');
      var id_brg = this.id
      var jenis = $(this).attr('data');
      $.ajax({
        url:'contoh.php',
        method : 'post',
        data: {jml:jml,id_tmp:id_tmp,id_brg:id_brg,jenis:jenis},
        success:function(data){
          var pesan = JSON.parse(data)
          // alert(pesan.pesan);

          
        }
      })
      // alert(`${jml},${id_tmp},${id_brg}`)
    })


    function openUrl() {
      var win = window.open(`http://localhost/inventory/kasir/trx_cetak.php`,'_blank')
    }
    function openUrl2() {
      var win = window.open(`http://localhost/inventory/kasir/trx_cetak.php`,'_blank')
    }
 
   

    $('#cash').change(function(){
      var cash = $(this).val();
      var grand = $('#grand').val();
      var total = cash-grand
      var grandtotal = `Rp.${total}`
      $('#kembali').val(grandtotal)
    })
  </script>



</body>

</html>

<?php 
if(isset($_POST['simpan'])) {
  
  $tgl = date("Y-m-d");
  $namakon = htmlentities(strtoupper(strip_tags($_POST['kon'])));
  $no_telp = htmlentities(strtoupper(strip_tags($_POST['no_telp'])));
  $alamat = htmlentities(strtoupper(strip_tags($_POST['alamat'])));
  
  $id_kon = $_POST['idkon'];
  $id_discount = $_POST['id_discount'];

  $auth = $_POST['auth'];
  if($_POST['auth'] !=="") {
  
    $id_kasir = $_SESSION['id_kasir'];
    $grand=0;
    $grandmodal=0;
    $no = date('dmYHis');
    $stts = "done";
    $id_kon = $_POST['idkon'];
    $query = "SELECT tmp_trx.*,product.* FROM tmp_trx,product WHERE tmp_trx.id_brg=product.id_brg AND tmp_trx.status = 'onprocess'";
    $exec = mysqli_query($conn,$query);
    while ($res =mysqli_fetch_assoc($exec)) {
      $ttl = $res['jml'] * $res['harga_jual'];
      $ttlmodal = $res['jml'] * $res['harga_modal'];
      $grand+=$ttl;
      $grandmodal+=$ttlmodal;
      //$dead = date('Y-m-d', strtotime($POST['dead_trx']));
      $dead = $_REQUEST['dead_trx'];

    if($dead) {
        $dead = date( 'Y-m-d', strtotime($dead));
    } else {
        $dead = '';
    }
      $barang = $res['nama'];
      $jumlah = $res['jml'];
      $jenis = $res['jenis'];
      $harga_modal_barang = $res['harga_modal'];
      $harga_jual_barang = $res['harga_jual'];
      $harga_jasa = $res['harga_jual'];
      $penjualan = "INSERT INTO penjualan(tgl_penjualan,dead_trx,uraian,jenis,jumlah,harga_modal_barang,harga_jual_barang,harga_jasa,id_kasir,id_kon,total) VALUES('$tgl','$dead','$barang','$jenis','$jumlah','$harga_modal_barang','$harga_jual_barang','$harga_jasa','$id_kasir','$id_kon','$ttl')";
      mysqli_query($conn,$penjualan);
      }

    $sqltmp = "UPDATE tmp_trx SET
        id_trx='". $no ."',
        status='". $stts ."'
        WHERE status='onprocess'";
    $resstmp = mysqli_query($conn, $sqltmp);  

    if($resstmp){
      $sql = "INSERT INTO trx(id_trx,id_kon,tgl_trx,dead_trx,total,total_modal,id_kasir,id_discount,status_transaksi) VALUES ('$no','$id_kon','$tgl','$tgl','$grand','$grandmodal','$id_kasir','$id_discount','1')";

      $exec = mysqli_query($conn,$sql);
      if($exec){
        if($_POST['hanyabarang'] == 0){
          echo "<script>openUrl()</script>";
          echo "<script>alert('berhasil')</script>";
         echo "<script>document.location='transaksibaru.php'</script>";
       }else {
         echo "<script>openUrl2()</script>";
          echo "<script>alert('berhasil')</script>";
         echo "<script>document.location='transaksibaru.php'</script>";
         
        }
    }
  }
  }else {

     $query = "INSERT INTO konsumen(nama_kon,telp,alamat) VALUES('$namakon','$no_telp','$alamat')";
      $exec = mysqli_query($conn,$query);
      if($exec) {
        $query = "SELECT * FROM konsumen ORDER BY id_kon DESC LIMIT 1";
        $exec = mysqli_query($conn,$query);
        $res = mysqli_fetch_assoc($exec);
        $kon = $res['id_kon'];
        $stts = "done";
        $id_kasir = $_SESSION['id_kasir'];
        $grand=0;
        $grandmodal=0;
        $no = date('dmYHis');
        $query = "SELECT tmp_trx.*,product.* FROM tmp_trx,product WHERE tmp_trx.id_brg=product.id_brg AND tmp_trx.status = 'onprocess'";
        $exec = mysqli_query($conn,$query);
        while ($res =mysqli_fetch_assoc($exec)) {
      $ttl = $res['jml'] * $res['harga_jual'];
      $ttlmodal = $res['jml'] * $res['harga_modal'];
      $catatan = $res['id_brg'];
      $grand+=$ttl;
      $grandmodal+=$ttlmodal;
      $barang = $res['nama'];
      $jumlah = $res['jml'];
      $jenis = $res['jenis'];
      $harga_modal_barang = $res['harga_modal'];
      $harga_jual_barang = $res['harga_jual'];
      $harga_jasa = $res['harga_jual'];
      $penjualan = "INSERT INTO penjualan(tgl_penjualan,dead_trx,uraian,jenis,jumlah,harga_modal_barang,harga_jual_barang,harga_jasa,id_kasir,id_kon,total) VALUES('$tgl','$dead','$barang','$jenis','$jumlah','$harga_modal_barang','$harga_jual_barang','$harga_jasa','$id_kasir','$id_kon','$ttl')";
       mysqli_query($conn,$penjualan);
      }


    // var_dump($grandmodal);
    $sqltmp = "UPDATE tmp_trx SET
        id_trx='". $no ."',
        status='". $stts ."'
        WHERE status='onprocess'";
    $resstmp = mysqli_query($conn, $sqltmp);  

    if($resstmp){
      $sql = "INSERT INTO trx(id_trx,id_kon,tgl_trx,dead_trx,total,total_modal,id_kasir) VALUES ('$no','$id_kon','$tgl','$dead','$grand','$grandmodal','$id_kasir')";
      $exec = mysqli_query($conn,$sql);
      if($exec){
        if($_POST['hanyabarang'] == 0){
          echo "<script>openUrl()</script>";
          echo "<script>alert('berhasil')</script>";
         echo "<script>document.location='transaksibaru.php'</script>";
       }else {
         echo "<script>openUrl2()</script>";
          echo "<script>alert('berhasil')</script>";
         echo "<script>document.location='transaksibaru.php'</script>";
         
        }
    }
  }
    }
}
}

 ?>