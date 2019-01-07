<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>POS | Point Of Sales</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/sbadmin/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('assets/sbadmin/vendor/metisMenu/metisMenu.min.css');?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/sbadmin/dist/css/sb-admin-2.css');?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/sbadmin/vendor/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">

 <!-- DataTables CSS -->
 <link href="<?php echo base_url('assets/sbadmin/vendor/datatables-plugins/dataTables.bootstrap.css');?>" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="<?php echo base_url('assets/vendor/datatables-responsive/dataTables.responsive.css');?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js"></script>
  <script type="text/javascript">
$(function(){
    $("#namabarang").autocomplete({
            source: "<?php echo site_url('pos/selectbarang');?>",
            minLength: 2,
            select: function (event, ui) {
            $("input#idbarang").val(ui.item.id);
            $("input#hargabarang").val(ui.item.harga);
             // display the selected text
            
    }
        });
    });
</script>
    <style>                                                                         
            .box{
                width: 500px;
                margin: auto;
                margin-top: 50px;
            }
            .ui-autocomplete {
                position: absolute;
                z-index: 1000;
                cursor: default;
                padding: 0;
                margin-top: 2px;
                list-style: none;
                background-color: #ffffff;
                border: 1px solid #ccc;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            }
            .ui-autocomplete > li {
                padding: 3px 10px;
            }
            .ui-autocomplete > li.ui-state-focus {
                background-color: #3399FF;
                color:#ffffff;
            }
            .ui-helper-hidden-accessible {
                display: none;
            }
        </style>


 



</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">POS | Poin Of Sales</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li id="time"></li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('logout')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-->
       
        </nav>
        <br>

        <div class="row ">
            <div class="col-lg-2 "></div>
            
            <div class="col-lg-8 ">
                <div class="panel panel-default">
                    <div class="panel-heading">NOTA PENJUALAN</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <form class="form-horizontal" action="/action_page.php">
                                    <div class="form-group">
                                    <fieldset disabled>
                                        <label class="control-label col-sm-2" for="total">No Nota: </label>
                                        <div class="col-sm-4">
                                        <input type="text" class="form-control nonota"   id="nonota" value="<?php echo $nonota?>">
                                        </div>
                                    </fieldset>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="bayar">Tanggal: </label>
                                        <div class="col-sm-4"> 
                                        <input type="date" class="form-control" id="bayar" value="<?php echo date("Y-m-d");?>">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4"><h1 class="text-right">Hi.. Casier 1</h1></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                            <?php 
                            $attributes = array('class' => 'myform', 'id' => 'myform');
                            echo form_open('pos/tambahbarang', $attributes);
                            ?>
                            <input type="hidden" class="form-control text-right" id="idbarang" name="idbarang" >
                            <input type="hidden" class="form-control text-right" id="hargabarang" name="hargabarang" >
                            <input type="hidden" class="form-control text-right" id="nonota" name="nonota" value="<?php echo $nonota?>" >
                                <div class="form-group col-lg-7 col-xs-offset-0 ">
                                    <input type="text" class="form-control col-lg-12" id="namabarang" name="namabarang" placeholder="Tambah Barang" >
                                </div>
                                <div class="form-group col-lg-2 ">
                                    <input type="text" class="form-control text-right" id="kuantitas" name="kuantitas" value="1">
                                </div>
                                <div class="form-group col-lg-3 text-right">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Barang</button>
                                </div>
                                 <?php echo form_close();?>
                            
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-transaksi">
                                    <thead>
                                        <tr>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Harga Barang</th>
                                            <th>Kuantitas</th>
                                            <th>Satuan</th> 
                                            <th>Total</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sumtotal = 0;
                                        foreach ($detailtransaksi as $kolom) {
         
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $kolom['kodebarang']?></td>
                                            <td><?php echo $kolom['namabarang']?></td>
                                            <td class="right"><?php echo $kolom['hargajual']?></td>
                                            <td class="right"><?php echo $kolom['tmp_qty']?></td>
                                            <td class="right"><?php echo $kolom['satuan']?></td>
                                            <?php $total = $kolom['hargajual']*$kolom['tmp_qty'];?>
                                            <td class="right"><?php echo $total;?></td>
                                            <?php 
                                            $attributes = array('class' => 'myform', 'id' => 'myform');
                                            echo form_open('pos/hapusbarangwhere', $attributes);
                                            ?>
                                            <input type="hidden" class="form-control text-right" id="kodebarang" name="kodebarang" value="<?php echo $kolom['kodebarang'];?>">
                                            <td><button type="submit" class="btn btn-xs btn-danger text-center"><i class="glyphicon glyphicon-trash"></i></button></td>
                                            <?php echo form_close();?>
                                        </tr>
                                        <?php
                                        $sumtotal =$sumtotal+$total;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>    
                        </div>
                        
                        <br>
                        
                        <?php 
                        $attributes = array('class' => 'myform', 'id' => 'myform');
                        echo form_open('pos/tambahtransaksi', $attributes); 
                        ?>
                        <div class="row">             
                                <div class="col-lg-3">
                                <div class="form-group">
                                        <div class="col-sm-12">
                                       
                                        <input type="text" class="form-control input-lg"  name="total1" onkeyup="sum();" id="total1" placeholder="Total" value="<?php echo $sumtotal;?>">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                <div class="form-group">
                                        <div class="col-sm-12"> 
                                        <input type="text" class="form-control input-lg"  name="bayar1" onkeyup="sum();" id="bayar1" placeholder="Bayar">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                       
                                        <input type="text" class="form-control input-lg" name="kembali1" id="kembali1" placeholder="Kembali" disable>
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 text-right">
                                <input type="hidden" class="form-control text-right" id="nonota1" name="nonota1" value="<?php echo $nonota?>" >
                                <input type="hidden" class="form-control text-right" id="tanggal1" name="tanggal1" value="<?php echo date("Y-m-d");?>" >
                                <button type="submit" class="btn btn-primary text-right btn-lg">Bayar</button>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                        <?php echo form_close();?>
                    
                    
                    </div>
            
            </div>
        </div>
                
                    <!-- /.panel-heading -->
                    
 
                
            <!-- /.row -->
    </div>


     <!-- /#wrapper -->

    <!-- jQuery -->


    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/sbadmin/vendor/bootstrap/js/bootstrap.min.js');?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/sbadmin/vendor/metisMenu/metisMenu.min.js');?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/sbadmin/dist/js/sb-admin-2.js');?>"></script>

    <!-- DataTables JavaScript -->
<script src="<?php echo base_url('assets/sbadmin/vendor/datatables/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/sbadmin/vendor/datatables-plugins/dataTables.bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/sbadmin/vendor/datatables-responsive/dataTables.responsive.js');?>"></script>

    <script type="text/javascript">
    var timestamp = '<h3><?=time();?></h3>';
    function updateTime(){
    $('#time').html(Date(timestamp));
    timestamp++;
    }
    $(function(){
    setInterval(updateTime, 1000);
    });
    </script>


    <script type="text/javascript">
        function sum() {
            var txtFirstNumberValue = document.getElementById('total1').value;
            var txtSecondNumberValue = document.getElementById('bayar1').value;
            var result = parseFloat(txtSecondNumberValue) - parseFloat(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('kembali1').value = result;
            }
        }
    </script>

<script>
    $(document).ready(function() {
        $('#dataTables-transaksi').DataTable({
            deferRender: true,
            responsive: true,
            "ordering": false,
            columnDefs: [
            { width: 15, targets: 5 }
             ],
        });
    });
</script>




</body>

</html>