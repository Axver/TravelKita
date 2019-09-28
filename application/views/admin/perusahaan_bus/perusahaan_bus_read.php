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
        <h2 style="margin-top:0px">Perusahaan_bus Read</h2>
        <table class="table">
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
	    <tr><td>Nama Perusahaan</td><td><?php echo $nama_perusahaan; ?></td></tr>
	    <tr><td>Alamat Perusahaan</td><td><?php echo $alamat_perusahaan; ?></td></tr>
	    <tr><td>Id Kecamatan</td><td><?php echo $id_kecamatan; ?></td></tr>
	    <tr><td>Nomor Telepon</td><td><?php echo $nomor_telepon; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('perusahaan_bus') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>