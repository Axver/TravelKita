<!DOCTYPE html>
<html lang="en">

<head>
 <?php $this->load->view('plato/header'); ?>
</head>

<body>
<header>
	<!-- Navbar
	================================================== -->
	<div class="cbp-af-header" style="background-color:#09828C">
		<div class=" cbp-af-inner">
			<div class="container">
				<div class="row">

					<div class="span4">
						<!-- logo -->
						<div class="logo">
							<img style="width:20%" src="<?php echo base_url('assets/img/travelkita.png') ?>">
							<!-- <img src="assets/plato/img/logo.png" alt="" /> -->
						</div>
						<!-- end logo -->
					</div>

					<div class="span8">
						<!-- top menu -->
                         <?php $this->load->view('plato/navbar'); ?>
						<!-- end menu -->
					</div>

				</div>
			</div>
		</div>
	</div>
</header>
<section id="intro">

	<div class="container">
		<div class="row">
			<div class="span6">
				<h2><strong>Welcome to <span class="highlight primary">TravelKita</span></strong></h2>


			</div>
			<div class="span6">

				<div class="group section-wrap upper" id="upper">
					<div class="section-2 group">
						<ul id="images" class="rs-slider">
							<li class="group">
								<a href="#">
									<img src="<?php echo base_url('assets/plato/img/slides/refine/flight.jpg') ?>" alt="" />
								</a>
							</li>
							<li class="group">
								<a href="#" class="slide-parent">
									<img src="<?php echo base_url('assets/plato/img/slides/refine/hotel.jpg') ?>" alt=""/>
								</a>
							</li>
							<li class="group">
								<img src="<?php echo base_url('assets/plato/img/slides/refine/bus.jpg') ?>" alt="" />
							</li>
						</ul>
					</div>
					<!-- /.section-2 -->
				</div>

			</div>
		</div>
	</div>

</section>
<section id="maincontent">
	<div class="container">










	</div>
</section>
<!-- Footer
================================================== -->
<?php $this->load->view('plato/footer'); ?>


</body>

</html>
