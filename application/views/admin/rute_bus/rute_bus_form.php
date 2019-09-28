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
        <h2 style="margin-top:0px">Rute_bus <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Armada <?php echo form_error('id_armada') ?></label>
            <input type="text" class="form-control" name="id_armada" id="id_armada" placeholder="Id Armada" value="<?php echo $id_armada; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Terminal <?php echo form_error('id_terminal') ?></label>
            <input type="text" class="form-control" name="id_terminal" id="id_terminal" placeholder="Id Terminal" value="<?php echo $id_terminal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Terminal Bus Id Terminal <?php echo form_error('terminal_bus_id_terminal') ?></label>
            <input type="text" class="form-control" name="terminal_bus_id_terminal" id="terminal_bus_id_terminal" placeholder="Terminal Bus Id Terminal" value="<?php echo $terminal_bus_id_terminal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Harga <?php echo form_error('harga') ?></label>
            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Waktu Berangkat <?php echo form_error('waktu_berangkat') ?></label>
            <input type="text" class="form-control" name="waktu_berangkat" id="waktu_berangkat" placeholder="Waktu Berangkat" value="<?php echo $waktu_berangkat; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Waktu Sampai <?php echo form_error('waktu_sampai') ?></label>
            <input type="text" class="form-control" name="waktu_sampai" id="waktu_sampai" placeholder="Waktu Sampai" value="<?php echo $waktu_sampai; ?>" />
        </div>
	    <input type="hidden" name="id_rute_bus" value="<?php echo $id_rute_bus; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('rute_bus') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>