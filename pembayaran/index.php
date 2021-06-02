<?php
include '../_template/header.php';
include '../_template/menu.php';
include '../_template/footer.php';
if ($_SESSION['level'] !== 'admin' and $_SESSION['level'] !== 'petugas') {
    echo ("<script type='text/javascript'>alert('Anda Tidak Diperbolehkan Mengakses Halaman Ini');window.location = '../config/logout.php';</script>");
}
include '../config/database.php';
$db = new database();
$waktu = $db->tanggal();
$spp = $db->ref_spp();
$petugas = $_SESSION['username'];
$namapetugas = $db->ref_petugas($petugas);

if (isset($_POST['simpan'])) {
    $id_pembayaran = '';
    $id_petugas = $_POST['id_petugas'];
    $nisn = $_POST['nisn'];
    $bulan_bayar = $_POST['bulan_bayar'];
    $tahun_bayar = $_POST['tahun_bayar'];
    $id_spp = $_POST['id_spp'];
    $jumlah_bayar = $_POST['jumlah_bayar'];
    $tabel = 'pembayaran';
    $insert = $db->tambah_pembayaran($tabel, $id_pembayaran, $id_petugas, $nisn, $bulan_bayar, $tahun_bayar, $id_spp, $jumlah_bayar);

    if ($insert == true) {
        echo ("<script type='text/javascript'>alert('Data Berhasil Diinput');window.location = '../pembayaran';</script>");
    } else {
        echo ("<script type='text/javascript'>alert('Data Gagal Diinput, silakan cek lagi');</script>");
    }
}
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Pembayaran</h2>   
                <h5>Selamat Datang <strong><?php echo ($_SESSION['nama']); ?> </strong>, Senang melihat anda kembali. </h5>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Entri Data Pembayaran
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form action="" method="post" name="Pembayaran">
                                <div class="col-md-6">
                                    <label>NISN Siswa</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"></span>
                                        <input name="nisn" type="number" class="form-control"  placeholder="NISN Siswa" required/>
                                    </div>
                                    <label>Jumlah Dibayar</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"></span>
                                        <input name="jumlah_bayar" type="text" class="form-control"  placeholder="jumlah_bayar" required/>
                                    </div>
                                    <?php foreach ($namapetugas as $np) { ?>
                                        <input name="id_petugas" type="text" class="hidden"  value="<?php echo $np['id_petugas'] ?>" />
                                    <?php } ?>

                                    <input name="bulan_bayar" type="text" class="hidden" placeholder="Bulan Bayar" value="<?php echo $waktu['bulan']; ?>"  required/>

                                    <input name="tahun_bayar" type="text" class="hidden"  placeholder="Tahun Bayar" value="<?php echo $waktu['tahun']; ?>"  required/>
                                    <?php foreach ($spp as $s) { ?>
                                        <input name="id_spp" type="number" class="hidden" value="<?php echo $s['id_spp'] ?>"  required/>
                                    <?php } ?>
                                    <div class="pull-right">
                                        <input type="submit" name="simpan" class="btn btn-primary" value="Tambah">
                                    </div>
                                </div>
                            </form>
                        </div> 
                    </div>  
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>