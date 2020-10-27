<?php
	session_start();
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Les Aliments Mere Anto - Services traiteur mariage</title>
		<?php
  			include 'master_page/head.php';
        ?>
	</head>
	
	<body class="smoothscroll enable-animation">

		<!-- wrapper 660838730014410190 -->
		<div id="wrapper">

			<?php
				include 'master_page/header.php';
			?>

			<section class="page-header shadow-after-1">
				<div class="container">

					<h1>Services Traiteur Mariage</h1>

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="index.php">Accueil</a></li>
						<li><a href="#">Services</a></li>
						<li class="active">Traiteur mariage</li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->

			<!-- -->
			<section>
				<div class="container">
					
					<p class="lead">Nos services de Traiteur de saveurs traditionneles africaines pour mariage à Québec ville.</p>
					<h4 class="lead">Vous organisez votre mariage et vous souhaitez lui offrir une couleur de plats africains ?<br/>
						Vous préférez vous appuyer sur l’expertise d'une professionnelle ?</h4>

						<p>Nous sommes là pour ça ! Installés à Québec ville, nous intervenons partout dans la ville.</p>
					
					<div class="divider divider-center divider-color"><!-- divider -->
						<i class="fa fa-chevron-down"></i>
					</div>

					<!-- BORN TO BE A WINNER -->
					<article class="row">
						<div class="col-md-6">
							<!-- OWL SLIDER -->
							<div class="owl-carousel buttons-autohide controlls-over m-0" data-plugin-options='{"items": 1, "autoHeight": true, "navigation": true, "pagination": true, "transitionStyle":"backSlide", "progressBar":"true"}'>
								<div>
									<img class="img-fluid" src="assets/images/resto-images/st1-800x550.jpg" alt="">
								</div>
								<div>
									<img class="img-fluid" src="assets/images/resto-images/st2-800x550.jpg" alt="">
								</div>
								<div>
									<img class="img-fluid" src="assets/images/resto-images/st3-800x550.jpg" alt="">
								</div>
								<div>
									<img class="img-fluid" src="assets/images/resto-images/st9-800x550.jpg" alt="">
								</div>
							</div>
							<!-- /OWL SLIDER -->
						</div>
						<div class="col-md-6">
							<h3>Pourquoi choisir notre service traiteur ?</h3>
							<p>Vous aurez l’assurance de produits frais(faitent sur place), de plats traditionnels africains et occidentals
								d’une cuisine savoureuse, préparée par une cuisinière expérimentée.</p>
							
							<p>Notre service traiteur vous propose trois types de menu africain spécial mariage, comportant une entrée, 
								un plat, un dessert et une boisson.</p>
							
							<p>Des recettes d’Afrique appétissantes vous offrant diverses alternatives et des plats de qualité.</p>
							
							<p>Du crevette sauté en passant par le banane plantain au poinsson, le poisson sauté au riz frit, les allocos,
								vous pourrez vous faire plaisir et régaler vos hôtes.</p>
						</div>
					</article>
					<!-- /BORN TO BE A WINNER -->
						<p>Pour vous aider à choisir le menu africain de votre mariage, vous pouvez nous appeller au <span><strong>514-266-8887 / 581-777-7449</strong></span> 
							ou <a href="mailto:loukebadominique@hotmail.com" class="btn btn-red btn-lg btn-round">nous contacter</a> <br/>à notre service traiteur 
							<a href="index.php#themenu"­­>ou jeter un œil à nos plats.</a></p>
					</div>
				
				</div>
			</section>
			<!-- / SERVICES-->

			<?php
				include_once 'master_page/footer.php';
			?>

		</div>
		<!-- /wrapper -->
			<?php
				include_once 'master_page/script.php';
			?>

	</body>
</html>