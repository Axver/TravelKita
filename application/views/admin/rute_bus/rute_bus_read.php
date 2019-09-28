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
        <h2 style="margin-top:0px">Rute_bus Read</h2>
        <table class="table">
	    <tr><td>Id Armada</td><td><?php echo $id_armada; ?></td></tr>
	    <tr><td>Id Terminal</td><td><?php echo $id_terminal; ?></td></tr>
	    <tr><td>Terminal Bus Id Terminal</td><td><?php echo $terminal_bus_id_terminal; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
	    <tr><td>Waktu Berangkat</td><td><?php echo $waktu_berangkat; ?></td></tr>
	    <tr><td>Waktu Sampai</td><td><?php echo $waktu_sampai; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('rute_bus') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>