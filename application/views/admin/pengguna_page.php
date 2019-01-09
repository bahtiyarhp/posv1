
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><p class="fa fa-users"></p> Manajamen Pengguna</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"></i> Tambah Pengguna</button>
                </div>
            </div>
            <!-- /.row -->
            <br>
            <div class="row">
                <div class="col-lg-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manajemen Pengguna Aplikasi
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-pengguna">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Alias</th>
                                        <th>Hak Akses</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($datapengguna as $kolom) {
                                ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $kolom['username'];?></td>
                                        <td><?php echo $kolom['alias'];?></td>
                                        <td><?php echo $kolom['hak'];?></td>
                                        <td>
                                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modalUbah" name="ubah" id="ubah" data-id="<?php echo $kolom['username'];?>"><span class="glyphicon glyphicon-edit"></span></button>        
                                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modalHapus" name="hapus" id="hapus" data-id="<?php echo $kolom['username'];?>"><span class="glyphicon glyphicon-trash"></span></button>
                                        </td>
                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->


<!-- Modal -->

<div id="modalTambah" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <?php
    echo form_open('pengguna/tambahpengguna', 'class="myform" id="myform"');
    ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Input Pengguna Baru</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-lg-6">
                    <div class="form-group col-lg-9">
                        <label>Username</label>
                        <input name="username" class="form-control ">
                        <p class="help-block">Tuliskan username</p>
                    </div>
                    <div class="form-group col-lg-7">
                        <label>Password</label>
                        <input name="password" class="form-control">
                        <p class="help-block">Tuliskan password</p>
                    </div>
            </div>
            <div class="col-lg-6">
                    <div class="form-group col-lg-12">
                        <label>Alias</label>
                        <input name="alias" class="form-control">
                        <p class="help-block">Masukan nama asli</p>
                    </div>
                    <div class="form-group col-lg-9">
                        <label>Hak Akses</label>
                        <select name="hak" class="form-control" id="sel1">
                            <option value="admin">Admin</option>
                            <option value="pengguna">Pengguna</option>
                        </select>
                        <p class="help-block">Pilih salah satu</p>
                    </div> 
            </div>    
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-default" >Simpan</button>
      </div>
    </div>
    <?php
    echo form_close();
    ?>
  </div>
</div>



<div id="modalHapus" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <?php
    echo form_open('pengguna/hapuspengguna', 'class="myform" id="myform"');
    ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus data pengguna</h4>
      </div>
      <div class="modal-body">
      <div class="datadetail" id="datadetail"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-default" >Hapus Data</button>
      </div>
    </div>
    <?php
    echo form_close();
    ?>
  </div>
</div>


<div id="modalUbah" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <?php
    echo form_open('pengguna/ubahpengguna', 'class="myform" id="myform"');
    ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Rubah Data Pengguna</h4>
      </div>
      <div class="modal-body">
      <div class="datadetail" id="datadetail"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-default" >Ubah Data</button>
      </div>
    </div>
    <?php
    echo form_close();
    ?>
  </div>
</div>



<!-- DataTables JavaScript -->
<script src="<?php echo base_url('assets/sbadmin/vendor/datatables/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/sbadmin/vendor/datatables-plugins/dataTables.bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/sbadmin/vendor/datatables-responsive/dataTables.responsive.js');?>"></script>

 <!-- jQuery -->
 <script src="<?php echo base_url('assets/sbadmin/vendor/jquery/jquery.min.js');?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('assets/sbadmin/vendor/bootstrap/js/bootstrap.min.js');?>"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url('assets/sbadmin/vendor/metisMenu/metisMenu.min.js');?>"></script>


<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url('assets/sbadmin/dist/js/sb-admin-2.js');?>"></script>



<script type="text/javascript">
$(document).ready(function(){
    $('#modalHapus').on('show.bs.modal', function (e) {
        var username = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'post',
            url : "<?php echo site_url('pengguna/selectpengguna2');?>",
            data :  'username='+ username,
            success : function(data){
            $('.datadetail').html(data);//menampilkan data ke dalam modal
            }
        });
    });
});

$(document).ready(function(){
    $('#modalUbah').on('show.bs.modal', function (e) {
        var username = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'post',
            url : "<?php echo site_url('pengguna/selectpengguna');?>",
            data :  'username='+ username,
            success : function(data){
            $('.datadetail').html(data);//menampilkan data ke dalam modal
            }
        });
    });
});
</script>

<script>
    $(document).ready(function() {
        $('#dataTables-pengguna').DataTable({
            deferRender: true,
            responsive: true,
            "ordering": false,
            columnDefs: [
            { width: 40, targets: 0 },
            { width: 90, targets: 1 },
            { width: 40, targets: 3 }
             ],
            fixedColumns: true
        });
    });
</script>

</body>
</html>