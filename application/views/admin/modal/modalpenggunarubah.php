
<?php 

//echo $ursername;
foreach ($results as $kolom) {
?>
        <div class="row">
            <div class="col-lg-6">
                    <div class="form-group col-lg-9">
                        <label>Username</label>
                        <input name="username" class="form-control " value="<?php echo $kolom['username'];?>">
                        <p class="help-block">Tuliskan username</p>
                    </div>
                    <div class="form-group col-lg-7">
                        <label>Password</label>
                        <input name="password" class="form-control" value="<?php echo $kolom['password'];?>">
                        <p class="help-block">Tuliskan password</p>
                    </div>
            </div>
            <div class="col-lg-6">
                    <div class="form-group col-lg-12">
                        <label>Alias</label>
                        <input name="alias" class="form-control" value="<?php echo $kolom['alias'];?>">
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
<?php } ?>
