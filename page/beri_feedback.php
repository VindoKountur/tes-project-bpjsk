<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <div class="card">
                <div class="card-body">
                    <h5 class='card-title'>Berikan tanggapan anda :</h5>
                    <form action="" method="post">
                        <textarea name="isi" id="isi" rows="5" class="form-control"></textarea>
                        <button type="submit" name="submit" id="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php  

    if (isset($_POST['isi'])) {
        if ($_POST['isi'] == '') {
            echo "
                <script>
                    alert('Inputan tidak boleh kosong');
                </script>
            ";
        }else{
            $isi = $_POST['isi'];
            $sql = "INSERT INTO feedback (id_feedback, id_tkerja, isi_feedback, nama_balas, balas_feedback, dibaca, dibaca_user) VALUES ('', '$_SESSION[id_tkerja]', '$isi', '','','N','Y')";
            if ($db->query($sql) === TRUE) {
                echo "
                    <script>
                        alert('Berhasil, terima kasih');
                        location.href = '?act=feedback';
                    </script>
                ";
            }else{
                echo "
                    <script>
                        alert('Error');
                    </script>
                ";
            }
        }
    }

?>