<?php
include '../_template/header.php';
include '../_template/menu.php';
include '../_template/footer.php';
if ($_SESSION['level'] !== 'admin') {
    echo ("<script type='text/javascript'>alert('Anda Tidak Diperbolehkan Mengakses Halaman Ini');window.location = '../config/logout.php';</script>");
}
include '../config/database.php';
$db = new database();

if (isset($_POST['simpan'])) {
    $nama_kelas = $_POST['nama_kelas'];
    $kompetensi_keahlian = $_POST['kompetensi_keahlian'];
    $tabel = 'kelas';
    $insert = $db->tambah_kelas($tabel, $nama_kelas, $kompetensi_keahlian);

    if ($insert == true) {
        echo ("<script type='text/javascript'>alert('Data Berhasil Diinput');window.location = '../kelas';</script>");
    } else {
        echo ("<script type='text/javascript'>alert('Data Gagal Diinput, silakan cek lagi');</script>");
    }
}
?>

<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Tambah Data Kelas</h2>   
                <h5>Selamat Datang <strong><?php echo ($_SESSION['nama']); ?> </strong>, Senang melihat anda kembali. </h5>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <!--    Context Classes  -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <form action="" method="post" name="tambah_siswa">
                                <div class="col-md-6">
                                    <label>Kelas</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"></span>
                                        <input name="nama_kelas" type="text" class="form-control" placeholder="Kelas" required />
                                    </div>
                                    <label>Keahlian</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"></span>
                                        <input name="kompetensi_keahlian"type="text" class="form-control"  placeholder="Keahlian" required/>
                                    </div>
                                   <div class="pull-right">
                                        <input type="submit" name="simpan" class="btn btn-primary" value="Tambah">
                                    </div>
                                </div>
                            </form>   

                        </div>
                    </div> 
                </div>  
            </div>
        </div>
        <!--  end  Context Classes  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
