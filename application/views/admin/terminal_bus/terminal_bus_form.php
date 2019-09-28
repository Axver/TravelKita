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
        <h2 style="margin-top:0px">Terminal_bus <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Terminal <?php echo form_error('nama_terminal') ?></label>
            <input type="text" class="form-control" name="nama_terminal" id="nama_terminal" placeholder="Nama Terminal" value="<?php echo $nama_terminal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Latitude <?php echo form_error('latitude') ?></label>
            <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude" value="<?php echo $latitude; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Longitude <?php echo form_error('longitude') ?></label>
            <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude" value="<?php echo $longitude; ?>" />
        </div>
	    <input type="hidden" name="id_terminal" value="<?php echo $id_terminal; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('terminal_bus') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>