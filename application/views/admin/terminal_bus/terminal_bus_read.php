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
        <h2 style="margin-top:0px">Terminal_bus Read</h2>
        <table class="table">
	    <tr><td>Nama Terminal</td><td><?php echo $nama_terminal; ?></td></tr>
	    <tr><td>Latitude</td><td><?php echo $latitude; ?></td></tr>
	    <tr><td>Longitude</td><td><?php echo $longitude; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('terminal_bus') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>