
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-briefcase"></i> Manajemen Barang</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"></i> Tambah Barang</button>
                </div>
            </div>
            <!-- /.row -->
            <br>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-11">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manajemen Data Barang
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Satuan</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($databarang as $kolom) {
                                ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $kolom['kodebarang'];?></td>
                                        <td><?php echo $kolom['namabarang'];?></td>
                                        <td><?php echo $kolom['satuan'];?></td>
                                        <td class="center"><?php echo $kolom['hargabeli'];?></td>
                                        <td class="center"><?php echo $kolom['hargajual'];?></td>
                                        <?php
                                        $var ="";
                                        if ($kolom['stok']<1000) {
                                            $var='<td class="center text-danger">';
                                        }else if($kolom['stok']>=1000 && $kolom['stok']<=2000){
                                            $var ='<td class="center text-warning">';    
                                        }else{
                                            $var ='<td class="center text-success">';
                                        }
                                        echo $var;
                                        echo $kolom['stok'];?></td>
                                        <td>
                                        <button type="button" name="ubah" id="ubah" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modalUbah" data-id="<?php echo $kolom['kodebarang'];?>"><span class="glyphicon glyphicon-edit"></span></button>
                                        <button type="button" name="hapus" id="hapus" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalHapus" data-id="<?php echo $kolom['kodebarang'];?>"><span class="glyphicon glyphicon-trash"></span>
</button>
                                        </td>
                                    </tr>
                                <?php } ?>
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

</div>
    <!-- /#wrapper -->

<!-- Modal -->
<div id="modalTambah" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <?php
    echo form_open('barang/tambahbarang', 'class="myform" id="myform"');
    ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Input Data Barang Baru</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-lg-6">
                    <div class="form-group col-lg-12">
                    <label>Kode Barang</label>
                    <input class="form-control" name="kodebarang" id="kodebarang">
                    <p class="help-block">Tuliskan kode barcode barang</p>
                    </div>
                    <div class="form-group col-lg-12">
                    <label>Nama Barang</label>
                    <input class="form-control" name="namabarang" id="namabarang">
                    <p class="help-block">Tuliskan nama barang</p>
                    </div>
                    <div class="form-group col-lg-6">
                    <label>Satuan</label>
                    <select class="form-control" id="sel2" name="satuan" id="satuan">
                        <option value="pcs">pcs</option>
                        <option value="box">box</option>
                        <option value="item">item</option>
                        <option value="kardus">kardus</option>
                    </select>
                    <p class="help-block">Pilih salah satu</p>
                    </div>
            </div>
            <div class="col-lg-6">
                    <div class="form-group col-lg-9">
                    <label>Harga Beli</label>
                    <input class="form-control" name="hargabeli" id="hargabeli">
                    <p class="help-block">Masukan angka (0-9)</p>
                    </div>
                    <div class="form-group col-lg-9">
                    <label>Harga Jual</label>
                    <input class="form-control" name="hargajual" id="hargajual">
                    <p class="help-block">Masukan angka (0-9)</p>
                    </div>
                    <div class="form-group col-lg-6">
                    <label>Stok</label>
                    <input class="form-control" name="stok" id="stok">
                    <p class="help-block">Masukan angka (0-9)</p>
                    </div>
            </div>    
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-default">Simpan</button>
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
    echo form_open('barang/ubahbarang', 'class="myform" id="myform"');
    ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah data barang</h4>
      </div>
      <div class="modal-body">
      <div class="datadetail"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-default">Ubah</button>
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
    echo form_open('barang/hapusbarang', 'class="myform" id="myform"');
    ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus Data Barang</h4>
      </div>
      <div class="modal-body">
      <div class="datadetail"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-default">Hapus</button>
      </div>
    </div>
    <?php
    echo form_close();
    ?>
  </div>
</div>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/sbadmin/vendor/jquery/jquery.min.js');?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/sbadmin/vendor/bootstrap/js/bootstrap.min.js');?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/sbadmin/vendor/metisMenu/metisMenu.min.js');?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('assets/sbadmin/vendor/raphael/raphael.min.js');?>"></script>
    <script src="<?php echo base_url('assets/sbadmin/vendor/morrisjs/morris.min.js');?>"></script>
    <script src="<?php echo base_url('assets/sbadmin/data/morris-data.js');?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/sbadmin/dist/js/sb-admin-2.js');?>"></script>

    <script src="<?php echo base_url('assets/sbadmin/vendor/datatables/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo base_url('assets/sbadmin/vendor/datatables-plugins/dataTables.bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/sbadmin/vendor/datatables-responsive/dataTables.responsive.js');?>"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            deferRender: true,
            responsive: true,
            "ordering": false,
            columnDefs: [
            { width: 40, targets: 6 },
            { width: 90, targets: 0 },
            { width: 30, targets: 2 },
            { width: 80, targets: 3 },
            { width: 80, targets: 4 },
            { width: 25, targets: 5 },
             ],
            fixedColumns: true
        });
    });
</script>


<script type="text/javascript">
$(document).ready(function(){
    $('#modalHapus').on('show.bs.modal', function (e) {
        var kodebarang = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'post',
            url : "<?php echo site_url('barang/selectbarang2');?>",
            data :  'kodebarang='+ kodebarang,
            success : function(data){
            $('.datadetail').html(data);//menampilkan data ke dalam modal
            }
        });
    });
});

$(document).ready(function(){
    $('#modalUbah').on('show.bs.modal', function (e) {
        var kodebarang = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'post',
            url : "<?php echo site_url('barang/selectbarang');?>",
            data :  'kodebarang='+ kodebarang,
            success : function(data){
            $('.datadetail').html(data);//menampilkan data ke dalam modal
            }
        });
    });
});
</script>

</body>

</html>