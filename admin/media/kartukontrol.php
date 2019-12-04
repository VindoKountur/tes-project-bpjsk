<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <label for="nokpj">NO KPJ Kartu Kontrol</label>
            <input type="text" name="kpj" id="nokpj" class="form-control" placeholder="No KPJ" maxlength="11">
        </div>
    </div>
    <div class="container mt-2 pb-4" id="mod-kartu">
        
    </div>

    
</div>
<script>
$(document).ready(function(){
    $('#nokpj').keyup(function(){
        var nokpj = $("#nokpj").val().replace(/ /g,'');
        if (nokpj.length == 11) {
            $.ajax({
                url:"ajax/kartu/kartu.php",
                method:"POST",
                data:{nokpj:nokpj},
                success:function(data){
                    $('#mod-kartu').html(data);
                } 
        });  
        }
    });

});
</script>