
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><p class="fa fa-signal"></p> Statistik Penjualan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                <?php 
                        $attributes = array('class' => 'form-inline', 'id' => 'myform');
                        echo form_open('transaksi/gettransaksi', $attributes);
                    ?>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nomorinv" name="nomorinv" placeholder="Masukkan No Invoice">
                    </div>
                    <button type="submit" class="btn btn-default" name="submit" id="submit">Lihat Detail</button>
                    <?php 
                        echo form_close();
                    ?>
                </div>
            </div>
            <br>
            <?php
                if (isset($_POST['submit'])) {
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Detail Transaksi
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <?php 
                            foreach ($inventori as $row) {
                                
                        ?>    
                            <table>
                                <tr>
                                    <td><h4>NO Invoice</h4></td>
                                    <td><h4>: <?php echo $row['nonota'];?></h4></td>
                                </tr>
                                <tr>
                                    <td><h4>Tanggal</h4></td>
                                    <td><h4> <?php echo $row['tanggal'];?></h4></td>
                                </tr>
                            </table>
                            <br>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Satuan</th>
                                        <th>Kuantitas</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($detailinventori as $kolom) {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $kolom['kodebarang'];?></td>
                                        <td><?php echo $kolom['namabarang'];?></td>
                                        <td><?php echo $kolom['hargajual'];?></td>
                                        <td><?php echo $kolom['satuan'];?></td>
                                        <td class="center"><?php echo $kolom['qty'];?></td>
                                        <td class="center"><?php echo $kolom['total'];?></td>
                                    </tr>
                                   <?php
                                        }
                                   ?>
                                </tbody>
                            </table>

                            <br>
                            <table>
                                <tr>
                                    <td><h4>Total</h4></td>
                                    <td><h4>: <?php echo $row['totalpembelian'];?></h4></td>
                                </tr>
                                <tr>
                                    <td><h4>Bayar</h4></td>
                                    <td><h4>: <?php echo $row['bayar'];?></h4></td>
                                </tr>
                                <tr>
                                    <td><h4>Kembali</h4></td>
                                    <td><h4>: <?php echo $row['kembali'];?></h4></td>
                                </tr>
                            </table>
                            <!-- /.table-responsive -->

                            <?php 
                            } 
                            ?>  
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php
                }
            ?>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

