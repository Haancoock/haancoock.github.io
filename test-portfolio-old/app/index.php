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
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="css/works.css">
	<link rel="stylesheet" href="css/contact.css">
	<!--endbuild-->

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Portfolio</title>
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
							<li class="navigation-list-item active-nav pix2"><a href="index.php" class="navigation-link active-nav">Обо мне</a></li>
							<li class="navigation-list-item"><a href="works.php" class="navigation-link">Мои работы</a></li>
							<li class="navigation-list-item"><a href="contact.php" class="navigation-link">Связаться со мной</a></li>
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
					<div class="main-content-container">
						<span class="main-head">Основная информация</span>
						<div class="underline"> </div>
						<div class="main-info-container clearfix">
							<div class="avatar-container">
								<img src="images/avatar-ph.jpg" alt="" class="avatar">
							</div>
							<div class="detail-info-container">
								<ul class="detail-info-list clearfix">
									<li class="detail-info-item"><span class="detail-info-title">Меня зовут:</span><span class="detail-info-text">   Иванов Андрей Степанович</span></li>
									<li class="detail-info-item"><span class="detail-info-title">Мой возраст:</span><span class="detail-info-text">25 лет</span></li>
									<li class="detail-info-item"><span class="detail-info-title">Мой город:</span><span class="detail-info-text">Санкт-Петербург, Россия</span></li>
									<li class="detail-info-item"><span class="detail-info-title">Моя специализация:</span><span class="detail-info-text">FRONTEND разработчик</span></li>
									<li class="detail-info-item clearfix"><span class="detail-info-title float-left">Ключевые навыки:</span><span class="detail-info-text float-right detail-skills"> 
									<span class="detail-info-skills">html</span>
									<span class="detail-info-skills">css</span>
									<span class="detail-info-skills">javascript</span>
									<span class="detail-info-skills">gulp</span>
									<span class="detail-info-skills">git</span>
									</span></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="main-content-container">
						<span class="main-head">Опыт работы</span>
						<div class="underline"></div>
						<div class="main-exp-container clearfix">
							<div class="main-exp-logo float-left"></div>
							<div class="main-exp-text float-right">
								<div class="main-exp-title">"ИП Боровицкий" - Продавец дисков</div>
								<div class="main-exp-date">Сентябрь 2005 - Август 2008</div>
							</div>
						</div>
						<div class="main-exp-container clearfix">
							<div class="main-exp-logo float-left"></div>
							<div class="main-exp-text float-right">
								<div class="main-exp-title">"ООО Системы безопасности" - Системный администратор</div>
								<div class="main-exp-date">Июнь 2008 - Июль 2010</div>
							</div>
						</div>
					</div>
					<div class="main-content-container">
						<span class="main-head">Образование</span>
						<div class="underline"></div>
						<div class="main-educ-container clearfix">
							<div class="main-educ-logohat float-left"></div>
							<div class="main-educ-text float-right">
								<div class="main-educ-title">Незаконченное высшее. СПБГУ ИТМО</div>
								<div class="main-educ-date">Октябрь 2012 - по настоящее время</div>
							</div>
						</div>
						<div class="main-educ-container clearfix">
							<div class="main-educ-logopage float-left"></div>
							<div class="main-educ-text float-right">
								<div class="main-educ-title">Курсы Lofschool.ru</div>
								<div class="main-educ-date">Ноябрь 2014 - по настоящее время</div>
							</div>
						</div>

					</div>
				</section>

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
			 ?>	
			<span class="footer-copyright">&copy 2015. Это мой сайт, пожалуйста, не копируйте и не воруйте его</span>
		</div>
		
	</footer>
	</div>
	</div>	









		
	
</body>
</html>