<?php
	session_start();

	require '../database.php';
	
	if (!empty($_GET['id'])) {
		$getid = checkInput($_GET['id']);
    }
    $db = Database::connect();
    $statement = $db->prepare('SELECT products.id, products.product_name, products.product_price, products.product_desc, products.product_image, products.product_keywords,
								categories.name AS categorie FROM products LEFT JOIN categories ON products.product_cat = categories.id WHERE products.id = ?');								
    $statement->execute(array($getid));
    $items = $statement->fetch(); 
    Database::disconnect();                        

    function checkInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

	
?>

<!doctype html>
<html lang="en-US">
	<head>
		<meta charset="utf-8" />
		<title>Admin - View</title>
		<meta name="description" content=" Un site gratuit de publication ou de vente de livre pour les étudiants" />
		<meta name="Ange Valere" content="Books Open [https://github.com/AngeValere23]" />

		<!-- FAVICON -->
		<link  href="../assets/images/_smarty/logo (2).PNG" rel="icon" type="images/png"/>


		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

		<!-- WEB FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- THEME CSS -->
		<link href="assets/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/layout.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />

		<!-- PAGE LEVEL STYLES -->
		<link href="assets/css/layout-datatables.css" rel="stylesheet" type="text/css" />

	</head>
	<!--
		.boxed = boxed version
	-->
	<body>


<!-- WRAPPER -->
<div id="wrapper" class="clearfix">

<!-- 
	ASIDE 
	Keep it outside of #wrapper (responsive purpose)
-->
<aside id="aside">
	<!--
		Always open:
		<li class="active alays-open">

		LABELS:
			<span class="label label-danger pull-right">1</span>
			<span class="label label-default pull-right">1</span>
			<span class="label label-warning pull-right">1</span>
			<span class="label label-success pull-right">1</span>
			<span class="label label-info pull-right">1</span>
	-->
	<nav id="sideNav"><!-- MAIN MENU -->
		<ul class="nav nav-list">
			<li class="active"><!-- dashboard -->
				<a href="index.php"><!-- warning - url used by default by ajax (if eneabled) -->
					<i class="main-icon fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>
			<!-- <li> 
				<a href="#">
					<i class="main-icon fa fa-file"></i> <span>Commandes</span>
				</a>
			</li> -->
			<li> 
				<a href="products.php">
					<i class="main-icon fa fa-shopping-cart"></i> <span>Produits</span>
				</a>
			</li>
			<li> 
				<a href="categories.php">
					<i class="main-icon fa fa-shopping-cart"></i> <span>Categories</span>
				</a>
			</li>
			<li> 
				<a href="customers.php">
					<i class="main-icon fa fa-users"></i> <span>Clients</span>
				</a>
			</li>		
		</ul>
	</nav>

	<span id="asidebg"><!-- aside fixed background --></span>
</aside>
<!-- /ASIDE -->


<!-- HEADER -->
<header id="header">

	<!-- Mobile Button -->
	<button id="mobileMenuBtn"></button>

	<!-- Logo -->
	<span class="logo pull-left">
		<img src="../assets/images/_smarty/logo (2).PNG" alt="admin panel" height="35" />
	</span>

	<form method="get" action="#" class="search pull-left hidden-xs">
		<input type="text" class="form-control" name="k" placeholder="Search for something..." />
	</form>

	<nav>

		<!-- OPTIONS LIST -->
		<ul class="nav pull-right">

			<!-- USER OPTIONS -->
			<li class="dropdown pull-left">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img class="user-avatar" alt="" src="assets/images/noavatar.jpg" height="34" /> 
					<span class="user-name">
						<span class="hidden-xs">
						<?php  if (isset($_SESSION['user'])) : ?>
							<strong><?php echo $_SESSION['user']['name']; ?></strong>

							<small>
								<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
								
							</small>

						<?php endif ?><i class="fa fa-angle-down"></i> 
						</span>
					</span>
				</a>
				<ul class="dropdown-menu hold-on-click">								
					<!-- <li>settings --
						<a href="user-profile.php#edit"><i class="fa fa-cogs"></i> Settings</a>
					</li>

					<li class="divider"></li>

					<li><-- lockscreen 
						<a href="lock.php"><i class="fa fa-lock"></i> Lock Screen</a>
					</li>-->
					<li><!-- logout -->
						<a href="login.php?logout='1'"><i class="fa fa-power-off"></i>Deconnecter</a>
					</li>
				</ul>
			</li>
			<!-- /USER OPTIONS -->

		</ul>
		<!-- /OPTIONS LIST -->

	</nav>

</header>
<!-- /HEADER -->



			<!-- 
				MIDDLE 
			-->
			<section id="middle">


				<!-- page title -->
				<header id="page-header">
					<h1>Voir le produit</h1>
					<ol class="breadcrumb">
						<li><a href="products.php">Produits</a></li>
						<li class="active">Voir Produit</li>
					</ol>
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">

					<div id="panel-1" class="panel panel-default">
						<div class="panel-heading">
							<span class="title elipsis">
								<strong>Verifier votre produit</strong>
							</span>

                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <form­­>
                                        <div class="form-group">
                                            <label>Nom:</label><?php echo ' ' . $items['product_name']; ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Prix:</label><?php echo ' ' . number_format((float)$items['product_price'],2, '.','') . '$'; ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Description:</label><?php echo ' ' . $items['product_desc']; ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Mot clé:</label><?php echo ' ' . $items['product_keywords']; ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Categorie:</label><?php echo ' ' . $items['categorie']; ?>
										</div>
										<div class="form-group">
                                            <label>Image:</label><?php echo ' ' . '<img src="../assets/images/resto-images/' . $items['product_image'] . '" width="50" alt="">'; ?>
                                        </div>
                                    </form>
                                    <div class="form-actions">
                                        <a class="btn btn-blue" href="products.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                                    </div>
                                
                                </div>
                                
								<div class="shop-item ">
									<ul class="row list-inline">
										<li class="col-sm-6 col-md-4 thumbnail  relative clearfix mb-40">									
											<img src="../assets/images/resto-images/<?php echo $items['product_image']; ?>" width="500" alt="">																					
										</li>
									</li>
								</div>
                            </div>

                        </div>

						<!-- panel footer -->
						<div class="panel-footer">

						</div>
						<!-- /panel footer -->

					</div>
					<!-- /PANEL -->

				</div>
			</section>
			<!-- /MIDDLE -->

		</div>
	
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>

	</body>
</html>