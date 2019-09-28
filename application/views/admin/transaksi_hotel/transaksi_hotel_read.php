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
        <h2 style="margin-top:0px">Transaksi_hotel Read</h2>
        <table class="table">
	    <tr><td>Check In</td><td><?php echo $check_in; ?></td></tr>
	    <tr><td>Check Out</td><td><?php echo $check_out; ?></td></tr>
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
	    <tr><td>Status Pembayaran</td><td><?php echo $status_pembayaran; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('transaksi_hotel') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>