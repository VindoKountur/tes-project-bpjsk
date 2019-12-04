<?php 
include '../../koneksi.php';
    $output = '';
    // baca current date
    $today = date("Ymd");

    $sql = "SELECT max(id_transaksi) AS last FROM transaksi WHERE id_transaksi LIKE '$today%'";
    $hasil1 = $db->query($sql);
    $data  = $hasil1->fetch_assoc();
    $lastNoTransaksi = $data['last'];

    // baca nomor urut transaksi dari id transaksi terakhir
    $lastNoUrut = substr($lastNoTransaksi, 8, 4); 

    // nomor urut ditambah 1
    $nextNoUrut = $lastNoUrut + 1;

    // membuat format nomor transaksi berikutnya
    $nextNoTransaksi = $today.sprintf('%04s', $nextNoUrut);

    $id_tkerja = $_POST['id_tkerja'];
    $jenis = $_POST['jenis'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $tanggal = $_POST['tanggal'];
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];

// proses simpan data transaksi dengan nomor transaksi yang baru
$sql = "INSERT INTO transaksi (id_transaksi, id_tkerja, jenis, bulan, tahun, tgl_bayar, jumlah, keterangan)
          VALUES ('$nextNoTransaksi', '$id_tkerja', '$jenis', '$bulan','$tahun', '$tanggal', '$jumlah', '$keterangan')";
if ($db->query($sql) === TRUE) {
    $sql = "SELECT * FROM tkerja WHERE id_tkerja = '$id_tkerja'";
    $hasil = $db->query($sql);
    if ($hasil->num_rows > 0) {
        $row = $hasil->fetch_assoc();
        $output .= "
        <div class='card'>
        <div class='card-header bg-info text-white'>
            <label><strong>Transaksi Berhasil</strong></label>
        </div>
        <div class='card-body'>
            <div class='row mt-2'>
                <div class='col-sm-3'><label>ID Transaksi</label></div>
                <div class='col-sm-8 bg-light'>$nextNoTransaksi</div>
            </div>
            <div class='row mt-2'>
                <div class='col-sm-3'><label>No KPJ</label></div>
                <div class='col-sm-8 bg-light'>$row[id_kpj]</div>
            </div>
            <div class='row mt-2'>
                <div class='col-sm-3'><label>Jenis Pembayaran</label></div>
                <div class='col-sm-8 bg-light'>$jenis</div>
            </div>
            <div class='row mt-2'>
                <div class='col-sm-3'><label>Nama</label></div>
                <div class='col-sm-8 bg-light'>$row[nama]</div>
            </div>
            <div class='row mt-2'>
                <div class='col-sm-3'><label>Perusahaan</label></div>
                <div class='col-sm-8 bg-light'>$row[perusahaan]</div>
            </div>
            <div class='row mt-2'>
                <div class='col-sm-3'><label>Ahli Waris</label></div>
                <div class='col-sm-8 bg-light'>$row[waris]</div>
            </div>
            <div class='row mt-2'>
                <div class='col-sm-3'><label>Bulan</label></div>
                <div class='col-sm-8 bg-light'>$bulan</div>
            </div>
            <div class='row mt-2'>
                <div class='col-sm-3'><label>Tahun</label></div>
                <div class='col-sm-8 bg-light'>$tahun</div>
            </div>
            <div class='row mt-2'>
                <div class='col-sm-3'><label>Tanggal Bayar</label></div>
                <div class='col-sm-8 bg-light'>$tanggal</div>
            </div>
            <div class='row mt-2'>
                <div class='col-sm-3'><label>Jumlah Bayar</label></div>
                <div class='col-sm-8 bg-light'>$jumlah</div>
            </div>
            <div class='row mt-2'>
                <div class='col-sm-3'><label>Keterangan</label></div>
                <div class='col-sm-8 bg-light'>$keterangan</div>
            </div>
            <div class='row mt-2'>
                <div class='col-sm-3'><a class='btn btn-primary' href='?act=pembayaran'>Kembali</a></div>
            </div>
        </div>
        </div>
        ";
        
        
    }else{
        $output .= 'Tidak Ada Data';
    }
}else{
    $output .= 'fail insert';
}




echo $output;

?>