<?php
require_once 'database.php';
require_once 'panier.class.php';
$db = Database::connect();
$panier = new Panier($db);

	if (isset($_SESSION['id'])) {
		$requser = $db->prepare("SELECT * FROM user_info WHERE user_id = ?");
		$requser->execute(array($_SESSION['id']));
		$user = $requser->fetch();
	}
	
	// if(isset($_POST['submit'])){
	// 	$ids = array_keys($_SESSION['panier']);
	// 	$products = $db->query('SELECT * FROM products WHERE id IN ('.implode(',',$ids).')');
	// 	foreach($products as $product){
	// 		unset($_SESSION['panier'][$product['id']]);
	// 	}
	// }
	
	// if(isset($_POST['#vider'])){
	// 	unset($_SESSION['panier']['#vider']);
	// }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Les Aliments Mere Anto - Panier</title>
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
			
			<section class="page-header page-header-xs">
				<div class="container">

					<h1>Panier</h1>

					<!-- breadcrumbs -->
					<ol class="breadcrumb">
						<li><a href="index.php">Accueil</a></li>
						<li><a href="#">panier</a></li>
						<li class="active">Votre panier</li>
					</ol><!-- /breadcrumbs -->

				</div>
			</section>
			<!-- /PAGE HEADER -->




			<!-- CART -->
			<section>
				<div class="container">	
					<?php	

						$ids = array_keys($_SESSION['panier']);
						//unset($_SESSION['panier'][1]);
						if(empty($ids)){
							$products = array();
							echo '<!-- EMPTY CART -->
								<div class="card card-default">
									<div class="card-block">
										<strong>Le panier est vide!</strong><br>
										Vous n\'avez pas encore de plat selectionné dans le panier!<br>
										Cliquez <a href="index.php#themenu">ici</a> pour voir les différenrts plats. <br>
									</div>
								</div>
								<!-- /EMPTY CART -->';

						}else{
							$products = $db->query('SELECT * FROM products WHERE id IN ('.implode(',',$ids).')');
						}
						echo '

						<!-- CART -->
						<div class="row">						
							<!-- LEFT -->
							<div class="col-lg-9 col-sm-8">
								<div class="panel panel-primary">
									<div class="panel-heading">Votre panier</div>
									<form method="post" action="panier.php">
										<div class="panel-body">
											<div class="row">
												<div class="col-md-2 col-xs-2"><b>Image</b></div>
												<div class="col-md-2 col-xs-2"><b>Nom du plat</b></div>
												<div class="col-md-2 col-xs-2"><b>description</b></div>
												<div class="col-md-2 col-xs-2"><b>prix</b></div>
												<div class="col-md-2 col-xs-2"><b>Quantité</b></div>
												<div class="col-md-2 col-xs-2"><b>Actions</b></div>
											</div>';																			
												
												// $reqproduct->execute(array(1));
												//$product = $reqproduct->fetchAll(PDO::FETCH_OBJ);
												//var_dump($product);										
												
											foreach($products as $product){
												echo '<div class="row">										
													<div class="col-md-2"><img src="assets/images/resto-images/' . $product['product_image'] . '" width="80" alt=""></div>
													<div class="col-md-2">' . $product['product_name'] . '</div>
													<div class="col-md-2">' . $product['product_desc'] . '</div>										
													<div class="col-md-2"><input type="text" class="form-control" value="' . $product['product_price'] . '$" disabled></div>
													<div class="col-md-2"><input type="text" class="form-control" name="panier[quantity][' .$product['id']. ']" value="' . $_SESSION['panier'][$product['id']] . '" ></div>
													<div class="col-md-2">
														<div class="btn-group">
															<a href="panier.php?delPanier=' . $product['id'] . '" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>															
														</div>
													</div>
												</div><br/>';
											}

										echo '</div>
									<div class="panel-footer">
										<div class="row">
											<div class="col-md-4 fs-20 float-right" style="display: block;">
												<span class="float-right">Total : ' .number_format($panier->total(),2,',',' '). '$</span>
											</div> 
										</div>
									</div>
									<div style="margin-top:20px;">
										<!-- update cart -->									
										<button type="submit" class="btn btn-success mt-20 mr-10 float-right"><i class="glyphicon glyphicon-ok"></i> METTRE PANIER À JOUR</button>
										<!--<button id="vider" type="submit" class="btn btn-danger mt-20 mr-10 float-right"><i class="fa fa-remove"></i> VIDER PANIER</button>							
										<-- /update cart -->
									</div>
									</form>									
								</div>
							</div>
							<!-- /LEFT -->
							<!-- RIGHT --> 
							<div class="col-lg-3 col-sm-4">
								<div class="toggle-transparent toggle-bordered-full clearfix">
									<div class="toggle active">
										<div class="toggle-content" style="display: block;">										
											<span class="clearfix">
												<strong class="float-left">Sous-total:</strong>
												<span class="float-right">' .number_format($panier->total(),2,',',' '). '$</span>											
											</span>
											<span class="clearfix">
												<span class="float-left">Livraison:</span>
												<span class="float-right">0,00$</span>											
											</span>
											<hr>
											<span class="clearfix">
												<strong class="float-left"> GRAND TOTAL:</strong>
												<span class="float-right fs-20">' .number_format($panier->total(),2,',',' '). '$</span>											
											</span>
											<hr>
											<a href="login_form.php" class="btn btn-primary btn-lg btn-block fs-15"><i class="fa fa-mail-forward"></i> Envoyer</a>
										</div>
									</div>
								</div>
							</div>
							<!-- /RIGHT -->					
						</div>
						<!-- /CART -->';
					?>
				</div>
			</section>
			<!-- /CART -->
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