<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/gif"  href="images/favicon.ico">
	<!--build:css css/vendor.min.css -->
	<link rel="stylesheet" type="text/html" href="components/normalize.css">
	<!--endbuild -->

	<!--build:css css/style.min.css -->
	<link rel="stylesheet" href="css/contact.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="css/works.css">
	<!--endbuild-->

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Portfolio</title>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<div class="wrapper">
		<header class="header">
			<div class="container clearfix">
				<a href="index.php" class="logo">
					<img src="images/logo.png" alt="" class="logo-img">
				</a>
				<ul class="socials">
					<li class="socials-item"><a href="http://vk.com" target="_blank" class="socials-item-link vk"></a></li>
					<li class="socials-item"><a href="http://twitter.com" class="socials-item-link tweet" target="_blank"></a></li>
					<li class="socials-item"><a href="http://facebook.com" class="socials-item-link fb" target="_blank"></a></li>
					<li class="socials-item"><a href="http://github.com" class="socials-item-link git" target="_blank"></a></li>
				</ul>
			</div>
		</header>
		<main class="main">
			<div class="main-container clearfix">
				<aside class="sidebar">
					<nav class="navigation">
						<ul class="navigation-list">
							<li class="navigation-list-item "><a href="index.php" class="navigation-link ">Обо мне</a></li>
							<li class="navigation-list-item"><a href="works.php" class="navigation-link">Мои работы</a></li>
							<li class="navigation-list-item active-nav pix4"><a href="contact.php" class="navigation-link active-nav">Связаться со мной</a></li>
						</ul>
					</nav>
					<div class="contacts">
						<h2 class="contacts-header">
							Контакты
						</h2>
						<ul class="contacts-list">
							<li class="contact-list-item mail-item clearfix">
								<div class="contacts-maillogo">
									
								</div>
								<a href="mailto:example@link.com" class="contacts-mail">
									pochta@mail.ru
								</a>
							</li>
							<li class="contact-list-item phone-item clearfix">
								<div class="contacts-phonelogo">
									
								</div>
								<a href="tel:+9123125324" class="contacts-phone">
									+123456789123
								</a>
							</li>
							<li class="contact-list-item skype-item clearfix">
								<div class="contacts-skypelogo">
									
								</div>
								<a href="skype:example" class="contacts-skype">
									nickname
								</a>
							</li>
						</ul>
					</div>
				</aside>
				<section class="main-content">
					<div class="popup-addalert-content alert-box">
						<div class="popup-addalert-container  clearfix">
							<div class="popup-addalert-text ">
								<span class="popup-addalert-header-text">Готово!</span>
								<span class="popup-addalert-descript-text">Сообщение успешно отправлено.</span>
							</div>
							<img src="images/close-green.png" alt="" class="popup-error-close-button close-alert">
						</div>
					</div>
					<div class="main-content-container contact-container-padding">
						<span class="contact-header">У вас интересный проект? Напишите мне</span>
						<form action="php/contact_me.php" class="contact-content-form">
							<div class="contact-info-container clearfix">
								<div class="contact-info-element float-left">
									<div class="qtip-container top30">
										Вы не ввели имя
										<div class="qtip-arrow"></div>
									</div>
									<span class="contact-head-text">Имя</span>
									<input type="text" class="contact-input" name="name" placeholder="Как к Вам обращаться">
								</div>
								<div class="contact-info-element float-right">
									<div class="qtip-container top30 right-qtip">
										Вы не ввели email
										<div class="qtip-arrow right-arrow"></div>
									</div>
									<span class="contact-head-text">Email</span>
									<input type="text" class="contact-input" name="email" placeholder="Куда мне писать">
								</div>
							</div>
							<div class="contact-info-textarea">
								<div class="qtip-container top30">
										Ваш вопрос
										<div class="qtip-arrow"></div>
								</div>
								<span class="contact-head-text">Сообщение</span>
								<textarea name="message" id="" cols="30" rows="10" class="contact-msg" placeholder="Кратко в чем суть"></textarea>
							</div>
							<div class="contact-info-container clearfix mbot">
								<span class="contact-head-text">Пройдите рекапчу</span>
								<div class="g-recaptcha" data-sitekey="6LfeYV4UAAAAAP1-FnYbr6HrDwsACM4_ALDcoNx7"></div>
							</div>
							<div class="contact-buttons clearfix">
								<input type="submit" class="contact-submit-button float-left" value="Отправить">
								<input type="reset" class="contact-reset-button float-right" value="Очистить">
							</div>
						</form>
				</div> 
				</section>
			</div>

		</main><footer class="footer">
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
	<!--endbuild-->
	
</body>
</html>