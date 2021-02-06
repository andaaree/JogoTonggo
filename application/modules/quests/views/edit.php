

<!-- Modal Ubah -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Ubah Data</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('admin/ubah')?>" method="post" enctype="multipart/form-data" role="form">
             <div class="modal-body">
                     <div class="form-group">
                         <label class="col-lg-2 col-sm-2 control-label">Nama</label>
                         <div class="col-lg-10">
                          <input type="hidden" id="id" name="id">
                             <input type="text" class="form-control" id="nama" name="nama" placeholder="Tuliskan Nama">
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="col-lg-2 col-sm-2 control-label">Alamat</label>
                         <div class="col-lg-10">
                          <textarea class="form-control" id="alamat" name="alamat" placeholder="Tuliskan Alamat"></textarea>
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="col-lg-2 col-sm-2 control-label">Pekerjaan</label>
                         <div class="col-lg-10">
                             <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Tuliskan Pekerjaan">
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                     <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                 </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END Modal Ubah -->