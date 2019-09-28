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
        <h2 style="margin-top:0px">List_penerbangan Read</h2>
        <table class="table">
	    <tr><td>Kode Pesawat</td><td><?php echo $kode_pesawat; ?></td></tr>
	    <tr><td>Id Bandara Asal</td><td><?php echo $id_bandara_asal; ?></td></tr>
	    <tr><td>Id Bandara Tujuan</td><td><?php echo $id_bandara_tujuan; ?></td></tr>
	    <tr><td>Waktu Take Off</td><td><?php echo $waktu_take_off; ?></td></tr>
	    <tr><td>Waktu Landing</td><td><?php echo $waktu_landing; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('list_penerbangan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>