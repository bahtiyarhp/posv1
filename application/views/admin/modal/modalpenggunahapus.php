
<?php 

//echo $ursername;
foreach ($results as $kolom) {


?>
<div class="row">
<div class="col-lg-12">
    <?php echo "<h4>Apakah anda yakin menghapus pengguna : ".$kolom['username']."</h4>";?>
    <input type="hidden" name="username" class="form-control " value="<?php echo $kolom['username'];?>">
</div>
</div>
<?php } ?>
