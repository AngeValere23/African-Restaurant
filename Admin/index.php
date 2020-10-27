<?php
	include('functions.php');

	if (!isAdmin()) {
		$_SESSION['msg'] = "Vous devez vous connecter avant..!";
		header('location: login.php');
	}
	
?>

<!doctype html>
<html lang="en-US">
	<head>
		<meta charset="utf-8" />
		<title>Admin</title>
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
							<a href="#"><!-- warning - url used by default by ajax (if eneabled) -->
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
					<img src="../assets/images/resto-images/logo" alt="Admin panel" height="35" />
				</span>

				<form method="get" action="page-search.html" class="search pull-left hidden-xs">
					<input type="text" class="form-control" name="k" placeholder="Search for something..." />
				</form>

				<nav>

					<!-- OPTIONS LIST -->
					<ul class="nav pull-right">

						<!-- USER OPTIONS -->
						<li class="dropdown pull-left">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<img class="user-avatar" alt="" src="../assets/images/_smarty/ado.png" height="34" /> 
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
								<!--<li> settings
									<a href="user-profile.php#edit"><i class="fa fa-cogs"></i> Settings</a>
								</li>
								<li class="divider"></li> -->
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

			<!-- notification message -->
			<?php if (isset($_SESSION['success'])) : ?>
				<div class="error success" >
					<h3>
						<?php 
							echo $_SESSION['success']; 
							unset($_SESSION['success']);
						?>
					</h3>
				</div>
			<?php endif ?>


				<!-- page title -->
				<header id="page-header">
					<h1><strong>Administrateur</strong></h1>
					<ol class="breadcrumb">
						<li><a href="#">Pages</a></li>
						<li class="active">Admin Profile</li>
					</ol>
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">

					<div id="panel-1" class="panel panel-default">
						<div class="panel-heading">
							<span class="title elipsis">
								<strong>Base de Données des Administrateur</strong>
							</span>

							<!-- right options -->
							<ul class="options pull-right list-inline">
								<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
								<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
								<li><a href="#" class="opt panel_close" data-confirm-title="Confirm" data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip" title="Close" data-placement="bottom"><i class="fa fa-times"></i></a></li>
							</ul>
							<!-- /right options -->

						</div>

						<!-- panel content -->
						<div class="panel-body">

							<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
								<thead>
									<tr>
										<th>Nom</th>
										<th>Email</th>
										<th>Type d'utilisasteur</th>
										<th>Actions</th>								
									</tr>
								</thead>

								<tbody>
									<?php
									require_once '../database.php';
										$db = Database::connect();
										$statement = $db->query('SELECT * FROM admin ORDER BY id DESC');
										while ($membre = $statement->fetch()) {
											echo '<tr>';
											echo '<td>'. $membre['name'] . '</td>';
											echo '<td>'. $membre['email'] . '</td>';
											echo '<td>'. $membre['user_type'] . '</td>';											
											echo '<td width=250>';
											echo '<a class="btn btn-default" href="#"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>';
											echo '<a class="btn btn-danger" href="#"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>';
											echo '</td>';
											echo '</tr>';									
										}
										Database::disconnect();                        
										
									?>
	
								</tbody>
							</table>

						</div>
						<!-- /panel content -->

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