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
        <h2 style="margin-top:0px">Pesawat <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Maskapai <?php echo form_error('id_maskapai') ?></label>
            <input type="text" class="form-control" name="id_maskapai" id="id_maskapai" placeholder="Id Maskapai" value="<?php echo $id_maskapai; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kapasitas <?php echo form_error('kapasitas') ?></label>
            <input type="text" class="form-control" name="kapasitas" id="kapasitas" placeholder="Kapasitas" value="<?php echo $kapasitas; ?>" />
        </div>
	    <input type="hidden" name="kode_pesawat" value="<?php echo $kode_pesawat; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pesawat') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>