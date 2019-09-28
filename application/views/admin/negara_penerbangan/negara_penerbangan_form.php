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
        <h2 style="margin-top:0px">Negara_penerbangan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kode Negara <?php echo form_error('kode_negara') ?></label>
            <input type="text" class="form-control" name="kode_negara" id="kode_negara" placeholder="Kode Negara" value="<?php echo $kode_negara; ?>" />
        </div>
	    <input type="hidden" name="id_negara" value="<?php echo $id_negara; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('negara_penerbangan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>