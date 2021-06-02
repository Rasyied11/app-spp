<?php
include '../_template/header.php';
include '../_template/menu.php';
include '../_template/footer.php';
if ($_SESSION['level'] !== 'admin') {
    echo ("<script type='text/javascript'>alert('Anda Tidak Diperbolehkan Mengakses Halaman Ini');window.location = '../config/logout.php';</script>");
}
include '../config/database.php';
$db = new database();
$tampil = $db->referensi_petugas();
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Data Petugas</h2>   
                <h5>Selamat Datang <strong><?php echo ($_SESSION['nama']); ?> </strong>, Senang melihat anda kembali. </h5>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <!--    Context Classes  -->
        <div class="panel-body">
            <a href="../petugas/tambah.php" class="btn btn-primary">Tambah Data</a>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                Tabel Data Petugas
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>

                            <tr>
                                <th>No.</th>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Petugas</th>
                                <th>Level</th>
                                <th>Aksi</th>
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
                                        <td><?php echo $x['id_petugas']; ?></td>
                                        <td><?php echo $x['username']; ?></td>
                                        <td><?php echo $x['password']; ?></td>
                                        <td><?php echo $x['nama_petugas']; ?></td>
                                        <td><?php echo $x['level']; ?></td>
                                        <td>
                                            <a href="../petugas/edit.php?id=<?php echo $x['id_petugas']; ?>&aksi=edit&tabel=petugas&field=id_petugas&menu=spetugas" class="btn btn-success">Edit</a>
                                            <a href="../config/proses.php?id=<?php echo $x['id_petugas']; ?>&aksi=hapus&tabel=petugas&field=id_petugas&menu=petugas" class="btn btn-danger" type="submit" name="hapus">Hapus</a>            
                                        </td>
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
        <!--  end  Context Classes  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->