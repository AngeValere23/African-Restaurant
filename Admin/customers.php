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
		<title>Admin - Client</title>
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
		<img src="../assets/images/resto-images/Admin panel" alt="Admin panel" height="35" />
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
						<a  href="login.php?logout='1'"><i class="fa fa-power-off"></i>Deconnecter</a>
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
					<h1><strong>Listes des Clients</strong> </h1>
					<ol class="breadcrumb">
						<li><a href="#">Tables</a></li>
						<li class="active">Profil d'utilisateur</li>
					</ol>
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">

<div id="panel-1" class="panel panel-default">
	<div class="panel-heading">
		<span class="title elipsis">
			<strong>Base de Données des Clients</strong>
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
					<th>Prenom</th>
					<th>Nom</th>
					<th>Email</th>
					<!-- <th>Mot de Passe</th> -->
					<th>Phone</th>
					<th>Addresse</th>
					<th>Code postal</th>
					<th>Actions</th>								
				</tr>
			</thead>

			<tbody>
				<?php

					require '../database.php';
					$db = Database::connect();
					$statement = $db->query('SELECT * FROM user_info ORDER BY user_id DESC');
					while ($membre = $statement->fetch()) {
						echo '<tr>';
						echo '<td>'. $membre['last_name'] . '</td>';
						echo '<td>'. $membre['first_name'] . '</td>';
						echo '<td>'. $membre['email'] . '</td>';
						// echo '<td>'. $membre['motdepasse'] . '</td>';
						echo '<td>'. $membre['mobile'] . '</td>';
						echo '<td>'. $membre['address'] . '</td>';
						echo '<td>'. $membre['postal_code'] . '</td>';											
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

		<!-- PAGE LEVEL SCRIPTS -->
		<script type="text/javascript">
			loadScript(plugin_path + "datatables/js/jquery.dataTables.min.js", function(){
				loadScript(plugin_path + "datatables/dataTables.bootstrap.js", function(){
					loadScript(plugin_path + "select2/js/select2.full.min.js", function(){

						if (jQuery().dataTable) {

							function restoreRow(oTable, nRow) {
								var aData = oTable.fnGetData(nRow);
								var jqTds = $('>td', nRow);

								for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
									oTable.fnUpdate(aData[i], nRow, i, false);
								}

								oTable.fnDraw();
							}

							function editRow(oTable, nRow) {
								var aData = oTable.fnGetData(nRow);
								var jqTds = $('>td', nRow);
								jqTds[0].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[0] + '">';
								jqTds[1].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[1] + '">';
								jqTds[2].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[2] + '">';
								jqTds[3].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[3] + '">';
								jqTds[4].innerHTML = '<a class="edit" href="">Save</a>';
								jqTds[5].innerHTML = '<a class="cancel" href="">Cancel</a>';
							}

							function saveRow(oTable, nRow) {
								var jqInputs = $('input', nRow);
								oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
								oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
								oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
								oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
								oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
								oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 5, false);
								oTable.fnDraw();
							}

							function cancelEditRow(oTable, nRow) {
								var jqInputs = $('input', nRow);
								oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
								oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
								oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
								oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
								oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
								oTable.fnDraw();
							}

							var table = $('#sample_editable_1');

							var oTable = table.dataTable({
								"lengthMenu": [
									[5, 15, 20, -1],
									[5, 15, 20, "All"] // change per page values here
								],
								// set the initial value
								"pageLength": 10,

								"language": {
									"lengthMenu": " _MENU_ records"
								},
								"columnDefs": [{ // set default column settings
									'orderable': true,
									'targets': [0]
								}, {
									"searchable": true,
									"targets": [0]
								}],
								"order": [
									[0, "asc"]
								] // set first column as a default sort by asc
							});

							var tableWrapper = $("#sample_editable_1_wrapper");

							tableWrapper.find(".dataTables_length select").select2({
								showSearchInput: false //hide search box with special css class
							}); // initialize select2 dropdown

							var nEditing = null;
							var nNew = false;

							$('#sample_editable_1_new').click(function (e) {
								e.preventDefault();

								if (nNew && nEditing) {
									if (confirm("Previose row not saved. Do you want to save it ?")) {
										saveRow(oTable, nEditing); // save
										$(nEditing).find("td:first").html("Untitled");
										nEditing = null;
										nNew = false;

									} else {
										oTable.fnDeleteRow(nEditing); // cancel
										nEditing = null;
										nNew = false;
										
										return;
									}
								}

								var aiNew = oTable.fnAddData(['', '', '', '', '', '']);
								var nRow = oTable.fnGetNodes(aiNew[0]);
								editRow(oTable, nRow);
								nEditing = nRow;
								nNew = true;
							});

							table.on('click', '.delete', function (e) {
								e.preventDefault();

								if (confirm("Are you sure to delete this row ?") == false) {
									return;
								}

								var nRow = $(this).parents('tr')[0];
								oTable.fnDeleteRow(nRow);
								alert("Deleted! Do not forget to do some ajax to sync with backend :)");
							});

							table.on('click', '.cancel', function (e) {
								e.preventDefault();

								if (nNew) {
									oTable.fnDeleteRow(nEditing);
									nNew = false;
								} else {
									restoreRow(oTable, nEditing);
									nEditing = null;
								}
							});

							table.on('click', '.edit', function (e) {
								e.preventDefault();

								/* Get the row as a parent of the link that was clicked on */
								var nRow = $(this).parents('tr')[0];

								if (nEditing !== null && nEditing != nRow) {
									/* Currently editing - but not this row - restore the old before continuing to edit mode */
									restoreRow(oTable, nEditing);
									editRow(oTable, nRow);
									nEditing = nRow;
								} else if (nEditing == nRow && this.innerHTML == "Save") {
									/* Editing this row and want to save it */
									saveRow(oTable, nEditing);
									nEditing = null;
									alert("Updated! Do not forget to do some ajax to sync with backend :)");
								} else {
									/* No edit in progress - let's start one */
									editRow(oTable, nRow);
									nEditing = nRow;
								}
							});

						}

					});
				});
			});
		</script>

	</body>
</html>