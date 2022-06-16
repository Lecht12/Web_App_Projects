<?php
	session_start();
    include "data_management/connection.php";
	include "auth/auth.php";
	$host	=	"localhost:3309";
    $user	=	"root";
    $pass	=	"";
    $bdd	=	"gestion_stock";
    $table 	= 	'users_stock';
    $con 	=	connection($host,$user,$pass,$bdd);
	$i      = 1 ;
#---------------------------------------------------------#
    if(isset($_POST['login']))
    {
        $log    = get_data('username');
        $pass   = get_data('pass');
        $statut = select_user($table,$con,$log,$pass);
        $erreur = check($statut);
        if($erreur == "") 
		{
			redirect($statut);
			$_SESSION["fonction"] = select_function($table,$con,$log,$pass);
			$_SESSION["visiters"] = $i++;
		}
		
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="login_v20/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_v20/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_v20/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_v20/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_v20/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login_v20/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_v20/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_v20/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login_v20/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_v20/css/util.css">
	<link rel="stylesheet" type="text/css" href="login_v20/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-b-160 p-t-50">
				<form action="" method="post" class="login100-form validate-form">
					<span class="login100-form-title p-b-43">
						Connection
					</span>
					
					<div class="wrap-input100 rs1 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username">
						<span class="label-input100">Login</span>
					</div>
					
					
					<div class="wrap-input100 rs2 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass">
						<span class="label-input100">Mot de passe</span>
					</div>

					<div class="container-login100-form-btn">
					<input type="submit" value="Connexion" name="login" class="login100-form-btn">
					</div>
					
					<div class="text-center w-full p-t-23">
						<a href="#" class="txt1">
							oublier le mot de passe 
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
<!--===============================================================================================-->
	<script src="login_v20/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login_v20/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login_v20/vendor/bootstrap/js/popper.js"></script>
	<script src="login_v20/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login_v20/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login_v20/vendor/daterangepicker/moment.min.js"></script>
	<script src="login_v20/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login_v20/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login_v20/js/main.js"></script>

</body>
</html>
