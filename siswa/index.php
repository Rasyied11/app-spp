<?php
include '../_template/header.php';
include '../_template/menu.php';
include '../_template/footer.php';
if ($_SESSION['level'] !== 'admin') {
    echo ("<script type='text/javascript'>alert('Anda Tidak Diperbolehkan Mengakses Halaman Ini');window.location = '../config/logout.php';</script>");
}
include '../config/database.php';
$db = new database();
$tampil = $db->tampil_data_siswa();
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Data Siswa</h2>   
                <h5>Selamat Datang <strong><?php echo ($_SESSION['nama']); ?> </strong>, Senang melihat anda kembali. </h5>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <!--    Context Classes  -->
        <div class="panel-body">
            <a href="../siswa/tambah.php" class="btn btn-primary">Tambah Data</a>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                Tabel Data Siswa
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>

                            <tr>
                                <th>No.</th>
                                <th>NISN</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>No Telp</th>
                                <th>Jumlah SPP</th>
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
                                        <td><?php echo $x['nisn']; ?></td>
                                        <td><?php echo $x['nis']; ?></td>
                                        <td><?php echo $x['nama']; ?></td>
                                        <td><?php echo $x['kelas']; ?></td>
                                        <td><?php echo $x['no_telp']; ?></td>
                                        <td><?php echo $x['spp']; ?></td>
                                        <td>
                                            <a href="../siswa/edit.php?id=<?php echo $x['nisn']; ?>&aksi=edit&tabel=siswa&field=nisn&menu=siswa" class="btn btn-success">Edit</a>
                                            <a href="../config/proses.php?id=<?php echo $x['nisn']; ?>&aksi=hapus&tabel=siswa&field=nisn&menu=siswa" class="btn btn-danger" type="submit" name="hapus">Hapus</a>			
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