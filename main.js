$(document).ready(function(){
	cat();
	brand();
	product();
	//cat() is a funtion fetching category record from database whenever page is load
	function cat(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{category:1},
			success	:	function(data){
				$("#get_category").html(data);
				
			}
		})
	}
	//brand() is a funtion fetching brand record from database whenever page is load
	function brand(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{brand:1},
			success	:	function(data){
				$("#get_brand").html(data);
			}
		})
	}
	//product() is a funtion fetching product record from database whenever page is load
		function product(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{getProduct:1},
			success	:	function(data){
				$("#get_product").html(data);
			}
		})
	}
}) 

{/* <li>
<?php
	if(isset($_SESSION['id']) AND $user['id'] == $_SESSION['id']){												
		echo '<a class="external" href="#"><i class="glyphicon glyphicon-user"></i> </a>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>'. $user['first_name']." ". $user['last_name'] .'</a>
			<ul class="dropdown-menu">
				<li><a href="panier.php" style="text-decoration:none; "><i class="fa fa-shopping-cart"></i>Panier</a></li>
				<li class="divider"></li>
				<li><a href="customer_order.php" style="text-decoration:none; "><i class="fa fa-briefcase"></i>Mes Commandes</a></li>									
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

</li>    */}