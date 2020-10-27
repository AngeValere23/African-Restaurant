<?php
session_start();
if(isset($_SESSION["id"])){
	header("location:profile.php");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Les Aliments Mere Anto</title>
		<?php
  			include 'master_page/head.php';
        ?>
	</head>

	<body class="smoothscroll enable-animation">
		
		<!-- wrapper -->
		<div id="wrapper">

			<?php
				include 'master_page/header.php';
			?>
			<!-- REVOLUTION SLIDER -->
			<div id="home" class="slider fullwidthbanner-container roundedcorners">
	
				<div class="fullscreenbanner" data-height="600" data-shadow="0" data-navigationStyle="preview1">
					<ul class="hide">

						<!-- SLIDE  -->
						<li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off" data-title="Slide title 1" data-thumb="assets/images/resto-images/riz.jpg">

							<img data-lazyload="assets/images/resto-images/riz.jpg" alt="" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat" />

							<div class="overlay dark-3"><!-- dark overlay [1 to 9 opacity] --></div>

							<div class="tp-caption font-khausan-script customin ltl tp-resizeme large_bold_white"
								data-x="center"
								data-y="230"
								data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
								data-speed="800"
								data-start="1200"
								data-easing="easeOutQuad"
								data-splitin="none"
								data-splitout="none"
								data-elementdelay="0.01"
								data-endelementdelay="0.1"
								data-endspeed="1000"
								data-endeasing="Power4.easeIn" style="z-index: 10;">
								Restaurant Mere Anto
							</div>

							<div class="tp-caption customin ltl tp-resizeme small_light_white font-lato fs-20"
								data-x="center"
								data-y="350"
								data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
								data-speed="800"
								data-start="1400"
								data-easing="easeOutQuad"
								data-splitin="none"
								data-splitout="none"
								data-elementdelay="0.01"
								data-endelementdelay="0.1"
								data-endspeed="1000"
								data-endeasing="Power4.easeIn" style="z-index: 10; width: 100%; max-width: 750px; white-space: normal; text-align:center;">
								Découvrez et vivez les saveurs nutritionnelles africaines chez <span style="font-family: italic;"­>les Aliments Mere Anto</span>
							</div>


						</li>

						<!-- SLIDE  -->
						<li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off" data-title="Slide title 1" data-thumb="assets/images/resto-images/st2.jpg">

							<img data-lazyload="assets/images/resto-images/st2.jpg" alt="" data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat" />

							<div class="overlay dark-3"><!-- dark overlay [1 to 9 opacity] --></div>

							<div class="tp-caption font-khausan-script customin ltl tp-resizeme large_bold_white"
								data-x="center"
								data-y="230"
								data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
								data-speed="800"
								data-start="1200"
								data-easing="easeOutQuad"
								data-splitin="none"
								data-splitout="none"
								data-elementdelay="0.01"
								data-endelementdelay="0.1"
								data-endspeed="1000"
								data-endeasing="Power4.easeIn" style="z-index: 10;">
								Service traiteur
							</div>

							<div class="tp-caption customin ltl tp-resizeme small_light_white font-lato fs-20"
								data-x="center"
								data-y="350"
								data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
								data-speed="800"
								data-start="1400"
								data-easing="easeOutQuad"
								data-splitin="none"
								data-splitout="none"
								data-elementdelay="0.01"
								data-endelementdelay="0.1"
								data-endspeed="1000"
								data-endeasing="Power4.easeIn" style="z-index: 10; width: 100%; max-width: 750px; white-space: normal; text-align:center;">
								Decouvrez nos services traiteurs faitent sur mesure selon vos besoins.
							</div>


						</li>

					</ul>

					<div class="tp-bannertimer"><!-- progress bar --></div>
				</div>
			</div>
			<!-- /REVOLUTION SLIDER -->

			<!-- Welcome -->
			<section id="about">
				<div class="container">

					<div class="text-center mt-80 mb-100 clearfix">
						<h1 class="font-khausan-script fs-50 fw-300 mb-0"><span class="glyphicon glyphicon-cutlery"></span>Bienvenu chez <span>Mere Anto</span>! <span class="glyphicon glyphicon-cutlery"></span></h1>
						<hr />
						<h2 class="col-sm-10 offset-sm-1 mb-0 fw-400 fs-25">Commandez nos delicieux plats <span><a href="#">ici</a></span>!</h2>
					</div>

					<div class="row">
					
						<div class="col-sm-6 text-center-xs">

							<h2 class="font-khausan-script fs-50 fw-300 mb-0 "><span>Mode de vie sain</span></h2>
							<h3 class="fw-400 fs-25">Une grande variété de plats pour tous !</h3>
							
							<p>Goûter des recettes africaines traditionnelles : parce qu’un plat de riz et de poulet, préparé à la va-vite,
								n’a pas la même saveur qu’un plat mijoté, pimenté et cuisiné par une professionnelle.</p>
							
							<p>Décider de profiter du menu spécial partout et se faire livrer n’importe où dans un rayon de 20 km autour de
								la ville de Québec, ou passez nous voir directement pour des choix de saveurs a votre goût.</p>
							<p class="fs-11"><b>Note:</b> N’hésitez pas, nous faisons tout pour vous simplifier la vie !</p>
					
						</div>
						
						<div class="col-sm-6">
							
							<div class="row lightbox" data-plugin-options='{"delegate": "a", "gallery": {"enabled": true}}'>

								<div class="col-sm-4 col-6">
									<a class="thumbnail" href="assets/images/resto-images/st1.jpg">
										<img class="img-fluid" src="assets/images/resto-images/st1.jpg" alt="" />
									</a>
								</div>

								<div class="col-sm-4 col-6">
									<a class="thumbnail" href="assets/images/resto-images/st3.jpg">
										<img class="img-fluid" src="assets/images/resto-images/st3.jpg" alt="" />
									</a>
								</div>

								<div class="col-sm-4 col-6">
									<a class="thumbnail" href="assets/images/resto-images/st9-480x360.jpg">
										<img class="img-fluid" src="assets/images/resto-images/st9-480x360.jpg" alt="" />
									</a>
								</div>

								<div class="col-sm-4 col-6">
									<a class="thumbnail" href="assets/images/resto-images/fish-saled-480x360.jpg">
										<img class="img-fluid" src="assets/images/resto-images/fish-saled-480x360.jpg" alt="" />
									</a>
								</div>

								<div class="col-sm-4 col-6">
									<a class="thumbnail" href="assets/images/resto-images/soupe-480x360.jpg">
										<img class="img-fluid" src="assets/images/resto-images/soupe-480x360.jpg" alt="" />
									</a>
								</div>

								<div class="col-sm-4 col-6">
									<a class="thumbnail" href="assets/images/resto-images/pc-480x360.jpg">
										<img class="img-fluid" src="assets/images/resto-images/pc-480x360.jpg" alt="" />
									</a>
								</div>

								<div class="col-sm-4 col-6">
									<a class="thumbnail" href="assets/images/resto-images/dinde-480x360.jpg">
										<img class="img-fluid" src="assets/images/resto-images/dinde-480x360.jpg" alt="" />
									</a>
								</div>

								<div class="col-sm-4 col-6">
									<a class="thumbnail" href="assets/images/resto-images/st5-480x360.jpg">
										<img class="img-fluid" src="assets/images/resto-images/st5-480x360.jpg" alt="" />
									</a>
								</div>

								<div class="col-sm-4 col-6">
									<a class="thumbnail" href="assets/images/resto-images/pig-480x360.jpg">
										<img class="img-fluid" src="assets/images/resto-images/pig-480x360.jpg" alt="" />
									</a>
								</div>

							</div>
							
						</div>

					</div>

				</div>
			</section>
			<!-- /Welcome -->

			<!-- Gallery 
			<section id="gallery" class="alternate">
				<div class="container">

		

				</div>
			</section>
			<-- /Gallery -->

			<!-- Parallax -->
			<section class="parallax parallax-1" style="background-image: url('assets/images/resto-images/fruit.jpg');">
				<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

				<div class="container">

					<div class="text-center">
						<h3 class="font-khausan-script m-0 fw-300"><span>Notre Menu</span></h3>
						<p class="font-lato fw-300 lead mt-0">Vous allez adore notre variété de repas!</p>
					</div>

				</div>
			</section>
			<!-- /Parallax -->

			
			<section id="themenu">
				<div class="container">					
				<?php					
						echo '<nav>';
							$db = Database::connect();
							$statement = $db->query('SELECT * FROM categories');
							$categories = $statement->fetchAll();
							echo '<ul class="nav nav-pills">';
							foreach ($categories as $category){
								if ($category['id'] == '1') 
									echo '<li class="active"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
								else 
									echo '<li><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
															
							}
						echo '</ul>	
						</nav>
						<div class="row">	
							<div class="tab-content">';
							foreach ($categories as $category) {
								if($category['id'] == '1')
									echo '<div class="shop-item tab-pane active" id="' . $category['id'] .'">
										<ul class="row list-inline">
									';
								else
									echo '<div class="shop-item tab-pane fade" id="' . $category['id'] .'">
										<ul class="row list-inline">
									';
								$statement = $db->prepare('SELECT * FROM products WHERE products.product_cat = ?');
								$statement->execute(array($category['id']));
								while ($item = $statement->fetch()) 
								{	
									echo '
										<li class="col-sm-6 col-md-4 thumbnail  relative clearfix mb-40">									
											<img class="img-fluid" src="assets/images/resto-images/'. $item['product_image'] .'" width="50" alt="" />									
											<span class="float-right fs-17">$' . $item['product_price']. "<sup>00</sup>" . '</span>
											<h5 class="mb-3"><span>' . $item['product_name'] . '</span></h5>
											<p class="m-0 fs-12">' . $item['product_desc'] . '</p>
											<p class="m-0 fs-12"><a href="addpanier.php?id=' . $item['id'] .'" class="btn btn-order  addPanier" role="button" name="addToCart"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a></p>
										</li>';																			
										
																	
								}		
								echo '</ul>
								</div>';						
							}	
							echo '</div>';
							Database::disconnect();	
						echo '</div>';	
					?>						
				</div>
			</section>
			<!-- /Menu -->

			<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Contactez-nous</h2>
						<p class="lead font-lato">Contactez pour plus d'information sur nos repas! </p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-8 col-sm-8">

							<h3>Veillez remplis le formulaire <strong><em>ci-dessous!</em></strong></h3>

							
							<!--
								MESSAGES
								
									How it works?
									The form data is posted to php/contact.php where the fields are verified!
									php.contact.php will redirect back here and will add a hash to the end of the URL:
										#alert_success 		= email sent
										#alert_failed		= email not sent - internal server error (404 error or SMTP problem)
										#alert_mandatory	= email not sent - required fields empty
										Hashes are handled by assets/js/contact.js

									Form data: required to be an array. Example:
										contact[email][required]  WHERE: [email] = field name, [required] = only if this field is required (PHP will check this)
										Also, add `required` to input fields if is a mandatory field. 
										Example: <input required type="email" value="" class="form-control" name="contact[email][required]">

									PLEASE NOTE: IF YOU WANT TO ADD OR REMOVE FIELDS (EXCEPT CAPTCHA), JUST EDIT THE HTML CODE, NO NEED TO EDIT php/contact.php or javascript
												 ALL FIELDS ARE DETECTED DINAMICALY BY THE PHP

									WARNING! Do not change the `email` and `name`!
												contact[name][required] 	- should stay as it is because PHP is using it for AddReplyTo (phpmailer)
												contact[email][required] 	- should stay as it is because PHP is using it for AddReplyTo (phpmailer)
							-->

							<!-- Alert Success -->
							<div id="alert_success" class="alert alert-success mb-30">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong>Votre message a bien été envoyé!</strong> Merci de nous avoir contacté :)
							</div><!-- /Alert Success -->


							<!-- Alert Failed -->
							<div id="alert_failed" class="alert alert-danger mb-30">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong>Erreur [SMTP]!</strong> Erreur serveur interne!
							</div><!-- /Alert Failed -->


							<!-- Alert Mandatory -->
							<div id="alert_mandatory" class="alert alert-danger mb-30">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong>Sorry!</strong> You need to complete all mandatory (*) fields!
							</div><!-- /Alert Mandatory -->


							<form action="php/contact.php" method="post" enctype="multipart/form-data">
								<fieldset>
									<input type="hidden" name="action" value="contact_send" />

									<div class="row">
										<div class="col-md-4">
											<label for="contact:name">Nom complet *</label>
											<input required type="text" value="" class="form-control" name="contact[name][required]" id="contact:name" placeholder="Votre nom">
										</div>
										<div class="col-md-4">
											<label for="contact:email"> Addresse email *</label>
											<input required type="email" value="" class="form-control" name="contact[email][required]" id="contact:email" placeholder="Votre email">
										</div>
										<div class="col-md-4">
											<label for="contact:phone">Telephone *</label>
											<input required type="text" value="" class="form-control" name="contact[phone]" id="contact:phone" placeholder="455-555-5555">
										</div>
									</div>									
									<div class="row">
										<div class="col-md-12">
											<label for="contact:message">Message *</label>
											<textarea required maxlength="10000" rows="8" class="form-control" name="contact[message]" id="contact:message" placeholder="Votre message"></textarea>
										</div>
									</div>
								</fieldset>
								<!-- <div class="row">
									<div class="col-md-12">
										<p class="lead font-lato"><strong>* Ces informations sont requises.</strong></p>
									</div>
								</div>							 -->
								<div class="row">
									<div class="col-md-12">
										<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> ENVOYER</button>
									</div>
								</div>
							</form>

						</div>
						<!-- /FORM -->


						<!-- INFO -->
						<div class="col-md-4 col-sm-4">

							<h2>Visitez nous</h2>

							<!-- 
							Available heights
								h-100
								h-150
								h-200
								h-250
								h-300
								h-350
								h-400
								h-450
								h-500
								h-550
								h-600
							-->
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d174614.29109718447!2d-71.48177669808591!3d46.85651774359921!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cb8968a05db8893%3A0x8fc52d63f0e83a03!2zUXXDqWJlYywgUUM!5e0!3m2!1sfr!2sca!4v1600867611990!5m2!1sfr!2sca" 
								width="500" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
							

							<hr />

							<p>
								<span class="block"><strong><i class="fa fa-map-marker"></i> Addresse:</strong> Quebec, Quebec City, Canada</span>
								<span class="block"><strong><i class="fa fa-phone"></i> Phone:</strong> <a href="tel:514-266-8887">514-266-8887</a></span>
								<span class="block"><strong><i class="fa fa-envelope"></i> Email:</strong> <a href="mailto:loukebadominique@hotmail.com">loukebadominique@hotmail.com</a></span>
							</p>

						</div>
						<!-- /INFO -->

					</div>

				</div>
			</section>
			<!-- /CONTACT -->

			<?php
				include_once 'master_page/footer.php';
			?>
	
		</div>
	
			<?php
				include_once 'master_page/script.php';
			?>
	
	</body>
</html>