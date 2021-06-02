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
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_petugas = $_POST['nama_petugas'];
    $level = $_POST['level'];
    $tabel = 'petugas';
    $insert = $db->tambah_petugas($tabel, $username, $password, $nama_petugas, $level);

    if ($insert == true) {
        echo ("<script type='text/javascript'>alert('Data Berhasil Diinput');window.location = '../petugas';</script>");
    } else {
        echo ("<script type='text/javascript'>alert('Data Gagal Diinput, silakan cek lagi');</script>");
    }
}
?>

<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Tambah Data Petugas</h2>   
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
                            <form action="" method="post" name="tambah_petugas">
                                <div class="col-md-6">
                                    <label>Username</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"></span>
                                        <input name="username" type="username" class="form-control" placeholder="Username " required />
                                    </div>
                                    <label>Password</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"></span>
                                        <input name="password"type="Password" class="form-control"  placeholder="Password" required/>
                                    </div>
                                    <label>Petugas</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"></span>
                                        <input name="nama_petugas"type="text" class="form-control"  placeholder="Petugas" required/>
                                    </div>
                                    <label>Level</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"></span>
                                            <select name="level">
                                                <option value="" selected disabled>--Level--</option>
                                                 <option value="1">admin</option>
                                                    <option value="2">petugas</option>
                                            </select>
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
