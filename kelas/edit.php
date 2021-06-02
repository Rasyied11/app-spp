<?php
include '../_template/header.php';
include '../_template/menu.php';
include '../_template/footer.php';
if ($_SESSION['level'] !== 'admin') {
    echo ("<script type='text/javascript'>alert('Anda Tidak Diperbolehkan Mengakses Halaman Ini');window.location = '../config/logout.php';</script>");
}
include '../config/database.php';
$db = new database();
$ambils = $db->ambil_data($_GET['tabel'],$_GET['field'],$_GET['id']);
if (isset($_POST['edit'])) {
    $id_kelas = $_GET['id'];
    $nama_kelas = $_POST['nama_kelas'];
    $kompetensi_keahlian = $_POST['kompetensi_keahlian'];
    $tabel = 'kelas';
    $insert = $db->update_kelas($tabel, $id_kelas, $nama_kelas, $kompetensi_keahlian);

    if ($insert == true) {
        echo ("<script type='text/javascript'>alert('Data Berhasil Diupdate');window.location = '../kelas';</script>");
    } else {
        echo ("<script type='text/javascript'>alert('Data Gagal Diupdate, silakan cek lagi');</script>");
    }
}
?>

<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Data Kelas</h2>   
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
                            <form action="" method="post" name="edit_siswa">
                                <?php
                                
                                foreach($ambils as $ambil){
                                ?>
                                  <input name="id_kelas" type="number" class="hidden" required value="<?php echo $ambil['id_kelas'];?>"   />

                                <div class="col-md-6">
                                    <label>Kelas</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"></span>
                                        <input name="nama_kelas" type="text" class="form-control" required value="<?php echo $ambil['nama_kelas'];?>"   />
                                    </div>
                                    <label>Keahlian</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"></span>
                                        <input name="kompetensi_keahlian"type="text" class="form-control"  placeholder="Keahlian" required value="<?php echo $ambil['kompetensi_keahlian'];?>" >
                                    </div>
                                    <div class="pull-right">
                                        <input type="submit" name="edit" class="btn btn-success" value="Edit">
                                    </div>
                                    
                                </div>
                                
                                <?php } ?>
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