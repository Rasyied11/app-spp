<?php

class database {

    var $host = "localhost";
    var $uname = "root";
    var $pass = "";
    var $db = "ap_spp";
    var $aksi = "";
    
    function __construct() {
        $GLOBALS['koneksi'] = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
    }

    function cek_login($username, $password) {
        $cek_petugas = mysqli_query($GLOBALS['koneksi'], "SELECT * FROM petugas WHERE username = '$username' AND password = md5('$password')");
        $cek_siswa = mysqli_query($GLOBALS['koneksi'], "SELECT * FROM siswa WHERE nisn = '$username' AND nis = '$password'");
        $hasil_petugas = mysqli_num_rows($cek_petugas);
        $hasil_siswa = mysqli_num_rows($cek_siswa);
        $data_petugas = mysqli_fetch_assoc($cek_petugas);
        $data_siswa = mysqli_fetch_assoc($cek_siswa);

        if ($hasil_petugas > 0) {
            $_SESSION['username'] = $data_petugas['username'];
            $_SESSION['nama'] = $data_petugas['nama_petugas'];
            $_SESSION['level'] = $data_petugas['level'];
            $_SESSION['status'] = 'login';
            $_SESSION['tanggal'] = date("d-m-Y");
            return true;
        } else if ($hasil_siswa > 0) {
            $_SESSION['username'] = $data_siswa['nisn'];
            $_SESSION['nama'] = $data_siswa['nama'];
            $_SESSION['level'] = 'siswa';
            $_SESSION['status'] = 'login';
            $_SESSION['tanggal'] = date("d-m-Y");
            return true;
        } else {
            return false;
        }
    }
        public function konek($query) {
        mysqli_query($GLOBALS['koneksi'],$query);
    }
    
    //function yang dipakai bersama
       
    function referensi_spp(){
        $query = "SELECT * FROM spp";
        $aksi = mysqli_query($GLOBALS['koneksi'], $query);
        while ($hasil = mysqli_fetch_assoc($aksi)) {
            $tampilspp[] = $hasil;
        }
        return $tampilspp;
    }

    function referensi_petugas(){
        $query = "SELECT * FROM petugas";
        $aksi = mysqli_query($GLOBALS['koneksi'], $query);
        while ($hasil = mysqli_fetch_assoc($aksi)) {
            $tampilpetugas[] = $hasil;
        }
        return $tampilpetugas;
    }
    
    function referensi_kelas(){
        $query = "SELECT * FROM kelas";
        $aksi = mysqli_query($GLOBALS['koneksi'], $query);
        while ($hasil = mysqli_fetch_assoc($aksi)) {
            $tampilkelas[] = $hasil;
        }
        return $tampilkelas;
    }

    function hapus($tabel, $field, $id){
        $query = "delete from $tabel where $field='$id'";
	$this->konek($query);
        return true;
    }
    
    function ambil_data($tabel,$field,$id){
        $query = ("SELECT * FROM $tabel where $field = '$id'");
        $aksi = mysqli_query($GLOBALS['koneksi'], $query);
        while ($hasil = mysqli_fetch_assoc($aksi)){
            $ambil[] = $hasil;
        }
        return $ambil;
    }
    
    //function untuk data siswa
    public function tampil_data_siswa() {
        $query = "SELECT a.nisn, a.nis, a.nama, b.nama_kelas AS kelas, a.no_telp, c.nominal AS spp FROM siswa a JOIN kelas b ON b.id_kelas = a.id_kelas JOIN spp c ON c.id_spp = a.id_spp";
        $aksi = mysqli_query($GLOBALS['koneksi'], $query);
        while ($hasil = mysqli_fetch_assoc($aksi)) {
            $tampil[] = $hasil;
        }
        return $tampil;
    }

    public function tambah_siswa($tabel, $nisn,$nis,$nama_siswa,$id_kelas,$alamat,$no_telp,$id_spp) {
        $query = "insert into $tabel values ('$nisn','$nis','$nama_siswa','$id_kelas','$alamat','$no_telp','$id_spp')";
        $aksi = mysqli_query($GLOBALS['koneksi'], $query);
        return true;
    }
    
    public function update_siswa($tabel, $nisn,$nis,$nama_siswa,$id_kelas,$alamat,$no_telp,$id_spp){
        $query = "UPDATE $tabel SET nis = '$nis', nama = '$nama_siswa', id_kelas = '$id_kelas', alamat = '$alamat', no_telp = '$no_telp', id_spp = '$id_spp' WHERE nisn = '$nisn'";
        $aksi = mysqli_query($GLOBALS['koneksi'], $query);
        return true;
    }

