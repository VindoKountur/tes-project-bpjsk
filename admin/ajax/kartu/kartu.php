<?php 
    include '../../koneksi.php';

    $output = '';
    $nokpj = $_POST['nokpj'];
    
    // DATA TENAGA KERJA
    $sql = "SELECT * FROM tkerja WHERE id_kpj = '$nokpj'";
    $q = $db->query($sql);
    if ($q->num_rows == 0) {
        $output .= 'Tidak ada data tenaga kerja';
        echo $output;
        exit;
    }
    $data = $q->fetch_assoc();
    
    $id = $data['id_tkerja'];
    $nama = $data['nama'];
    $perusahaan = $data['perusahaan'];
    $noPenetapan = $data['no_penetapan'];
    $waris = $data['waris'];
    $hubungan = $data['hubungan'];
    $nik = $data['nik'];
    $tglLahir = $data['tgl_lahir'];
    $telepon = $data['telepon'];

    $output .= "
    <h2>Data Tenaga Kerja</h2>
    <div class='row'>
        <div class='col-sm-2'><strong>KPJ</strong></div>
        <div class='col-sm-3'>$nokpj</div>
    </div>
    <div class='row'>
        <div class='col-sm-2'><strong>Nama Tenaga Kerja</strong></div>
        <div class='col-sm-3'>$nama</div>
    </div>
    <div class='row'>
        <div class='col-sm-2'><strong>Perusahaan</strong></div>
        <div class='col-sm-3'>$perusahaan</div>
    </div>
    <div class='row'>
        <div class='col-sm-2'><strong>Ahli Waris</strong></div>
        <div class='col-sm-3'>$waris</div>
    </div>
    <div class='row'>
        <div class='col-sm-2'><strong>Hubungan</strong></div>
        <div class='col-sm-3'>$hubungan</div>
    </div>
    <div class='row'>
        <div class='col-sm-2'><strong>NIK</strong></div>
        <div class='col-sm-3'>$nik</div>
    </div>
    <div class='row'>
        <div class='col-sm-2'><strong>Tanggal Lahir</strong></div>
        <div class='col-sm-3'>$tglLahir</div>
    </div>
    <div class='row'>
        <div class='col-sm-2'><strong>Telepon</strong></div>
        <div class='col-sm-3'>$telepon</div>
    </div>
    ";
    
    // DATA PEMBAYARAN TENAGA KERJA (JKK)
    $sqlJKK = "SELECT * FROM transaksi  WHERE id_tkerja = '$id' AND jenis = 'JKK'";
    
    // DATA PEMBAYARAN TENAGA KERJA (JHT)
    $sqlJHT = "SELECT * FROM transaksi  WHERE id_tkerja = '$id' AND jenis = 'JHT'";
    
    // DATA PEMBAYARAN TENAGA KERJA (JKM)
    $sqlJKM = "SELECT * FROM transaksi  WHERE id_tkerja = '$id' AND jenis = 'JKM'";
    
    // DATA PEMBAYARAN TENAGA KERJA (JP)
    $sqlJP = "SELECT * FROM transaksi  WHERE id_tkerja = '$id' AND jenis = 'JP'";

    //$hasil = $db->query($sql);
    
    // JKK
    $data = $db->query($sqlJKK);
    $output .= "
        <div class='card mt-3'>
            <div class='card-header bg-success text-white'>
                <h5 class='card-title'>Rincian Pembayaran JKK</h5>
            </div>
            <div class='card-body'>
                <table class='table'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. Bayar</th>
                            <th>Bulan</th>
                            <th>Tanggal Bayar</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                    ";
                    $no = 1;
                    while ($row = $data->fetch_assoc()) {
                        $output .= "
                        <tr>
                            <td>$no</td>
                            <td>$row[id_transaksi]</td>
                            <td>".namaBulan($row['bulan'])." ".$row['tahun']."</td>
                            <td>$row[tgl_bayar]</td>
                            <td>$row[jumlah]</td>
                            <td>$row[keterangan]</td>
                        </tr>
                        ";
                        $no++;
                    }
                    $no = 1;
                $output .= "
                    </tbody>
                </table>
            </div>
        </div>
    ";

    // JHT
    $data = $db->query($sqlJHT);
    $output .= "
        <div class='card mt-3'>
            <div class='card-header bg-success text-white'>
                <h5 class='card-title'>Rincian Pembayaran JHT</h5>
            </div>
            <div class='card-body'>
                <table class='table'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. Bayar</th>
                            <th>Bulan</th>
                            <th>Tanggal Bayar</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                    ";
                    $no = 1;
                    while ($row = $data->fetch_assoc()) {
                        $output .= "
                        <tr>
                            <td>$no</td>
                            <td>$row[id_transaksi]</td>
                            <td>".namaBulan($row['bulan'])." ".$row['tahun']."</td>
                            <td>$row[tgl_bayar]</td>
                            <td>$row[jumlah]</td>
                            <td>$row[keterangan]</td>
                        </tr>
                        ";
                        $no++;
                    }
                    $no = 1;
                $output .= "
                    </tbody>
                </table>
            </div>
        </div>
    ";


    // JKM
    $data = $db->query($sqlJKM);
    $output .= "
        <div class='card mt-3'>
            <div class='card-header bg-success text-white'>
                <h5 class='card-title'>Rincian Pembayaran JKM</h5>
            </div>
            <div class='card-body'>
                <table class='table'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. Bayar</th>
                            <th>Bulan</th>
                            <th>Tanggal Bayar</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                    ";
                    $no = 1;
                    while ($row = $data->fetch_assoc()) {
                        $output .= "
                        <tr>
                            <td>$no</td>
                            <td>$row[id_transaksi]</td>
                            <td>".namaBulan($row['bulan'])." ".$row['tahun']."</td>
                            <td>$row[tgl_bayar]</td>
                            <td>$row[jumlah]</td>
                            <td>$row[keterangan]</td>
                        </tr>
                        ";
                        $no++;
                    }
                    $no = 1;
                $output .= "
                    </tbody>
                </table>
            </div>
        </div>
    ";
    

    // JP
    $data = $db->query($sqlJP);
    $output .= "
        <div class='card mt-3'>
            <div class='card-header bg-success text-white'>
                <h5 class='card-title'>Rincian Pembayaran JP</h5>
            </div>
            <div class='card-body'>
                <table class='table'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. Bayar</th>
                            <th>Bulan</th>
                            <th>Tanggal Bayar</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                    ";
                    $no = 1;
                    while ($row = $data->fetch_assoc()) {
                        $output .= "
                        <tr>
                            <td>$no</td>
                            <td>$row[id_transaksi]</td>
                            <td>".namaBulan($row['bulan'])." ".$row['tahun']."</td>
                            <td>$row[tgl_bayar]</td>
                            <td>$row[jumlah]</td>
                            <td>$row[keterangan]</td>
                        </tr>
                        ";
                        $no++;
                    }
                    $no = 1;
                $output .= "
                    </tbody>
                </table>
            </div>
        </div>
    ";

    echo $output;
?>