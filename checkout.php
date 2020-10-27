<?php

	require_once 'send_order/sendemail.php';
	require_once 'database.php';
	require_once 'panier.class.php';
	$db = Database::connect();
	$panier = new Panier($db);

	if (isset($_SESSION['id'])) {
		$requser = $db->prepare("SELECT * FROM user_info WHERE user_id = ?");
		$requser->execute(array($_SESSION['id']));
		$user = $requser->fetch();
	}else{
		header("location:login_form.php");
	}

	
	if(isset($_POST['submit'])){
		$ids = array_keys($_SESSION['panier']);
		$products = $db->query('SELECT * FROM products WHERE id IN ('.implode(',',$ids).')');
		foreach($products as $product){
			unset($_SESSION['panier'][$product['id']]);
		}
		header("location:confirmation.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Les Aliments Mere Anto - Checkout</title>
		<?php
  			include 'master_page/head.php';
        ?>
	</head>

	<body class="smoothscroll enable-animation">
		
		<!-- wrapper -->
		<div id="wrapper">

			<!-- header -->
			<div id="header" class="navbar-toggleable-md sticky dark header-md clearfix b-0">

				<!-- TOP NAV -->
				<header id="topNav">
					<div class="container">

						<!-- Mobile Menu Button -->
						<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
							<i class="fa fa-bars"></i>
						</button>

						<!-- Logo -->
						<a class="logo float-left scrollTo" href="index.php">
							<img src="assets/images/resto-images/logo.png" alt="" />
						</a>

						<!-- 
							Top Nav 
							
							AVAILABLE CLASSES:
							submenu-dark = dark sub menu
						-->
						<div class="navbar-collapse collapse float-right nav-main-collapse submenu-dark">
							<nav class="nav-main">

								<!-- 
									.nav-onepage
									Required for onepage navigation links
									
									Add .external for an external link!
								-->
								<ul id="topMain" class="nav nav-pills">
									<li class="active"><!-- HOME -->
										<a href="index.php">
											ACCUEIL
										</a>
									</li>
									<li><!-- ABOUT -->
										<a href="index.php#about">
											À PROPOS
										</a>
									</li>
									<li><!-- TEAM -->
										<a href="index.php#themenu">
											MENU
										</a>
									</li>
									<li><!-- SERVICES -->
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">SERVICE TRAITEUR</a>
										<ul class="dropdown-menu">
											<li><a href="traiteur-mariage.php">Service traiteur mariage</a></li>
											<li><a href="traiteur-bapteme-anniversaire.php">Service traiteur baptême et anniversaire</a></li>
										</ul>
									</li>								
									<li><!-- CONTACT -->
										<a href="index.php#contact">
											CONTACTEZ-NOUS
										</a>
									</li>
									<?php
										echo '<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Panier<span class="badge badge-red"><span id="count">' .$panier->count(). '</span></span></a>
											<div class="dropdown-menu" style="width:400px;">
												<div class="panel panel-success">
													<div class="panel-heading">
														<div class="row">
															<div class="col-md-3">Sl.No</div>
															<div class="col-md-3">Image du produit</div>
															<div class="col-md-3">Nom du produit</div>
															<div class="col-md-3">Prix $</div>
														</div>
													</div>';
													
													$ids = array_keys($_SESSION['panier']);
													$n=0;
													//unset($_SESSION['panier'][1]);
													if(empty($ids)){
														$products = array();
													}else{
														$products = $db->query('SELECT * FROM products WHERE id IN ('.implode(',',$ids).')');
													}
													foreach($products as $product){
														$n++;
											echo    '<div class="panel-body">
														<div class="row">                                                
															<div class="col-md-3">'.$n.'</div>
															<div class="col-md-3"><img src="assets/images/resto-images/' . $product['product_image'] . '" width="50" alt=""></div>
															<div class="col-md-3">' . $product['product_name'] . '</div>
															<div class="col-md-3">' . $product['product_price'] . '$</div>
														</div>
													</div>';  
												}                                                                                    
												echo    '    <div class="panel-footer">
														<div class="quick-cart-footer clearfix">
															<a href="panier.php" class="btn btn-primary btn-sm float-right">VOIR PANIER</a>
															<span class="float-left"><span id="total"><strong>TOTAL: </strong>' . number_format($panier->total(),2,',',' '). '</span>$</span>
														</div>
													</div>
												
												</div>
											</div>
										</li>'; 

									?> 
									<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo " Bonjour, " . $user['first_name']; ?></a>
										<ul class="dropdown-menu">
											<li><a href="panier.php" style="text-decoration:none; "><i class="fa fa-shopping-cart"></i>Panier</a></li>
											<!-- <li class="divider"></li>
											<li><a href="customer_order.php" style="text-decoration:none; "><i class="fa fa-briefcase"></i>Mes Commandes</a></li>									 -->
											<li class="divider"></li>
											<li><a href="logout.php" style="text-decoration:none; "><i class="fa fa-sign-out"></i>Deconnexion</a></li>
										</ul>
									</li>
								</ul>
							</nav>
						</div>

					</div>
				</header>
				<!-- /Top Nav -->

			</div>
			<!-- /header -->

			<section class="page-header page-header-xs">
				<div class="container">

					<h1>CHECKOUT</h1>

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="index.php">Profile</a></li>
						<li><a href="panier.php">Panier</a></li>
						<li class="active">Checkout</li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>

			<section>
				<div class="container">

					<!-- CHECKOUT -->
					<form class="row clearfix" method="post" action="">

						<div class="col-lg-7 col-sm-7">
							<div class="heading-title">
								<h4>Détails du client &amp; résumé de la commande</h4>
							</div>


							<!-- BILLING -->
							<fieldset class="mt-60">
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<label for="firstname">Prenon</label>
										<input id="firstname" name="firstname" type="text" class="form-control required" value="<?php echo $user['first_name']; ?>">
									</div>
									<div class="col-md-6 col-sm-6">
										<label for="lastname">Nom</label>
										<input id="lastname" name="lastname" type="text" class="form-control required" value="<?php echo $user['last_name']; ?>">
									</div>
								</div>

								<div class="row">
									<div class="col-md-6 col-sm-6">
										<label for="email">Email </label>
										<input id="email" name="email" type="text" class="form-control required" value="<?php echo $user['email']; ?>">
									</div>
									<div class="col-md-6 col-sm-6">
										<label for="phone">Mobile</label>
										<input id="phone" name="phone" type="text" class="form-control" value="<?php echo $user['mobile']; ?>">
									</div>
								</div>

								<div class="row">
									<div class="col-lg-12">
										<label for="address">Addresse complète</label>
										<input id="address" name="address" type="text" class="form-control required" placeholder="Address" value="<?php echo $user['address']; ?>">

										<input id="zipcode" name="zipcode" type="text" class="form-control mt-10" placeholder="code postal" value="<?php echo $user['postal_code']; ?>">
									</div>
								</div>

							</fieldset>
							<!-- /BILLING -->

									<?php
										echo '<div class="col-lg-12 m-0 clearfix">
												<div class="toggle-content clearfix">
													<div class="panel-heading clearfix">
														<div class="row">
															<div class="col-md-2">No</div>
															<div class="col-md-2">Image du produit</div>
															<div class="col-md-2">Nom du produit</div>
															<div class="col-md-2">Prix $</div>
															<div class="col-md-2">Quantité</div>
															<div class="col-md-2"></div>
														</div>
													</div>';
													
													$ids = array_keys($_SESSION['panier']);
													$n=0;
													//unset($_SESSION['panier'][1]);
													if(empty($ids)){
														$products = array();
													}else{
														$products = $db->query('SELECT * FROM products WHERE id IN ('.implode(',',$ids).')');
													}
													foreach($products as $product){
														$n++;
										echo    '<div class="panel-body">
													<div class="row">                                                
														<div class="col-md-2">'.$n.'</div>
														<div class="col-md-2"><img src="assets/images/resto-images/' . $product['product_image'] . '" width="50" alt=""></div>
														<div class="col-md-2">' . $product['product_name'] . '</div>
														<div class="col-md-2">' . $product['product_price'] . '$</div>
														<div class="col-md-2"><input type="text" class="form-control" name="panier[quantity][' .$product['id']. ']" value="' . $_SESSION['panier'][$product['id']] . '" ></div>
														<div class="col-md-2"></div>
													</div>
												</div>';  
											}                                                                                    
											echo '<div class="panel-footer">
													<div class="quick-cart-footer clearfix">
														<a href="panier.php" class="btn btn-default btn-sm float-right">' . number_format($panier->total(),2,',',' '). '$</a>
														<span class="float-left"><span id="total"><strong>TOTAL</strong></span></span>
													</div>
												</div>
											
											</div>
										</div>										 

									 

						</div>



						<div class="col-lg-5 col-sm-5">
							<div class="heading-title">
								<h4>Methode de paiement</h4>
							</div>

							<!-- PAYMENT METHOD -->
							<fieldset class="mt-60">
								<div class="toggle-transparent toggle-bordered-full clearfix">
									<div class="toggle active">
										<div class="toggle-content" style="display: block;">

											<div class="row mb-0">
												<div class="col-lg-12 m-0 clearfix">
													<label class="radio float-left mt-0">
														<input id="payment_check" name="payment[method]" type="radio" value="1" checked="checked">
														<i></i> <span class="fw-300">Payer en argent à la livraison ou emporter</span>
													</label>
												</div>
												<div class="col-lg-12 m-0 clearfix">
													<label class="row float-right">
														<p class="fs-11"><b>Note:</b> Notez que pour les frais de livraison sont de 6,99$.
														Veuillez nous contacter pour confirmer votre choix de livraison au <span><strong>514-266-8887 / 581-777-7449..!</strong></span> </p>
													</label>
												</div>
											</div>
										
										</div>
									</div>
								</div>
							</fieldset>
							<!-- /PAYMENT METHOD -->

							
								<!-- TOTAL / PLACE ORDER -->
								<div class="toggle-transparent toggle-bordered-full clearfix">
									<div class="toggle active">
										<div class="toggle-content" style="display: block;">
											
											<span class="clearfix">
												<span class="float-right">' .number_format($panier->total(),2,',',' '). '$</span>
												<strong class="float-left">Subtotal:</strong>
											</span>
											<span class="clearfix">
												<span class="float-right">6,99$</span>
												<span class="float-left">Livraison:</span>
											</span>

											<hr>

											<span class="clearfix">
												<span class="float-right fs-20">' .number_format($panier->total() + 6.99 ,2,',',' '). '$</span>
												<strong class="float-left">TOTAL:</strong>
											</span>

											<hr>

											<button name="submit" type="submit" class="btn btn-primary btn-lg btn-block fs-15"><i class="fa fa-mail-forward"></i> Commander</button>
										</div>
									</div>
								</div>
								<!-- /TOTAL / PLACE ORDER -->';	

							?>						
						</div>
					<!-- /CHECKOUT -->				
					</form>
				</div>
			</div></section>



			<?php
				include_once 'master_page/footer.php';
			?>
	
		</div>
	
			<?php
				include_once 'master_page/script.php';
			?>
	
	</body>
</html>