   //function untuk data spp
     public function tambah_spp($tabel, $tahun,$nominal) {
        $query = "insert into $tabel values ('','$tahun','$nominal')";
        $aksi = mysqli_query($GLOBALS['koneksi'], $query);
        return true;
    }
    
    public function update_spp($tabel, $id_spp, $tahun,$nominal){
        $query = "UPDATE $tabel SET tahun = '$tahun', nominal = '$nominal'WHERE id_spp = '$id_spp'";
        $aksi = mysqli_query($GLOBALS['koneksi'], $query);
        return true;
    }

    //function untuk data kelas
     public function tambah_kelas($tabel, $nama_kelas,$kompetensi_keahlian) {
        $query = "insert into $tabel values ('','$nama_kelas','$kompetensi_keahlian')";
        $aksi = mysqli_query($GLOBALS['koneksi'], $query);
        return true;
    }
    
    public function update_kelas($tabel, $id_kelas, $nama_kelas,$kompetensi_keahlian){
        $query = "UPDATE $tabel SET nama_kelas = '$nama_kelas', kompetensi_keahlian = '$kompetensi_keahlian'WHERE id_kelas = '$id_kelas'";
        $aksi = mysqli_query($GLOBALS['koneksi'], $query);
        return true;
    }

    //function untuk data petugas
    public function tambah_petugas($tabel, $username,$password,$nama_petugas,$level) {
        $query = "insert into $tabel values ('','$username','$password','$nama_petugas','$level')";
        $aksi = mysqli_query($GLOBALS['koneksi'], $query);
        return true;
    }
    
    public function update_petugas($tabel, $id_petugas, $username,$password,$nama_petugas,$level){
        $query = "UPDATE $tabel SET username = '$username', password = '$password',nama_petugas = '$nama_petugas', level = '$level' WHERE id_petugas = '$id_petugas'";
        $aksi = mysqli_query($GLOBALS['koneksi'], $query);
        return true;
    }

//function untuk data pembayaran
    public function tambah_pembayaran($tabel, $id_pembayaran, $id_petugas, $nisn, $bulan_bayar, $tahun_bayar, $id_spp, $jumlah_bayar) {
        $query = "insert into $tabel values ('$id_pembayaran', '$id_petugas', '$nisn', CURDATE(), '$bulan_bayar', '$tahun_bayar', '$id_spp', '$jumlah_bayar')";
        $aksi = mysqli_query($GLOBALS['koneksi'], $query);
        return true;
    }

    public function tanggal() {
        $tanggal = date('d');
        $bulan = date('m');
        $tahun = date('Y');
        $date = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun
        );
        return $date;
    }

    public function ref_spp() {
        $date = $this->tanggal();
        $tahun = $date['tahun'];
        $query = "SELECT * FROM spp where tahun = $tahun";
        $aksi = mysqli_query($GLOBALS['koneksi'], $query);
        while ($hasil = mysqli_fetch_assoc($aksi)) {
            $tampilspp[] = $hasil;
        }
        return $tampilspp;
    }

    function ref_petugas($petugas) {
        $query = "SELECT * FROM petugas where username = '$petugas' ";
        $aksi = mysqli_query($GLOBALS['koneksi'], $query);
        while ($hasil = mysqli_fetch_assoc($aksi)) {
            $tampilpetugas[] = $hasil;
        }
        return $tampilpetugas;
    }

    //function untuk history pembayaran
    public function history($user,$level) {
        if ($level == 'siswa') {
            $query = "SELECT b.nama_petugas AS petugas,d.nama AS siswa, a.tgl_bayar AS tanggal, c.nominal AS tagihan, a.jumlah_bayar AS bayar FROM pembayaran a JOIN petugas b ON b.id_petugas = a.id_petugas JOIN spp c ON c.id_spp = a.id_spp JOIN siswa d ON d.nisn = a.nisn WHERE d.nisn = '$user'";
        } else {
            $query = "SELECT b.nama_petugas AS petugas,d.nama AS siswa, a.tgl_bayar AS tanggal, c.nominal AS tagihan, a.jumlah_bayar AS bayar FROM pembayaran a JOIN petugas b ON b.id_petugas = a.id_petugas JOIN spp c ON c.id_spp = a.id_spp JOIN siswa d ON d.nisn = a.nisn";
        }
        $aksi = mysqli_query($GLOBALS['koneksi'], $query);
        while ($hasil = mysqli_fetch_assoc($aksi)) {
            $history[] = $hasil;
        }
        return $history;
    }
}
