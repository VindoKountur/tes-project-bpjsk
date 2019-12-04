<!-- Modal ADD -->
<div class="modal" id="addFormAdmin">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Data Admin</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form method="post" id="formAddAdmin">
            
                <label for="nama">Nama</label>
                <input type="text" class="form-control form-control-sm" id="nama" name="nama">
            
            
                <label for="username">Username</label>
                <input type="text" class="form-control form-control-sm" id="username" name="username">
           
            
               <label for="password">Password</label>
                <input type="password" class="form-control form-control-sm" id="password" name="password">
            
            
               <label for="konfPass">Konfirmasi Password</label>
                <input type="password" class="form-control form-control-sm" id="konfPass" name="konfPass">
            
            
                <input type="submit" class="btn btn-info btn-block mt-3" id="tambah" value="Tambah">
            
            <input type="hidden" name="id_admin" id="id_admin" value="">
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
<!-- /MODAL ADD -->