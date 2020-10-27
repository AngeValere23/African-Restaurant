<?php
	require_once 'database.php';
	$db = Database::connect();
	
    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
	}

	if (isset($_POST['droplogin'])) {
		$maillogin = checkInput($_POST['email']);
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
	
	function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
	  $data = htmlspecialchars($data);
      return $data;
    }
	
?>