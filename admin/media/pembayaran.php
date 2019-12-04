<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <label for="nokpj">Masukkan Nomor KPJ untuk pembayaran</label>
            <input type="text" name="kpj" id="nokpj" class="form-control" placeholder="No KPJ" maxlength="11">
        </div>
    </div>
    <div class="container mt-4 pb-4" id="mod-pembayaran">
        
    </div>

    
</div>
<script>
$(document).ready(function(){
    $('#nokpj').keyup(function(){
        var nokpj = $("#nokpj").val().replace(/ /g,'');
        if (nokpj.length == 11) {
            $.ajax({
                url:"ajax/pembayaran/form_pembayaran.php",
                method:"POST",
                data:{nokpj:nokpj},
                success:function(data){
                    $('#mod-pembayaran').html(data);
                } 
        });  
        }
    });

    // Tambah Data Pembayaran
    $(document).on('click', '#submit-pembayaran', function(){
    event.preventDefault();
        $.ajax({  
            url:"ajax/pembayaran/data_pembayaran.php",
            method:"POST",
            data:$('#form-pembayaran').serialize(),  
            beforeSend:function(){  
                $('#submit-pembayaran').val("Menambah...");  
            },  
            success:function(data){
                $('#mod-pembayaran').html(data);
            }  
        });
    });
});
</script>