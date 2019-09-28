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
        <h2 style="margin-top:0px">Kecamatan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Kecamatan <?php echo form_error('nama_kecamatan') ?></label>
            <input type="text" class="form-control" name="nama_kecamatan" id="nama_kecamatan" placeholder="Nama Kecamatan" value="<?php echo $nama_kecamatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Kabupaten <?php echo form_error('id_kabupaten') ?></label>
            <input type="text" class="form-control" name="id_kabupaten" id="id_kabupaten" placeholder="Id Kabupaten" value="<?php echo $id_kabupaten; ?>" />
        </div>
	    <input type="hidden" name="id_kecamatan" value="<?php echo $id_kecamatan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kecamatan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>