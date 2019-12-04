<?php
include '../../koneksi.php';
    $output = '';
    if (isset($_POST['searchKey'])) {
        $searchKey = $_POST['searchKey'];
        $sql = "SELECT * FROM admin 
        WHERE username LIKE '%".$searchKey."%'
        OR nama LIKE '%".$searchKey."%'
        ";
    }else{
        $sql = "SELECT * FROM admin";
    }
    $hasil = $db->query($sql);
    $output .= '
    <table class="table">
    <thead class="bg-light">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Level Admin</th>
            <th>Aksi</th>
        </tr>
    </thead>
    ';
    if ($hasil->num_rows == 0) {
        $output .= "
            <tr><td colspan='5' align='center'>No Data</td></tr>
        ";
    }else{
        $no = 1;
        while ($row = $hasil->fetch_assoc()) {
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
    }
    $output .= "</table>
    ";
    echo $output;
?>