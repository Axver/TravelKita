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
        <h2 style="margin-top:0px">Maskapai <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Maskapai <?php echo form_error('nama_maskapai') ?></label>
            <input type="text" class="form-control" name="nama_maskapai" id="nama_maskapai" placeholder="Nama Maskapai" value="<?php echo $nama_maskapai; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Kantor <?php echo form_error('alamat_kantor') ?></label>
            <input type="text" class="form-control" name="alamat_kantor" id="alamat_kantor" placeholder="Alamat Kantor" value="<?php echo $alamat_kantor; ?>" />
        </div>
	    <input type="hidden" name="id_maskapai" value="<?php echo $id_maskapai; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('maskapai') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>