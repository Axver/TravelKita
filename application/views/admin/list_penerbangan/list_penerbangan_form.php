<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">List_penerbangan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kode Pesawat <?php echo form_error('kode_pesawat') ?></label>
            <input type="text" class="form-control" name="kode_pesawat" id="kode_pesawat" placeholder="Kode Pesawat" value="<?php echo $kode_pesawat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Bandara Asal <?php echo form_error('id_bandara_asal') ?></label>
            <input type="text" class="form-control" name="id_bandara_asal" id="id_bandara_asal" placeholder="Id Bandara Asal" value="<?php echo $id_bandara_asal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Bandara Tujuan <?php echo form_error('id_bandara_tujuan') ?></label>
            <input type="text" class="form-control" name="id_bandara_tujuan" id="id_bandara_tujuan" placeholder="Id Bandara Tujuan" value="<?php echo $id_bandara_tujuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Waktu Take Off <?php echo form_error('waktu_take_off') ?></label>
            <input type="text" class="form-control" name="waktu_take_off" id="waktu_take_off" placeholder="Waktu Take Off" value="<?php echo $waktu_take_off; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Waktu Landing <?php echo form_error('waktu_landing') ?></label>
            <input type="text" class="form-control" name="waktu_landing" id="waktu_landing" placeholder="Waktu Landing" value="<?php echo $waktu_landing; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Harga <?php echo form_error('harga') ?></label>
            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
        </div>
	    <input type="hidden" name="id_list_penerbangan" value="<?php echo $id_list_penerbangan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('list_penerbangan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>