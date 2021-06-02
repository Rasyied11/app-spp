<?php

include '../config/database.php';
$db = new database();

$aksi = $_GET['aksi'];
$menu = $_GET['menu'];
if ($aksi == "hapus") {
    $hapus = $db->hapus($_GET['tabel'],$_GET['field'],$_GET['id']);
    if($hapus == true){
        header("location:../$menu");
    } else {
        echo ("<script type='text/javascript'>alert('Data Gagal Dihapus');</script>");
    }
    
} elseif ($aksi == "update") {
    $db->update($_POST['id'], $_POST['nama'], $_POST['alamat'], $_POST['usia']);
    header("location:tampil.php");
}