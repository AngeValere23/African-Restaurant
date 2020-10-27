<?php
	session_start();

	require_once 'database.php';
	$db = Database::connect();
	if (isset($_SESSION["id"])) {
		header("location:checkout.php");
	}
	if (isset($_POST["login_user_with_product"])) {
		//this is product list array
		$product_list = $_POST["id"];
		//here we are converting array into json format because array cannot be store in cookie
		$json_e = json_encode($product_list);
		//here we are creating cookie and name of cookie is product_list
		setcookie("product_list",$json_e,strtotime("+1 day"),"/","","",TRUE);	
	}

	if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
	}
	if (isset($_POST['loginform'])) {
		$maillogin = htmlspecialchars($_POST['email']);
		$passwordlogin = md5($_POST['password']);
		if(!empty($_POST['email']) AND !empty($_POST['password'])){
			$requser = $db->prepare("SELECT * FROM user_info WHERE email = ? AND password = ?");
			$requser->execute(array($maillogin, $passwordlogin));			
			$userexist = $requser->rowCount();
			if ($userexist == 1) {
				$userinfo = $requser->fetch();
				$_SESSION['id'] = $userinfo['user_id'];
				$_SESSION['name'] = $userinfo['first_name'];
				$_SESSION['email'] = $userinfo['email'];
				$_SESSION['address'] = $userinfo['address'];
				$_SESSION['mobile'] = $userinfo['mobile'];				
				$_SESSION['flash']['success'] = 'Vous êtes maintenant connecté!';
				header('Location: profile.php?name='.$_SESSION['name']);
			}
			else {
				$alertmsg="Le <strong>nom d'utilisateur</strong> et/ou <strong>le mot de passe est incorrect!</strong> ";
			}	
		}
		else {
			$erreur="Veillez remplir les champs pour vous connecter!";
		}		
	}
	$db = Database::disconnect();
	
	// function checkInput($data) 
    // {
    //   $data = trim($data);
    //   $data = stripslashes($data);
	//   $data = htmlspecialchars($data);
    //   return $data;
    // }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Les Aliments Mere Anto - Se connecter</title>
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
		<!-- LOGIN -->
		<section>
				<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8" id="signup_msg">
					<!--Alert from signup form-->
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading"><i class="fa fa-users"> Formulaire de connextion</i></div>
						<div class="panel-body">
							<!--User Login Form-->
							<form action="#" method="POST" >
								<label for="email">Email</label>
								<input type="email" class="form-control" name="email" id="email"  value="<?php if (isset($maillogin)) {echo $maillogin; } ?>" required/>								
								<label for="email">Mot de passe</label>
								<input type="password" class="form-control" name="password" id="password" required/>																
								<a href="#" style="color:#333; list-style:none;">Mot de passe oublié?</a>								
								<!--If user dont have an account then he/she will click on create account button-->							
								<div><a href="register.php">Créer un nouveau compte?</a></div>	
								<input type="submit" name="loginform" class="btn btn-success" style="float:right;" Value="Se connecter">					
							</form>							
						</div>
					</div>
					<?php
						if (isset($erreur)) {
							echo '<font class="alert alert-mini alert-danger mb-30">'. $erreur. '</font>';
						}
						elseif (isset($alertmsg)) {
							echo '<font class="alert alert-mini alert-danger mb-30">'. $alertmsg. '</font>';
						}

					?>
				</div>
			</div>
			<div class="col-md-4"></div>				
		</div>	
		</section>		
	</div>
		<?php
			include_once 'master_page/script.php';
		?>
</body>
</html>






















