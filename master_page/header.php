<?php
    require_once 'login.php';
    require_once 'panier.class.php';
	$db = Database::connect();
	$panier = new Panier($db);

	if (isset($_SESSION['id'])) {
		$requser = $db->prepare("SELECT * FROM user_info WHERE user_id = ?");
		$requser->execute(array($_SESSION['id']));
		$user = $requser->fetch();
	}
?>
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
                         <li>
<?php
		if (isset($_SESSION["id"])) {           
       												
		echo '
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user "></span> Bonjour, '. $user['first_name'] .'</a>
			<ul class="dropdown-menu">
				<li><a href="panier.php" style="text-decoration:none; "><i class="fa fa-shopping-cart"></i>Panier</a></li>
				<li class="divider"></li>
				
				<li><a href="logout.php" style="text-decoration:none; "><i class="fa fa-sign-out"></i>Deconnexion</a></li>
			</ul>
        ';	
        										
	}
	else {
		echo '
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"> CONNEXION</i></a>
		<ul class="dropdown-menu">
			<div style="width:300px;">
				<div class="quick-cart-box" style="background-color: #333333; color:white;">
					<div class="panel-heading">
						<form action="#" method="POST" >
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email" id="email" required/>
							<label for="email">Password</label>
							<input type="password" class="form-control" name="password" id="password" required/>
							<a href="register.php" style="color:white; list-style:none;">Pas de compte? Créez-en un</a><br/>
							<input type="submit" name="droplogin" class="btn btn-success" value="Se connecter" style="float:right;">
						</form>
						
					</div>';
					
							if (isset($erreur)) {
								echo '<font color="red">'.$erreur."</font>";
							}
							elseif (isset($alertmsg)) {
								echo '<font color="red">'.$alertmsg."</font>";
							}

					
					echo'<div class="panel-footer" id="e_msg"></div>
				</div>
			</div>
		</ul>';
			
	}
?>	

</li>
                    </ul>
                </nav>
            </div>

        </div>
    </header>
    <!-- /Top Nav -->

</div>