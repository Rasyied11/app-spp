<?php
include '../_template/header.php';
include '../_template/menu.php';
include '../_template/footer.php';
include '../config/database.php';
$db = new database();
$user = $_SESSION['username'];
$level = $_SESSION['level'];

$tampil = $db->history($user,$level); 

?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Dashboard</h2>   
                <h5>Selamat Datang <strong><?php echo ($_SESSION['nama']); ?> </strong>, Senang melihat anda kembali. </h5>

            </div>
            
        </div>
        <!-- /. ROW  -->
        
        <hr />
          <div class="panel panel-default">
            <div class="panel-heading">
                History Pembayaran
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>

                            <tr>
                                <th>No.</th>
                                <th>Nama Petugas</th>
                                <th>Nama Siswa</th>
                                <th>Tanggl Bayar</th>
                                <th>Jumlah Tagihan</th>
                                <th>Jumlah Dibayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if ($tampil == 0) {
                                ?>
                                <tr>
                                    <td colspan="8" >Belum ada data</td>
                                </tr>
                                <?php
                            } else {
                                foreach ($tampil as $x) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $x['petugas']; ?></td>
                                        <td><?php echo $x['siswa']; ?></td>
                                        <td><?php echo $x['tanggal']; ?></td>
                                        <td><?php echo $x['tagihan']; ?></td>
                                        <td><?php echo $x['bayar']; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>     
        
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
