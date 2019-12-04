<?php 
include '../../koneksi.php';
$output = '';
$nokpj = $_POST['nokpj'];
$sql = "SELECT * FROM tkerja WHERE id_kpj = '$nokpj'";
$hasil = $db->query($sql);
if ($hasil->num_rows > 0) {
    $row = $hasil->fetch_assoc();
    $output .= "
    <form id='form-pembayaran' method='post'>
    <div class='row mt-2'>
        <div class='col-sm-3'><label>No KPJ</label></div>
        <div class='col-sm-8'>$nokpj</div>
        <input type='hidden' name='id_tkerja' value='$row[id_tkerja]'>
    </div>
    <div class='row mt-2'>
        <div class='col-sm-3'><label>Nama</label></div>
        <div class='col-sm-8'>$row[nama]</div>
    </div>
    <div class='row mt-2'>
        <div class='col-sm-3'><label>Perusahaan</label></div>
        <div class='col-sm-8'>$row[perusahaan]</div>
    </div>
    <div class='row mt-2'>
        <div class='col-sm-3'><label>Ahli Waris</label></div>
        <div class='col-sm-8'>$row[waris]</div>
    </div>
    <div class='row mt-2'>
        <div class='col-sm-3'><label>Jenis Pembayaran</label></div>
        <div class='col-sm-8'>
            <select name='jenis' id='jenis' class='form-control'>
                <option value='JKK'>JKK</option>
                <option value='JHT'>JHT</option>
                <option value='JKM'>JKM</option>
                <option value='JK'>JK</option>
            </select>
        </div>
    </div>
    <div class='row mt-2'>
        <div class='col-sm-3'><label>Bulan</label></div>
        <div class='col-sm-8'><input type='text' name='bulan' class='form-control'></div>
    </div>
    <div class='row mt-2'>
        <div class='col-sm-3'><label>Tahun</label></div>
        <div class='col-sm-8'><input type='text' name='tahun' class='form-control'></div>
    </div>
    <div class='row mt-2'>
        <div class='col-sm-3'><label>Tanggal Bayar</label></div>
        <div class='col-sm-8'><input type='date' name='tanggal' class='form-control'></div>
    </div>
    <div class='row mt-2'>
        <div class='col-sm-3'><label>Jumlah Bayar</label></div>
        <div class='col-sm-8'><input type='number' name='jumlah' class='form-control'></div>
    </div>
    <div class='row mt-2'>
        <div class='col-sm-3'><label>Keterangan</label></div>
        <div class='col-sm-8'><input type='text' name='keterangan' class='form-control'></div>
    </div>
    <div class='row mt-2'>
        <div class='col-sm-3'><button type='submit' name='submit' class='btn btn-primary' id='submit-pembayaran'>Submit</button></div>
    </div>
    </form>
    ";
}else{
    $output .= 'Tidak Ada Data';
}
echo $output;

?>