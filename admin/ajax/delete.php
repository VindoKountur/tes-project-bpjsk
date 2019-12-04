<?php 
include '../koneksi.php';
if (isset($_POST['id_tkerja'])) {   
    $id_tkerja = $_POST['id_tkerja'];
    $sql = "DELETE FROM tkerja WHERE id_tkerja = '$id_tkerja'";
    $hasil = $db->query($sql);
}elseif (isset($_POST['id_admin'])) {
    $id_admin = $_POST['id_admin'];
    $sql = "DELETE FROM admin WHERE id_admin = '$id_admin'";
    $hasil = $db->query($sql);
}
?>