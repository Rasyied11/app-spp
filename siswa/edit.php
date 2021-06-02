<?php
include '../_template/header.php';
include '../_template/menu.php';
include '../_template/footer.php';
if ($_SESSION['level'] !== 'admin') {
    echo ("<script type='text/javascript'>alert('Anda Tidak Diperbolehkan Mengakses Halaman Ini');window.location = '../config/logout.php';</script>");
}
include '../config/database.php';
$db = new database();
$spp = $db->referensi_spp();
$kelas = $db->refernsi_kelas();
$ambils = $db->ambil_data($_GET['tabel'],$_GET['field'],$_GET['id']);
if (isset($_POST['edit'])) {
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $id_kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $id_spp = $_POST['id_spp'];
    $tabel = 'siswa';
    $insert = $db->update_siswa($tabel, $nisn, $nis, $nama_siswa, $id_kelas, $alamat, $no_telp, $id_spp);

    if ($insert == true) {
        echo ("<script type='text/javascript'>alert('Data Berhasil Diupdate');window.location = '../siswa';</script>");
    } else {
        echo ("<script type='text/javascript'>alert('Data Gagal Diupdate, silakan cek lagi');</script>");
    }
}
?>

<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Data Siswa</h2>   
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
                                <div class="col-md-6">
                                    <label>NISN Siswa</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"></span>
                                        <input name="nisn" type="number" class="form-control" required value="<?php echo $ambil['nisn'];?>"   />
                                    </div>
                                    <label>NIS Siswa</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"></span>
                                        <input name="nis"type="number" class="form-control"  placeholder="NIS Siswa" required value="<?php echo $ambil['nis'];?>" >
                                    </div>
                                    <label>Nama Siswa</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"></span>
                                        <input name="nama_siswa" type="text" class="form-control"  placeholder="Nama Siswa" required value="<?php echo $ambil['nama'];?>"/>
                                    </div>
                                    <label>Kelas</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"></span>
                                        <select class="form-control" name="id_kelas">
                                            <option selected disabled>-Silakan Pilih-</option>
                                            <?php
                                            foreach ($kelas as $a) {
                                                ?>    
                                                <option <?php if($a['id_kelas'] == $ambil['id_kelas']){ echo "selected = 'selected'";}?> value="<?php echo $a['id_kelas']; ?>"><?php echo $a['nama_kelas']; ?> - <?php echo $a['kompetensi_keahlian']; ?> </option>
                                            <?php } ?>
                                        </select>    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Alamat</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"></span>
                                        <textarea name="alamat" type="text" class="form-control" required ><?php echo $ambil['alamat'];?></textarea>
                                    </div>
                                    <label>No Telp</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"></span>
                                        <input name="no_telp" type="number" class="form-control"  placeholder="Telpon Siswa" required value="<?php echo $ambil['no_telp'];?>"/>
                                    </div>
                                    <label>Jumlah SPP</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"></span>
                                        <select class="form-control" name="id_spp">
                                            <option selected disabled>-Silakan Pilih-</option>
                                            <?php
                                            foreach ($spp as $a) {
                                                ?>    
                                            <option <?php if($a['id_spp'] == $ambil['id_spp']){ echo "selected = 'selected'";}?> value="<?php echo $a['id_spp']; ?>"><?php echo $a['nominal']; ?></option>
                                            <?php } ?>
                                        </select>    
                                    </div>
                                </div>
                                <div class="col-md-12 ">
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