<?php
include '../../koneksi.php';
    $output = '';
    $output .= "<div class='alert mt-2 alert-success' id='alert' style='display:none'>
            </div>";
    if (isset($_POST['searchKey'])) {
        $searchKey = $_POST['searchKey'];
        $sql = "SELECT * FROM tkerja 
        WHERE nama LIKE '%".$searchKey."%'
        OR id_kpj LIKE '%".$searchKey."%' 
        OR waris LIKE '%".$searchKey."%'
        ORDER BY id_tkerja DESC
        ";
    }else{
        $sql = "SELECT * FROM tkerja ORDER BY id_tkerja DESC";
    }
    $hasil = $db->query($sql);
    $output .= '
    <div class="table-responsive-sm mt-2 mb-3">
    <table class="table">
    <thead class="thead-light">
        <tr>
        <th scope="col">KPJ</th>
        <th scope="col">Nama Tenaga Kerja</th>
        <th scope="col">Perusahaan</th>
        <th scope="col">No Penetapan</th>
        <th scope="col">Ahli Waris</th>
        <th scope="col">Hubungan</th>
        <th scope="col">NIK</th>
        <th scope="col">Tanggal Lahir</th>
        <th scope="col">Telepon</th>
        <th scope="col">Aksi</th>
        </tr>
    </thead>
    ';
    while($row = $hasil->fetch_assoc())
    {
    $output .= "
        <tr>
            <td>$row[id_kpj]</td>
            <td>$row[nama]</td>
            <td>$row[perusahaan]</td>
            <td>$row[no_penetapan]</td>
            <td>$row[waris]</td>
            <td>$row[hubungan]</td>
            <td>$row[nik]</td>
            <td>$row[tgl_lahir]</td>
            <td>$row[telepon]</td>
            <td width='190' align='center'>
                <a class='btn btn-info btn-sm text-white view_data' id='$row[id_tkerja]'>Detail</a>
                <a class='btn btn-info btn-sm text-white edit_data' id='$row[id_tkerja]'>Edit</a>
                <a class='btn btn-danger btn-sm text-white del_data' id='$row[id_tkerja]'>Hapus</a>
            </td>
        </tr>
    ";
    }
    $output .= '</table>';
    echo $output;
?>