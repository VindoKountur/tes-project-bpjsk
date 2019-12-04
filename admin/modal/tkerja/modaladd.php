        <!-- Modal ADD -->
        <div class="modal" id="addModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Tenaga Kerja</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" id="formAdd">
                    <div class="row">
                        <div class="col-md-3 ml-auto"><label for="kpj">KPJ</label></div>
                        <div class="col-md-9 ml-auto"><input type="text" class="form-control form-control-sm" id="kpj" name="kpj"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-3 ml-auto"><label for="nama_tk">Nama Tenaga Kerja</label></div>
                        <div class="col-md-9 ml-auto"><input type="text" class="form-control form-control-sm" id="nama_tk" name="nama_tk"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-3 ml-auto"><label for="nama_perusahaan">Nama Perusahaan</label></div>
                        <div class="col-md-9 ml-auto"><input type="text" class="form-control form-control-sm" id="nama_perusahaan" name="nama_perusahaan"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-3 ml-auto"><label for="no_penetapan">No Penetapan</label></div>
                        <div class="col-md-9 ml-auto"><input type="text" class="form-control form-control-sm" id="no_penetapan" name="no_penetapan"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-3 ml-auto"><label for="nama_ahli_waris">Nama Ahli Waris</label></div>
                        <div class="col-md-9 ml-auto"><input type="text" class="form-control form-control-sm" id="nama_ahli_waris" name="nama_ahli_waris"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-3 ml-auto"><label for="hubungan">Hubungan</label></div>
                        <div class="col-md-9 ml-auto"><input type="text" class="form-control form-control-sm" id="hubungan" name="hubungan"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-3 ml-auto"><label for="nik">NIK</label></div>
                        <div class="col-md-9 ml-auto"><input type="text" class="form-control form-control-sm" id="nik" name="nik"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-3 ml-auto"><label for="tanggal_lahir">Tanggal Lahir</label></div>
                        <div class="col-md-9 ml-auto"><input type="date" class="form-control form-control-sm" id="tanggal_lahir" name="tanggal_lahir"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-3 ml-auto"><label for="no_hp">Telepon</label></div>
                        <div class="col-md-9 ml-auto"><input type="text" class="form-control form-control-sm" id="no_hp" name="no_hp"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12 ml-auto"><input type="submit" class="btn btn-info btn-block" id="tambah" value="Tambah"></div>
                    </div>
                    <input type="hidden" name="id_tkerja" id="id_tkerja" value="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

                </div>
            </div>
        </div>
        <!-- /MODAL ADD -->