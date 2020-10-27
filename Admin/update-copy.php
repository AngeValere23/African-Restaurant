<?php

    include('functions.php');

	if (!isAdmin()) {
		$_SESSION['msg'] = "Vous devez vous connecter avant..!";
		header('location: login.php');
	}
    require '../database.php';

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }

    $nameError = $priceError = $descriptionError = $keywordsError = $categoryError = $imageError = $name = $price = $description = $keywords = $category = $image = "";

    if(!empty($_POST)) 
    {
        $name               = checkInput($_POST['name']);
        $price        		= checkInput($_POST['price']);
		$description        = checkInput($_POST['description']);
		$keywords	        = checkInput($_POST['keywords']);
        $category           = checkInput($_POST['categorie']); 
        $image              = checkInput($_FILES["image"]["name"]);
        $imagePath          = '../assets/images/resto-images/'. basename($image);
        $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
        $isSuccess          = true;
        $isSuccess          = true;
       
        if(empty($name)) 
        {
            $nameError = 'Ces champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($price)) 
        {
            $priceError = 'Ces champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($description)) 
        {
            $descriptionError = 'Ces champ ne peut pas être vide';
            $isSuccess = false;
		} 
		if(empty($keywords)) 
        {
            $keywordsError = 'Ces champ ne peut pas être vide';
            $isSuccess = false;
        }        
        if(empty($category)) 
        {
            $categoryError = 'Ces champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($image)) // le input file est vide, ce qui signifie que l'image n'a pas ete update
        {
            $isImageUpdated = false;
        }
        else
        {
            $isImageUpdated = true;
            $isUploadSuccess = true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
            {
                $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            // if(file_exists($imagePath)) 
            // {
            //     $imageError = "Le fichier existe deja";
            //     $isUploadSuccess = false;
            // }
            if($_FILES["image"]["size"] > 500000) 
            {
                $imageError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) 
                {
                    $imageError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
        }
         
        if (($isSuccess && $isImageUpdated && $isUploadSuccess) || ($isSuccess && !$isImageUpdated)) 
        { 
            $db = Database::connect();
            if($isImageUpdated)
            {
                $statement = $db->prepare("UPDATE products  set product_cat = ?, product_name = ?, product_price = ?, product_desc = ?, product_image = ?, product_keywords = ? WHERE id = ?");
                $statement->execute(array($category,$name,$price,$description,$image,$keywords,$id));
            }
            else
            {
                $statement = $db->prepare("UPDATE livres  set product_cat = ?, product_name = ?, product_price = ?, product_desc = ?, product_keywords = ? WHERE id = ?");
                $statement->execute(array($category,$name,$price,$description,$keywords,$id));
            }
            Database::disconnect();
            header("Location: products.php");
        }
        else if($isImageUpdated && !$isUploadSuccess)
        {
            $db = Database::connect();
            $statement = $db->prepare("SELECT * FROM products where id = ?");
            $statement->execute(array($id));
            $item = $statement->fetch();
            $image          = $item['product_image'];
            Database::disconnect();
           
        }
    }
    else 
    {
        $db = Database::connect();
        $statement = $db->prepare("SELECT * FROM products where id = ?");
        $statement->execute(array($id));
        $item = $statement->fetch();
        $name               = $item['product_name'];
        $price        		= $item['product_price'];
		$description        = $item['product_desc'];
		$keywords	        = $item['product_keywords'];
        $category           = $item['product_cat']; 
        $image              = $item["product_image"];
        Database::disconnect();
    }

    function checkInput($data) 
    {
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
		<title>Admin - Modifier</title>
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
    
    <body>
            <!-- WRAPPER -->
        <div id="wrapper" class="clearfix">
            
			<aside id="aside">

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
                    <h1>Modifier Un livre</h1>
                    <ol class="breadcrumb">
                        <li><a href="bdd-livre.php">Livres</a></li>
                        <li class="active">Voir Livre</li>
                    </ol>
                </header>
                <!-- /page title -->

                <div id="content" class="padding-20">
                    <div id="panel-1" class="panel panel-default">
                        <div class="panel-heading">
                            <span class="title elipsis">
                                <strong>Modifier un Livre existant</strong>
                            </span>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <form class="form" action="<?php echo 'update-copy.php?id='.$id;?>" role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="name">Nom du produit:</label>
                                            <input type="text" class="form-control" name="name" placeholder="Nom du produit" value="<?php echo $name;?>">
                                            <span class="help-inline"><?php echo '<strong><font color="red">'.$nameError."</font>";?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Prix: (en $)</label>
                                            <input type="text"  class="form-control" name="price" placeholder="Prix du produit" value="<?php echo $price;?>">
                                            <span class="help-inline"><?php echo '<strong><font color="red">'.$priceError."</font>";?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <input type="text"  class="form-control"  name="description" placeholder="description du produit" value="<?php echo $description;?>">
                                            <span class="help-inline"><?php echo '<strong><font color="red">'.$descriptionError."</font>";?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="keywords">Mot clé</label>
                                            <input type="text"  class="form-control"  name="keywords" placeholder="Mots clés" value="<?php echo $keywords;?>">
                                            <span class="help-inline"><?php echo '<strong><font color="red">'.$keywordsError."</font>";?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="categorie">Categorie:</label>
                                            <select class="form-control"  name="categorie" >
                                            <?php
                                            $db = Database::connect();
                                            foreach ($db->query('SELECT * FROM categories') as $row) 
                                            {
                                                    echo '<option value="'. $row['id'] .'">'. $row['name'] . '</option>';;
                                            }
                                            Database::disconnect();
                                            ?>
                                            </select>
                                            <span class="help-inline"><?php echo '<strong><font color="red">'.$categoryError."</font>";?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Image:</label>
                                            <p><?php echo ' ' . '<img src="../assets/images/resto-images/' . $item['product_image'] . '" width="50" alt="">'; ?></p>
                                            <label for="image">Sélectionner une nouvelle image:</label>
                                            <input type="file" id="image" name="image"> 
                                            <span class="help-inline"><?php echo $imageError;?></span>
                                        </div>  
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
                                            <a class="btn btn-blue" href="products.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="shop-item ">
									<ul class="row list-inline">
										<li class="col-sm-6 col-md-4 thumbnail  relative clearfix mb-40">									
											<img src="../assets/images/resto-images/<?php echo $item['product_image']; ?>" width="500   " alt="">																					
										</li>
									</li>
								</div>
                            </div>
                        </div>
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
