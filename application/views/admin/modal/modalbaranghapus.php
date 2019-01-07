<div class="row">
<?php
foreach ($results as $kolom) {

?>
            <div class="col-lg-6">
                    <div class="form-group col-lg-12">
                    <label>Kode Barang</label>
                    <input class="form-control" name="kodebarang" id="kodebarang" value="<?php echo $kolom['kodebarang'];?>">
                    <p class="help-block">Tuliskan kode barcode barang</p>
                    </div>
                    <div class="form-group col-lg-12">
                    <label>Nama Barang</label>
                    <input class="form-control" name="namabarang" id="namabarang" value="<?php echo $kolom['namabarang'];?>">
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
                    <input class="form-control" name="hargabeli" id="hargabeli" value="<?php echo $kolom['hargabeli'];?>">
                    <p class="help-block">Masukan angka (0-9)</p>
                    </div>
                    <div class="form-group col-lg-9">
                    <label>Harga Jual</label>
                    <input class="form-control" name="hargajual" id="hargajual" value="<?php echo $kolom['hargajual'];?>">
                    <p class="help-block">Masukan angka (0-9)</p>
                    </div>
                    <div class="form-group col-lg-6">
                    <label>Stok</label>
                    <input class="form-control" name="stok" id="stok" value="<?php echo $kolom['stok'];?>">
                    <p class="help-block">Masukan angka (0-9)</p>
                    </div>
            </div> 
<?php 
}
?>           
</div>