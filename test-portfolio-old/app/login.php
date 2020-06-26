<?php
	session_start();
 	print_r($_SESSION);
 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="shortcut icon" type="image/gif"  href="images/favicon.ico">
	<!--build:css css/vendor.min.css -->
	<link rel="stylesheet" type="text/html" href="components/normalize.css">
	<!--endbuild -->

	<!--build:css css/style.min.css -->
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/works.css">
	<link rel="stylesheet" href="css/contact.css">
	<!--endbuild-->

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Portfolio</title>
</head>
<body>
	<div class="wrapper">
		<main class="main">
			<div class="login-container">
				<div class="login-block">
					<span class="login-head">Авторизируйтесь</span>
					<form action="php/authorization.php" method="POST" class="login-form-container">
						<div class="login-form-element">
							<div class="qtip-container login-qtip">
								Вы не ввели логин
								<div class="qtip-arrow"></div>
							</div>
							<span class="login-form-inputname">
								Логин
							</span>
							<input type="text" class="login-form-input" name="login" placeholder="Введите логин">
						</div>
						<div class="login-form-element">
							<div class="qtip-container login-qtip">
								Вы не ввели пароль
								<div class="qtip-arrow"></div>
							</div>
							<span class="login-form-inputname pix151">
								Пароль
							</span>
							<input type="text" class="login-form-input" name="password" placeholder="Введите пароль">
						</div>
						<div class="login-form-element">
							<input class="login-form-submit-button" type="submit" value="Войти">
						</div>
					</form>
				</div>
			</div>
		</main>
		

		<footer class="footer">
		<div class="main-container clearfix">
			<?php
			if($_SESSION){
				if($_SESSION['login'] === "admin" && $_SESSION['password'] === "admin"){
					echo('<a href="login.php" class="footer-lock-active"></a>');
				}else{
					echo('<a href="login.php" class="footer-lock"></a>');
				};
			}else{
				echo('<a href="login.php" class="footer-lock"></a>');
			};
			session_destroy();
			 ?>	
			
			<span class="footer-copyright">&copy 2015. Это мой сайт, пожалуйста, не копируйте и не воруйте его</span>
		</div>
	</footer>
	</div>	
<!--build:js js/vendor.min.js -->
	<script type="text/javascript" src="components/jquery.min.js"></script>
	<script src="js/bpopup.js"></script>
	<script src="components/jquery.qtip.js"></script>
	<!--endbuild-->

	<!--build:js js/default.min.js-->
	<script src="js/main.js"></script>
	<script src="js/validation.js"></script>
	<script src="js/contact.js"></script>
	<script src="js/login.js"></script>
	<!--endbuild-->
</body>
</html>