<?php 
    include '../koneksi.php';
 if(isset($_POST["id_tkerja"]))  
 {  
     $id = $_POST['id_tkerja'];
     $output = '';  
     $sql = "SELECT * FROM tkerja WHERE id_tkerja = '$id'";  
     $hasil = $db->query($sql);
     $output .= '  
     <div class="table-responsive">  
          <table class="table table-bordered">';  
     while($row = $hasil->fetch_assoc())  
     {  
          $output .= "  
               <tr>  
                    <td width='30%'><label>KPJ</label></td>  
                    <td width='70%'>$row[id_kpj]</td>  
               </tr>
               <tr>  
                    <td width='30%'><label>Nama Tenaga Kerja</label></td>  
                    <td width='70%'>$row[nama]</td>  
               </tr>
               <tr>
                    <td width='30%'><label>Perusahaan</label></td>  
                    <td width='70%'>$row[perusahaan]</td>  
               </tr>
               <tr>
                    <td width='30%'><label>No Penetapan</label></td>  
                    <td width='70%'>$row[no_penetapan]</td>  
               </tr>
               <tr>
                    <td width='30%'><label>Ahli Waris</label></td>  
                    <td width='70%'>$row[waris]</td>  
               </tr>
               <tr>
                    <td width='30%'><label>Hubungan</label></td>  
                    <td width='70%'>$row[hubungan]</td>  
               </tr>
               <tr>
                    <td width='30%'><label>NIK</label></td>  
                    <td width='70%'>$row[nik]</td>  
               </tr>
               <tr>
                    <td width='30%'><label>Tanggal Lahir</label></td>  
                    <td width='70%'>$row[tgl_lahir]</td>  
               </tr>
               <tr>
                    <td width='30%'><label>Telepon</label></td>  
                    <td width='70%'>$row[telepon]</td>  
               </tr>
               ";  
     }  
     $output .= "</table></div>";
     echo $output;
 }  
 ?>