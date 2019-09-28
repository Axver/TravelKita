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
        <h2 style="margin-top:0px">Transaksi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id List Penerbangan <?php echo form_error('id_list_penerbangan') ?></label>
            <input type="text" class="form-control" name="id_list_penerbangan" id="id_list_penerbangan" placeholder="Id List Penerbangan" value="<?php echo $id_list_penerbangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Transaksi <?php echo form_error('tgl_transaksi') ?></label>
            <input type="text" class="form-control" name="tgl_transaksi" id="tgl_transaksi" placeholder="Tgl Transaksi" value="<?php echo $tgl_transaksi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status Transaksi <?php echo form_error('status_transaksi') ?></label>
            <input type="text" class="form-control" name="status_transaksi" id="status_transaksi" placeholder="Status Transaksi" value="<?php echo $status_transaksi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status Pembayaran <?php echo form_error('status_pembayaran') ?></label>
            <input type="text" class="form-control" name="status_pembayaran" id="status_pembayaran" placeholder="Status Pembayaran" value="<?php echo $status_pembayaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tagihan <?php echo form_error('tagihan') ?></label>
            <input type="text" class="form-control" name="tagihan" id="tagihan" placeholder="Tagihan" value="<?php echo $tagihan; ?>" />
        </div>
	    <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('transaksi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>