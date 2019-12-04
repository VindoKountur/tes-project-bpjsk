<div class="card">
  <div class="card-header bg-primary text-white"><h3>Kelola Daftar Admin</h3></div>
  <div class="card-body">
  <div class="row">
    <div class="col"><button class="btn btn-primary" data-toggle="modal" data-target="#addFormAdmin" id="addModalforadmin">Tambah Admin</button></div>
    <div class="col"><input type="text" name="cariAdmin" id="cariAdmin" class="form-control" placeholder="Cari..."></div>
    
  </div>
  <div id="tabel-daftarAdmin" class="table-responsive mt-3">
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
    <?php 
        $no = 1;
        $sql = "SELECT * FROM admin";
        $hasil = $db->query($sql);
        if ($hasil->num_rows == 0) {
            echo "
                <tr><td colspan='5' align='center'>No Data</td></tr>
            ";
        }else{
            echo "";
            while ($row = $hasil->fetch_assoc()) {
                echo "
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
        ?>
    </table>
    </div>
  </div>
</div>
<?php 
    include 'modal/kel_admin/modalformadmin.php';
?>