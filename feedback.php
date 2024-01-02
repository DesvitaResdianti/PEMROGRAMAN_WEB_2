<?php 
include 'koneksi.php';
include 'header.php'; 

if(isset($_POST['edit'])) {
   $reply =  strip_tags(strtoupper(htmlentities($_POST['reply'])));
   $id= (int)$_POST['id_feed']; 
   // var_dump($_POST);
   // die();
  $query = "UPDATE feedback SET 
  reply = '".$reply."'
   WHERE id_feed = '".$id."'";
  $ex = mysqli_query($conn,$query);
  if($ex) {
   echo "<script> alert('REPLY SUCCESFULLY')</script>";
   echo "<script type='text/javascript'> document.location = 'feedback.php'; </script>";
  }
 
 
 }
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Customer Feedback</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                            	<?php $query = "SELECT feedback.*,konsumen.* FROM feedback,konsumen WHERE feedback.id_kon=konsumen.id_kon ORDER BY id_feed ASC";
                            		$exec = mysqli_query($conn,$query);

                            	 ?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Customer Name</th>
                                            <th>Customer Feedback</th>
                                            <th>Customer Product Request</th>
                                            <th>Reply</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    	<?php 
                                        $no=1;
                                        while($res = mysqli_fetch_assoc($exec)) { ?>
                                        <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $res['nama_kon'] ?></td>
                                           <td><?= $res['feedback'] ?></td>
                                           <td><?= $res['request'] ?></td>
                                           <td><?= $res['reply'] ?></td>
                                           <td>
                                           <a href="#" class="view_data btn btn-sm btn-warning"data-bs-toggle="modal" data-bs-target="#myModal" id="<?php echo $res['id_feed']; ?>">Reply</a>
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
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reply Customer Feedback</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
      </div>
      <div class="modal-body" id="data_brg">

      
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
        data: {id_feed:id},    // nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
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