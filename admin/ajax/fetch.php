<?php  
 //fetch.php
include '../koneksi.php';  
if(isset($_POST["id_tkerja"]))  
{  
   $sql = "SELECT * FROM tkerja WHERE id_tkerja = '".$_POST["id_tkerja"]."'";  
   $hasil = $db->query($sql);  
   $row = $hasil->fetch_assoc();  
   echo json_encode($row);  
}elseif (isset($_POST['id_admin'])) {
   $sql = "SELECT * FROM admin WHERE id_admin = '".$_POST["id_admin"]."'";  
   $hasil = $db->query($sql);  
   $row = $hasil->fetch_assoc();  
   echo json_encode($row);  
}
?>