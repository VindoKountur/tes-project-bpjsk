<?php
include '../../koneksi.php';
if(!empty($_POST))
{
    $output = '';
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $konfPass = $_POST['konfPass'];
    if($_POST["id_admin"] != '')  
    {  
        $sql = "UPDATE admin   
        SET username ='$username',   
        nama ='$nama',   
        password ='$password'
        WHERE id_admin ='".$_POST["id_admin"]."'";  
        $alert = 'Berhasil Ubah Data';  
    }else{
        $sql = "INSERT INTO admin 
        (id_admin, username, password, nama, level) 
        VALUES ('', '$username', '$password', '$nama', '2')";
        $alert = 'Berhasil Tambah Data';
    }  
    if ($db->query($sql) === TRUE) {
    {
    $output .= "<div class='alert mt-2 alert-success' id='alert' style='display:block'>$alert
            </div>";
     $sql = "SELECT * FROM admin ORDER BY id_admin DESC";
     $hasil = $db->query($sql);
     $output .= '
     <table class="table">
     <thead class="thead-light">
         <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Level Admin</th>
            <th>Aksi</th>
         </tr>
     </thead>
     ';
     $no = 1;
     while($row = $hasil->fetch_assoc())
     {
      $output .= "
        <tr>
            <td>$no</td>
            <td>$row[nama]</td>
            <td>$row[username]</td>
            <td>$row[level]</td>
            <td>
                <a class='btn btn-info text-white edit_data_admin' id='$row[id_admin]'>Ubah</a>
                <a class='btn btn-danger text-white del_data_admin' id='$row[id_admin]'>Hapus</a>
            </td>
        </tr>
      ";
      $no++;
     }
     $output .= '</table>';
    }
    echo $output;
}else{
    $output .= 'Gagal';
    echo $output;
}
}
?>