<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('plato/header'); ?>

	<style>

		.card {
			/* Add shadows to create the "card" effect */
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
			transition: 0.3s;
		}

		/* On mouse-over, add a deeper shadow */
		.card:hover {
			box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
		}

		/* Add some padding inside the card container */
		.container {
			padding: 2px 16px;
		}




		.Wrapper {
			flex: 0 0 80%;
			max-width: 80%;
		}

		.Title {
			margin: 0 0 var(--gutterXx) 0;
			padding: 0;
			color: #fff;
			font-size: var(--fontSizeXx);
			font-weight: 400;
			line-height: var(--lineHeightSm);
			text-align: center;
			text-shadow: -0.1rem 0.1rem 0.2rem var(--colorPrimary800);
		}

		.Input {
			position: relative;
		}

		.Input-text {
			display: block;
			margin: 0;
			padding: var(--inputPaddingV) var(--inputPaddingH);
			color: inherit;
			width: 100%;
			font-family: inherit;
			font-size: var(--inputFontSize);
			font-weight: inherit;
			line-height: var(--inputLineHeight);
			border: none;
			border-radius: 0.4rem;
			transition: box-shadow var(--transitionDuration);
		}

		.Input-text::placeholder {
			color: #B0BEC5;
		}

		.Input-text:focus {
			outline: none;
			box-shadow: 0.2rem 0.8rem 1.6rem var(--colorPrimary600);
		}

		.Input-label {
			display: block;
			position: absolute;
			bottom: 50%;
			left: 1rem;
			color: #fff;
			font-family: inherit;
			font-size: var(--inputFontSize);
			font-weight: inherit;
			line-height: var(--inputLineHeight);
			opacity: 0;
			transform:
				translate3d(0, var(--labelDefaultPosY), 0)
				scale(1);
			transform-origin: 0 0;
			transition:
				opacity var(--inputTransitionDuration) var(--inputTransitionTF),
				transform var(--inputTransitionDuration) var(--inputTransitionTF),
				visibility 0ms var(--inputTransitionDuration) var(--inputTransitionTF),
				z-index 0ms var(--inputTransitionDuration) var(--inputTransitionTF);
		}

		.Input-text:placeholder-shown + .Input-label {
			visibility: hidden;
			z-index: -1;
		}

		.Input-text:not(:placeholder-shown) + .Input-label,
		.Input-text:focus:not(:placeholder-shown) + .Input-label {
			visibility: visible;
			z-index: 1;
			opacity: 1;
			transform:
				translate3d(0, var(--labelTransformedPosY), 0)
				scale(var(--labelScaleFactor));
			transition:
				transform var(--inputTransitionDuration),
				visibility 0ms,
				z-index 0ms;
		}
	</style>

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
							<img style="width:25%" src="<?php echo base_url('assets/img/travelkita.png') ?>">
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
				<div class="wrapper" style="text-align: center">
					<div class="card" style="text-align: center;float:left;color:#09828c;width:80px;">
						<!--			<img src="img_avatar.png" alt="Avatar" style="width:100%">-->

						<i class="fa fa-car" style="font-size:60px;float:left;"></i>

					</div>
					<div class="card" style="float:left;color:#09828c;width:80px;">
						<!--			<img src="img_avatar.png" alt="Avatar" style="width:100%">-->

						<i class="fa fa-hotel" style="font-size:60px;float:left;"></i>

					</div>
					<div class="card" style="float:left;color:#09828c;width:80px;">
						<!--			<img src="img_avatar.png" alt="Avatar" style="width:100%">-->

						<i class="fa fa-plane" style="font-size:60px;float:left;"></i>

					</div>
					<div class="card" style="float:left;color:#09828c;width:80px;">
						<!--			<img src="img_avatar.png" alt="Avatar" style="width:100%">-->

						<i class="fa fa-question-circle-o" style="text-align: center;font-size:60px;float:left;"></i>

					</div>

				</div>

				<div class="Wrapper">

					<div class="Input">
						<input type="text" id="from" class="Input-text" placeholder="From">
						<input type="text" id="destination" class="Input-text" placeholder="Destination">
						<input type="date" id="destination" class="Input-text" placeholder="Destination">
						<button class="btn btn-info"> Search</button>


					</div>


				</div>

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
		<div class="container">
			<h3><b style="color:red;">Hasil Pencarian</b></h3>
		</div>

		<div class="card">
			<!--			<img src="img_avatar.png" alt="Avatar" style="width:100%">-->
			<div class="container" style="height:100px;">
				<img style="float:left; width:100px;" src="<?php echo base_url('assets/img/maskapai/garuda.png'); ?>" alt="">
				<button class="btn btn-info" style="float:right;margin-right: 20px;">Buy</button>
				<button class="btn btn-info" style="float:right;margin-right: 20px;">Info</button>
				<p style="margin-left:10px;"><b>Garuda Indonesia</b> <br><h3><b style="color:#09828C">Rp.2000.000</b></h3></p>


			</div>

		</div>

		<div class="card">
			<!--			<img src="img_avatar.png" alt="Avatar" style="width:100%">-->
			<div class="container" style="height:100px;">
				<img style="float:left; width:100px;" src="<?php echo base_url('assets/img/maskapai/batikair.png'); ?>" alt="">
				<button class="btn btn-info" style="float:right;margin-right: 20px;">Buy</button>
				<button class="btn btn-info" style="float:right;margin-right: 20px;">Info</button>
				<p style="margin-left:10px;"><b>Batik Air</b><br><h3><b style="color:#09828C">Rp.2000.000</b></h3></p>
			</div>
		</div>
		<div class="card">
			<!--			<img src="img_avatar.png" alt="Avatar" style="width:100%">-->
			<div class="container" style="height:100px;">
				<img style="float:left; width:100px;" src="<?php echo base_url('assets/img/maskapai/airasia.png'); ?>" alt="">
				<button class="btn btn-info" style="float:right;margin-right: 20px;">Buy</button>
				<button class="btn btn-info" style="float:right;margin-right: 20px;">Info</button>
				<p><b>Air Asia</b><br><h3><b style="color:#09828C">Rp.2000.000</b></h3></p>
			</div>
		</div>
		<div class="card">
			<!--			<img src="img_avatar.png" alt="Avatar" style="width:100%">-->
			<div class="container" style="height:100px;">
				<img style="float:left; width:100px;" src="<?php echo base_url('assets/img/maskapai/lion.png'); ?>" alt="">
				<button class="btn btn-info" style="float:right;margin-right: 20px;">Buy</button>
				<button class="btn btn-info" style="float:right;margin-right: 20px;">Info</button>
				<p style="margin-left:50px;"><b>Lion Air</b><br><h3><b style="color:#09828C">Rp.2000.000</b></h3></p>

			</div>
		</div>
		<br>
		<div class="card">

			<button class="btn btn-info" style="height:50px;width:150px;">Load More</button>

		</div>
		<br>
	</div>
</section>
<!-- Footer
================================================== -->
<?php $this->load->view('plato/footer'); ?>


</body>

</html>
