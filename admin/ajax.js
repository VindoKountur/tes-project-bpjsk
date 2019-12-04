$(document).ready(function(){
    
    // Fungsi Search Data
    function fetch_data(searchKey,divId,dir){
        $.ajax({
            url:"ajax/"+dir,
            method:"POST",
            data:{searchKey:searchKey},
            success:function(data){
                $(divId).html(data);
            }
        });
    };

    // Search Data Tenaga Kerja
    $('#cariTK').keyup(function(){
        var cari = $(this).val();
        var divId = '#table-tenagaKerja';
        var dir = 'tkerja/data_tkerja.php';
        fetch_data(cari,divId, dir);
    });

    // Search Data Admin
    $('#cariAdmin').keyup(function(){
        var cariAdm = $(this).val();
        var divId = '#tabel-daftarAdmin';
        var dir = 'kel_admin/data_admin.php';
        fetch_data(cariAdm,divId, dir);
       
    });

    // Hapus Data Tenaga Kerja
    $(document).on('click', '.del_data', function(){
        var id_tkerja = $(this).attr("id");
        if (confirm("Ingin Menghapus Data Ini?")) {
            $.ajax({
                url:"ajax/delete.php",
                method:"POST",
                data:{id_tkerja:id_tkerja},
                dataType:"Text",
                success:function(data){
                    fetch_data('','#table-tenagaKerja','tkerja/data_tkerja.php');
                }
            });
        }
    });

    // Hapus Data Admin
    $(document).on('click', '.del_data_admin', function(){
        var id_admin = $(this).attr("id");
        if (confirm("Ingin Menghapus Data Ini?")) {
            $.ajax({
                url:"ajax/delete.php",
                method:"POST",
                data:{id_admin:id_admin},
                dataType:"Text",
                success:function(data){
                    fetch_data('','#tabel-daftarAdmin','kel_admin/data_admin.php');
                }
            });
        }
    });


    $('#add').click(function(){  
           $('#tambah').val("Tambah");  
           $('#formAdd')[0].reset();  
    });
    // Ubah Data Tenaga Kerja
    $(document).on('click', '.edit_data', function(){  
        var id_tkerja = $(this).attr("id");  
        $.ajax({  
            url:"ajax/fetch.php",  
            method:"POST",  
            data:{id_tkerja:id_tkerja},  
            dataType:"json",  
            success:function(data){
                $('#kpj').val(data.id_kpj);
                $('#nama_tk').val(data.nama);
                $('#nama_perusahaan').val(data.perusahaan);
                $('#no_penetapan').val(data.no_penetapan);
                $('#nama_ahli_waris').val(data.waris);
                $('#hubungan').val(data.hubungan);
                $('#nik').val(data.nik);
                $('#tanggal_lahir').val(data.tgl_lahir);
                $('#no_hp').val(data.telepon);  
                $('#id_tkerja').val(data.id_tkerja);  
                $('#tambah').val("Ubah");
                $('#addModal').modal('show');
            }  
        });  
    });  

    // Ubah Data Admin
    $(document).on('click', '.edit_data_admin', function(){  
        var id_admin = $(this).attr("id");  
        $.ajax({
            url:"ajax/fetch.php",  
            method:"POST",  
            data:{id_admin:id_admin},  
            dataType:"json",  
            success:function(data){
                $('#nama').val(data.nama);
                $('#username').val(data.username);
                $('#password').val(data.password);
                $('#id_admin').val(data.id_admin);  
                $('#tambah').val("Ubah");
                $('#addFormAdmin').modal('show');
            }  
        });  
    });  

    // Tambah Data Tenaga Kerja
    $('#formAdd').on("submit", function(event){
    event.preventDefault();
        $.ajax({  
            url:"ajax/tkerja/insert.php",
            method:"POST",
            data:$('#formAdd').serialize(),  
            beforeSend:function(){  
                $('#tambah').val("Menambah...");  
            },
            success:function(data){
                $('#formAdd')[0].reset();
                $('#addModal').modal('hide');
                $('#table-tenagaKerja').html(data);
            }  
        });
    });

  // Tambah Data Admin
  $('#formAddAdmin').on("submit", function(event){
    event.preventDefault();
    $.ajax({  
    url:"ajax/kel_admin/insert.php",
    method:"POST",
    data:$('#formAddAdmin').serialize(),  
    beforeSend:function(){  
        $('#tambah').val("Menambah...");  
    },  
    success:function(data){
        $('#formAddAdmin')[0].reset();
        $('#addFormAdmin').modal('hide');
        $('#tabel-daftarAdmin').html(data);
        
    }  
   });
  });




    // DETAIL Data Tenaga Kerja
    $(document).on('click', '.view_data', function(){
    var id_tkerja = $(this).attr("id");
    $.ajax({
    url:"ajax/select.php",
    method:"POST",
    data:{id_tkerja:id_tkerja},
    success:function(data){
    $('#detail_kpj').html(data);
    $('#detailModal').modal('show');
    }
    });
    });

}); 