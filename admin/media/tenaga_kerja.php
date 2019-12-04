<h2>Data Tenaga Kerja</h2>
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal" id="add">
                Tambah Data
            </button>
        </div>
        <div class="col text-right">
            <input type="text" name="cariTK" id="cariTK" class="form-control" placeholder="Cari...">
        </div>
    </div>
    <div id="table-tenagaKerja">
    <div class="alert mt-2" id="alert" style="display:none">
    </div>
        <!-- Daftar Tenaga Kerja -->
        <div class="table-responsive-sm mt-2 mb-3">
        <table class="table">
        <thead class="thead-light">
            <tr>
            <th scope="col">KPJ <p id='car'></p></th>
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
        <tbody>
            <?php 
                $sql = "SELECT * FROM tkerja ORDER BY id_tkerja DESC";
                $hasil = $db->query($sql);
                if ($hasil->num_rows == 0) {
                    echo "
                        <tr><td colspan='10' align='center'>Tidak ada data</td></tr>
                    ";
                }else{
                    while ($data = $hasil->fetch_assoc()) {
                        echo "
                            <tr>
                                <td>$data[id_kpj]</td>
                                <td>$data[nama]</td>
                                <td>$data[perusahaan]</td>
                                <td>$data[no_penetapan]</td>
                                <td>$data[waris]</td>
                                <td>$data[hubungan]</td>
                                <td>$data[nik]</td>
                                <td>$data[tgl_lahir]</td>
                                <td>$data[telepon]</td>
                                <td width='190' align='center'>
                                    <a class='btn btn-info btn-sm text-white view_data' id='$data[id_tkerja]'>Detail</a>
                                    <a class='btn btn-info btn-sm text-white edit_data' id='$data[id_tkerja]'>Edit</a>
                                    <a class='btn btn-danger btn-sm text-white del_data' id='$data[id_tkerja]'>Hapus</a>
                                </td>
                            </tr>
                        ";
                    }
                }
            ?>
        </tbody>
        </table>
        </div>
        <!-- /Daftar Tenaga Kerja -->
    </div>
        <!-- MODAL -->
        <?php 
        include 'modal/tkerja/modaldetail.php';
        include 'modal/tkerja/modaladd.php';
        ?>