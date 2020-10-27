<?php

    require_once 'database.php';
	$db = Database::connect();
    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
	}

	if(!empty($_POST['f_name']) AND !empty($_POST['l_name']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['repassword']) AND !empty($_POST['mobile']) AND !empty($_POST['address']) AND !empty($_POST['postalCode'])){
		$f_name = checkInput($_POST['f_name']);
		$l_name = checkInput($_POST['l_name']);
		$email = checkInput($_POST['email']);
		$password = md5($_POST['password']);
		$repassword = md5($_POST['repassword']);
		$mobile = checkInput($_POST['mobile']);
		$address = checkInput($_POST['address']);
		$postalCode = checkInput($_POST['postalCode']);	
		$name = "/^[a-zA-Z ]+$/";
		$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
		$number = "/^[0-9]+$/";

		if(preg_match($number,$mobile)){
			if((strlen($mobile) == 10)){
				if(!(strlen($password) < 6 )){
					$maillength = strlen($email);
					if ($maillength <= 255) {
						if (filter_var($email, FILTER_VALIDATE_EMAIL)) {									
							$reqmail = $db->prepare("SELECT * FROM user_info WHERE email = ?");
							$reqmail->execute(array($email));
							$mailexist = $reqmail->rowCount();
							if ($mailexist == 0) {								
								if ($password == $repassword) {
									$insertmembre = $db->prepare("INSERT INTO user_info (first_name, last_name, email, password, mobile, address, postal_code) VALUES (?,?,?,?,?,?,?)");
									$insertmembre->execute(array($f_name, $l_name, $email, $password, $mobile, $address, $postalCode));
									$valider = "Votre compte a bien été créé, <a href=\" login_form.php\">Me connecter !</a>";
									//header('Location: index.html');

								} else {
									$erreur= "Les mots de passe ne correspondent pas ou faible..!";
								}
							} else {
								$sameMail= "Adresse email déjà utilisé";
							}	
						}else {
							$erreur= "Votre courriel n'est pas valide!";
						}
					} else {
						$erreur= "Votre email ne doit pas depasser 255 caractères!";
					}					
				} else {
					$erreur= "Le mot de passe est faible..!";
				}
			} else {
				$erreur= "Le numero doit avoir 10 chiffres";
			}	
		} else {
			$erreur= "Le numero $mobile n'est pas valide!";
		}
	}else{
		$erreur= "Veuillez remplir tous les <strong>champs</strong>!";
	}


?>
<!DOCTYPE html>
<html>
	<head>
		<title>Les Aliments Mere Anto - Créer un compte</title>
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
			<!-- ACCOUNT -->
			<section>
				<div class="container-fluid"> 
					<div class="wait overlay">
						<div class="loader"></div>
					</div>
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8" id="signup_msg">
								<!--Alert from signup form-->
							</div>
							<div class="col-md-2"></div>
						</div>
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<div class="panel panel-primary">
									<div class="panel-heading">Formulaire d'inscription</div>
									<div class="panel-body">
									
										<form id="signup_form" action="#" method="post">
											<div class="row">
												<div class="col-md-6">
													<label for="f_name">Prenom</label>
													<input type="text" id="f_name" name="f_name" class="form-control" value="<?php if (isset($f_name)) {echo $f_name; } ?>" required>
												</div>
												<div class="col-md-6">
													<label for="f_name">Nom</label>
													<input type="text" id="l_name" name="l_name" class="form-control" value="<?php if (isset($l_name)) {echo $l_name; } ?>" required>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<label for="email">Email</label>
													<input type="email" id="email" name="email" class="form-control" value="<?php if (isset($email)) {echo $email; } ?>" required>
												</div>											
												<div class="col-md-6">
													<label for="mobile">Téléphone</label>
													<input type="text" id="mobile" name="mobile" class="form-control" value="<?php if (isset($mobile)) {echo $mobile; } ?>" required>
												</div>										
											</div>
											<div class="row">
												<div class="col-md-12">
													<label for="password">Mot de Passe</label>
													<input type="password" id="password" name="password" class="form-control">
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<label for="repassword">Confirmation de Mot de passe</label>
													<input type="password" id="repassword" name="repassword" class="form-control">
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<label for="address">Addresse complète</label>
													<input type="text" id="address1" name="address" class="form-control" value="<?php if (isset($address)) {echo $address; } ?>" required>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<label for="postalCode">Code Postal</label>
													<input type="text" id="p_c" name="postalCode"class="form-control" value="<?php if (isset($postalCode)) {echo $postalCode; } ?>" required>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 center">
													<input style="width:100%;" value="S'INSCRIRE" type="submit" name="signup_button"class="btn btn-success btn-lg">
												</div>
											</div>							
										
										</form>
										<?php
											if (isset($erreur)) {
												echo '<font class="alert alert-mini alert-warning mb-30">'. $erreur. '</font>';
											}
											elseif (isset($valider)) {
												echo $valider;
											} elseif (isset($sameMail)) {
												echo '<font color="red">'.$sameMail. '<a href="login.php">'. " Connectez-vous!" . ' </a>' . '</fony>';
											}
										?>
									</div>
									<div class="panel-footer"></div>
								</div>
							</div>
							<div class="col-md-2"></div>
						</div>
					</div>
				</div>	
			</section>
			<!-- /ACCOUNT -->
		</div>
	</body>
</html>





















