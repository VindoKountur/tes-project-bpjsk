<?php
include '../../koneksi.php';
if(!empty($_POST))
{
    $output = '';
    $kpj = $_POST['kpj'];
    $nama_tk = $_POST['nama_tk'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $no_penetapan = $_POST['no_penetapan'];
    $nama_ahli_waris = $_POST['nama_ahli_waris'];
    $hubungan = $_POST['hubungan'];
    $nik = $_POST['nik'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $no_hp = $_POST['no_hp'];
    if($_POST["id_tkerja"] != '')  
    {  
        $sql = "UPDATE tkerja   
        SET id_kpj ='$kpj',   
        nama ='$nama_tk',   
        perusahaan ='$nama_perusahaan',   
        no_penetapan = '$no_penetapan',   
        waris = '$nama_ahli_waris',
        hubungan = '$hubungan',
        nik = '$nik',
        tgl_lahir = '$tanggal_lahir',
        telepon = '$no_hp'   
        WHERE id_tkerja ='".$_POST["id_tkerja"]."'";  
        $alert = 'Berhasil Ubah Data';  
    }else{
        $sql = "INSERT INTO tkerja 
        (id_tkerja, id_kpj, nama, perusahaan, no_penetapan, waris, hubungan, nik, tgl_lahir, telepon) 
        VALUES ('', '$kpj', '$nama_tk', '$nama_perusahaan', '$no_penetapan', '$nama_ahli_waris', '$hubungan', 
        '$nik', '$tanggal_lahir', '$no_hp')";
        $alert = 'Berhasil Tambah Data';
    }  
    if ($db->query($sql) === TRUE) {
    {
    $output .= "<div class='alert mt-2 alert-success' id='alert' style='display:block'>$alert
            </div>";
     $sql = "SELECT * FROM tkerja ORDER BY id_tkerja DESC";
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
    }
    echo $output;
}else{
    $output .= 'Gagal';
    echo $output;
}
}
?>