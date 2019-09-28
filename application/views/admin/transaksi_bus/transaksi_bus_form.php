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
        <h2 style="margin-top:0px">Transaksi_bus <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status Transaksi <?php echo form_error('status_transaksi') ?></label>
            <input type="text" class="form-control" name="status_transaksi" id="status_transaksi" placeholder="Status Transaksi" value="<?php echo $status_transaksi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status Pembayaran <?php echo form_error('status_pembayaran') ?></label>
            <input type="text" class="form-control" name="status_pembayaran" id="status_pembayaran" placeholder="Status Pembayaran" value="<?php echo $status_pembayaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status Bus <?php echo form_error('status_bus') ?></label>
            <input type="text" class="form-control" name="status_bus" id="status_bus" placeholder="Status Bus" value="<?php echo $status_bus; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Rute Bus <?php echo form_error('id_rute_bus') ?></label>
            <input type="text" class="form-control" name="id_rute_bus" id="id_rute_bus" placeholder="Id Rute Bus" value="<?php echo $id_rute_bus; ?>" />
        </div>
	    <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('transaksi_bus') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>