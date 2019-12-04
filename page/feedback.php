<?php $id_tkerja = $_SESSION['id_tkerja']; 
    $sql6 = "UPDATE feedback SET dibaca_user = 'Y' WHERE id_tkerja = '$id_tkerja'";
    $db->query($sql6);
?>
<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <div class="row">
                        <div class="col-sm-5">
                            <h3>Tanggapan Anda</h3>
                        </div>
                        <div class="col text-right">
                            <a href="?act=berifeedback" class="btn btn-warning">Buat Tanggapan</a>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                <h5 class='card-title'></h5>
                <?php 
                $sql = "SELECT * FROM feedback AS f INNER JOIN tkerja AS t ON f.id_tkerja = t.id_tkerja WHERE f.id_tkerja = '$id_tkerja'";
                $hasil = $db->query($sql);
                $i = 1;
                if ($hasil->num_rows > 0) {
                    while ($row = $hasil->fetch_assoc()) {
                        if ($i == 1) {
                            $output = "<div class='row border-left border-info'>";
                        }else{
                            $output = "<div class='row mt-4 border-left border-info'>";
                        }
                        $output .= "
                            <div class='col-sm-8'><p>$row[isi_feedback]</p></div>
                        </div>
                        ";
                        if ($row['balas_feedback'] != '') {
                            $output .= "
                                <div class='row ml-3 border-left border-info'>
                                    <div class='col-sm-3'>$row[nama_balas] (admin)</div>:
                                    <div class='col-sm-8'><p>$row[balas_feedback]</p></div>
                                    <p></p>
                                </div>
                            ";
                        }
                        $i++;
                        echo $output;
                    }
                }else{
                    echo "
                        <div class='row mt-2'>
                            <div class='col-sm-8'>Belum ada tanggapan dari anda</div>
                        </div>
                    ";
                }
            ?>
                </div>
            </div>
        </div>
    </div>
</div>