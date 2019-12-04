<?php
include '../../koneksi.php';
    $output = '';
    $isi = $_POST['isi_balas'];
    $id_feedback = $_POST['id_feedback'];
    $sql = "UPDATE feedback SET nama_balas = '$_SESSION[nama]', balas_feedback = '$isi', dibaca_user = 'N' WHERE id_feedback = '$id_feedback'";
    if ($db->query($sql) === TRUE) {
        $sql = "SELECT * FROM feedback AS f INNER JOIN tkerja AS t ON f.id_tkerja = t.id_tkerja";
        $hasil = $db->query($sql);
        $output .= "
            <div class='alert alert-success'><p>Berhasil</p></div>
        ";
        $i = 1;
        if ($hasil->num_rows > 0) {
            while ($row = $hasil->fetch_assoc()) {
                if ($i == 1) {
                    $output .= "<div class='row border-left border-info'>";
                }else{
                    $output .= "<div class='row mt-4 border-left border-info'>";
                }
                $output .= "
                    <div class='col-sm-3'><p>$row[nama]</p></div>
                    <div class='col-sm-8'><p>$row[isi_feedback]</p></div>";
                    if ($row['balas_feedback'] == '') {
                        $output .= "<div class='col-sm-1'><button class='btn btn-info balas' id='$row[id_feedback]'>Balas</button></div>";
                    }
                $output .= "
                </div>
                ";
                if ($row['balas_feedback'] != '') {
                    $output .= "
                        <div class='row ml-3 border-left border-info'>
                            <div class='col-sm-3'>$row[nama_balas] (admin)</div>
                            <div class='col-sm-8'><p>$row[balas_feedback]</p></div>
                            <p></p>
                        </div>
                    ";
                }else{
                    $output .= "
                        <div class='row ml-3 border-left border-info row_balas$row[id_feedback]' id='ini$row[id_feedback]' style='display:none;'>
                            <form id='formBalas$row[id_feedback]' method='post' action='?act=feedback'>
                            <div class='col-sm-8'>
                                <input type='hidden' name='id_feedback' value='$row[id_feedback]'>
                                <textarea name='isi_balas' id='isi_balas' rows='3' cols='150' class='form-control' required></textarea>
                                <button type='submit' class='btn btn-primary mt-1 balas_form' id='$row[id_feedback]'>Submit</button>
                            </div>
                            </form>
                        </div>
                    ";
                }
                $i++;
    }  
}}
echo $output;
?>