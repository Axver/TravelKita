<!doctype html>
<html lang="en">

<head>
	<!--	Load Header Disini-->
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

	<?php $this->load->view("template/header"); ?>
</head>

<body>
<div class="wrapper ">
	<?php $this->load->view('template/sidebar'); ?>

	<div class="main-panel">
		<!-- Navbar -->
		<?php $this->load->view('template/panel'); ?>
		<!-- End Navbar -->
		<div class="content">
			<div class="container-fluid">
				<!-- your content here -->
				<h2 style="margin-top:0px">Bandara_asal List</h2>
				<div class="row" style="margin-bottom: 10px">
					<div class="col-md-4">
						<?php echo anchor(site_url('bandara_asal/create'),'Create', 'class="btn btn-primary"'); ?>
					</div>
					<div class="col-md-4 text-center">
						<div style="margin-top: 8px" id="message">
							<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
						</div>
					</div>
					<div class="col-md-1 text-right">
					</div>
					<div class="col-md-3 text-right">
						<form action="<?php echo site_url('bandara_asal/index'); ?>" class="form-inline" method="get">
							<div class="input-group">
								<input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
								<span class="input-group-btn">
                            <?php
							if ($q <> '')
							{
								?>
								<a href="<?php echo site_url('bandara_asal'); ?>" class="btn btn-default">Reset</a>
								<?php
							}
							?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
							</div>
						</form>
					</div>
				</div>
				<table class="table table-bordered" style="margin-bottom: 10px">
					<tr>
						<th>No</th>
						<th>Id Negara</th>
						<th>Nama Bandara</th>
						<th>Latitude</th>
						<th>Longitude</th>
						<th>Action</th>
					</tr><?php
					foreach ($bandara_asal_data as $bandara_asal)
					{
						?>
						<tr>
							<td width="80px"><?php echo ++$start ?></td>
							<td><?php echo $bandara_asal->id_negara ?></td>
							<td><?php echo $bandara_asal->nama_bandara ?></td>
							<td><?php echo $bandara_asal->latitude ?></td>
							<td><?php echo $bandara_asal->longitude ?></td>
							<td style="text-align:center" width="200px">
								<?php
								echo anchor(site_url('bandara_asal/read/'.$bandara_asal->id_bandara_asal),'Read');
								echo ' | ';
								echo anchor(site_url('bandara_asal/update/'.$bandara_asal->id_bandara_asal),'Update');
								echo ' | ';
								echo anchor(site_url('bandara_asal/delete/'.$bandara_asal->id_bandara_asal),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
								?>
							</td>
						</tr>
						<?php
					}
					?>
				</table>
				<div class="row">
					<div class="col-md-6">
						<a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
					</div>
					<div class="col-md-6 text-right">
						<?php echo $pagination ?>
					</div>
				</div>
			</div>
		</div>
		<footer class="footer">
			<div class="container-fluid">
				<nav class="float-left">
					<ul>
						<li>
							<a href="https://www.creative-tim.com">
								TravelKita
							</a>
						</li>
					</ul>
				</nav>

				<!-- your footer here -->
			</div>
		</footer>
	</div>

</div>
<!--   Core JS Files   -->
<script src="<?php echo base_url('/assets/js/core/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/core/popper.min.js') ?>"></script>
<script src="<?php echo base_url('/assets/js/core/bootstrap-material-design.min.js') ?>"></script>
<script src="https://unpkg.com/default-passive-events"></script>
<script src="<?php echo base_url('/assets/js/plugins/perfect-scrollbar.jquery.min.js') ?>"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chartist JS -->
<script src="<?php echo base_url('/assets/js/plugins/chartist.min.js') ?>"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url('/assets/js/plugins/bootstrap-notify.js') ?>"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo base_url('/assets/js/material-dashboard.js?v=2.1.0') ?>"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url('/assets/demo/demo.js') ?>"></script>
<script>
    $(document).ready(function() {
        $().ready(function() {
            $sidebar = $('.sidebar');

            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');

            window_width = $(window).width();

            $('.fixed-plugin a').click(function(event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }
            });

            $('.fixed-plugin .background-color .badge').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('background-color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-background-color', new_color);
                }
            });

            $('.fixed-plugin .img-holder').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function() {
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $full_page_background.fadeOut('fast', function() {
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });

            $('.switch-sidebar-image input').change(function() {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
            });

            $('.switch-sidebar-mini input').change(function() {
                $body = $('body');

                $input = $(this);

                if (md.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    md.misc.sidebar_mini_active = false;

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                } else {

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                    setTimeout(function() {
                        $('body').addClass('sidebar-mini');

                        md.misc.sidebar_mini_active = true;
                    }, 300);
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });
        });
    });
</script>
</body>

</html>s
