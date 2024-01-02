<?php
include "header.php";
include 'koneksi.php';
include 'function/format_rupiah.php';
$tgl = date('Y-m-d');
    $labakotor=0;
    $lababersih=0;
    $sql = "SELECT * FROM penjualan WHERE tgl_penjualan = '$tgl' AND jenis = 'BARANG'";
    $ress = mysqli_query($conn, $sql);
    // query database mencari data admin
    while($data=mysqli_fetch_array($ress)){
        $kotor=$data['jumlah'] * $data['harga_jual_barang'];
        $bersih = $data['jumlah'] * $data['harga_modal_barang'];
        $labakotor+=$kotor;
        $lababersih+=$bersih;
    }

    $labajasa=0;
    $sql = "SELECT * FROM penjualan WHERE tgl_penjualan = '$tgl' AND jenis = 'JASA'";
    $ress = mysqli_query($conn, $sql);
    $jmltrx = mysqli_num_rows($ress);
    // query database mencari data admin
    while($data=mysqli_fetch_array($ress)){
        $jasa = $data['harga_jasa'] * $data['jumlah'];
        $labajasa+=$jasa;
    }
    $lababaranglaiinyakotor=0;
    $lababaranglaiinyabersih=0;
    $sql = "SELECT * FROM penjualan WHERE tgl_penjualan = '$tgl' AND jenis = 'LAINNYABARANG'";
    $ress = mysqli_query($conn, $sql);
    $jmltrx = mysqli_num_rows($ress);
    // query database mencari data admin
    while($data=mysqli_fetch_array($ress)){
        $kotor=$data['jumlah'] * $data['harga_jual_barang'];
        $bersih = $data['jumlah'] * $data['harga_modal_barang'];
        $lababaranglaiinyakotor+=$kotor;
        $lababaranglaiinyabersih+=$bersih;
    }
    $labajasalaiinya=0;
    $sql = "SELECT * FROM penjualan WHERE tgl_penjualan = '$tgl' AND jenis = 'LAINNYAJASA'";
    $ress = mysqli_query($conn, $sql);
    $jmltrx = mysqli_num_rows($ress);
    // query database mencari data admin
    while($data=mysqli_fetch_array($ress)){
        $jasa = $data['harga_jasa'] * $data['jumlah'];
        $labajasalaiinya+=$jasa;
    }
    $labalainyabersih = $lababaranglaiinyakotor - $lababaranglaiinyabersih;
    $totalbarang = $labakotor-$lababersih;
    $allin = $totalbarang + $labajasa + $labalainyabersih+$labajasalaiinya;
 ?>
                         <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                   <!--  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
 -->
                <div class="row">

                     <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-200 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a href="datatransaksi.php">Total Transaction Today</a></div>
                                                <?php 
                                                $sql0 = "SELECT * FROM trx WHERE tgl_trx='$tgl'";
                                                $ress0 = mysqli_query($conn, $sql0);
                                                $jmltrx = mysqli_num_rows($ress0); ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jmltrx; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body ">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                              <b>TOTAL KESELURUHAN LABA BERSIH <?= date('Y-m-d') ?> </b></div>
                                            <h4><b><?php echo format_rupiah($allin); ?></b></h4>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-300 text-success"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body" >
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                              <a href="datatransaksi.php">LABA KOTOR BARANG <br><?= date('Y-m-d') ?></a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo format_rupiah($labakotor); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                              <a href="#" >LABA BERSIH BARANG <br><?= date('Y-m-d') ?> </a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo format_rupiah($labakotor - $lababersih); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                              <a href="#" >LABA JASA <br><?= date('Y-m-d') ?> </a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo format_rupiah($labajasa); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                         
                        

                </div><!-- /.row -->
                
            </div>
            <!-- End of Main Content -->

           

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

   

    


 <?php include "footer.php" ?>