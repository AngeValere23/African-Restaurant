<?php
	session_start();

	require 'database.php';
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

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Les Aliments Mere Anto - Profil</title>
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
											<li class="divider"></li>
											<li><a href="customer_order.php" style="text-decoration:none; "><i class="fa fa-briefcase"></i>Mes Commandes</a></li>									
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

					<h1>COMMANDE ENVOYÉE</h1>

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="index.php">Profile</a></li>
						<li><a href="panier.php">checkout</a></li>
						<li class="active">Confirmation</li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>

			<section>
				<div class="container">
						
					<!-- CHECKOUT FINAL MESSAGE -->
					<div class="card card-default">
						<div class="card-block">
							<h3>Merci, <?php echo $user['first_name']; ?></h3>

							<p>Votre commande a bien été reçu. Vous pouvez cliquez <a href="index.php">ici</a> pour explorer d'autres plats.</p>
							<hr>
							<p>
								Nous vous remerçions beaucoup de nous avoir choisi et pour votre confiance..! <br>
								<strong>Restaurant Mère Anto Inc.</strong>
							</p>
						</div>
					</div>
					<!-- /CHECKOUT FINAL MESSAGE -->
					
				</div>
			</section>


			<?php
				include_once 'master_page/footer.php';
			?>
	
		</div>
	
			<?php
				include_once 'master_page/script.php';
			?>
	
	</body>
</html>