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
        <h2 style="margin-top:0px">Transaksi_hotel <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="date">Check In <?php echo form_error('check_in') ?></label>
            <input type="text" class="form-control" name="check_in" id="check_in" placeholder="Check In" value="<?php echo $check_in; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Check Out <?php echo form_error('check_out') ?></label>
            <input type="text" class="form-control" name="check_out" id="check_out" placeholder="Check Out" value="<?php echo $check_out; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status Pembayaran <?php echo form_error('status_pembayaran') ?></label>
            <input type="text" class="form-control" name="status_pembayaran" id="status_pembayaran" placeholder="Status Pembayaran" value="<?php echo $status_pembayaran; ?>" />
        </div>
	    <input type="hidden" name="id_transaksi_hotel" value="<?php echo $id_transaksi_hotel; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('transaksi_hotel') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>