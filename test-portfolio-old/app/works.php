<?php 
require_once('php/config.php');
session_start();		
 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/gif"  href="images/favicon.ico">
	<!--build:css css/vendor.min.css -->
	<link rel="stylesheet" type="text/html" href="components/normalize.css">
	<!-- <link rel="stylesheet" href="text/html" href="components/jquery.qtip.css"> -->
	<!--endbuild -->

	<!--build:css css/style.min.css -->
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/works.css">
	<link rel="stylesheet" href="css/contact.css">
	<!--endbuild-->

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Portfolio</title>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<div id="addNewItem" class="popup-wrapper">
		<div class="popup-addalert-content alert-box">
			<div class="popup-addalert-container  clearfix">
				<div class="popup-addalert-text ">
					<span class="popup-addalert-header-text">Ура!</span>
					<span class="popup-addalert-descript-text">Проект успешно добавлен.</span>
				</div>
				<img src="images/close-green.png" alt="" class="popup-error-close-button close-alert">
			</div>
		</div>
		<div class="popup-container">
			<div class="popup-header clearfix">
				<span class="popup-title">Добавление проекта</span>
				<img src="images/close-popup.png" alt="" class="popup-close b-close">
			</div>
			<form action="php/add_project.php" class="popup-form" enctype="multipart/form-data" method="POST">
				<div class="popup-error-container clearfix alert-box">
					<div class="popup-error-text ">
						<span class="popup-error-header-text">Ошибка!</span>
						<span class="popup-error-descript-text">Невозможно добавить проект.</span>
					</div>
					<img src="images/close1.png" alt="" class="popup-error-close-button close-alert">
				</div>
				<div class="popup-form-element">
					<div class="qtip-container">
						введите название
						<div class="qtip-arrow"></div>
					</div>
					<div class="popup-form-title">Название проекта</div>
					<input type="text" qtip-content="Введите название" class="popup-form-input input-val" name="projectName" placeholder="Введите название">
				</div>
				<div class="popup-form-element">
					<div class="qtip-container">
						картинку
						<div class="qtip-arrow"></div>
					</div>
					<div class="popup-form-title">Картинка проекта</div>
					<div class="popup-form-input-hide clearfix">
						<input type="text" class="popup-form-input-value input-val" id="img" name="img"  placeholder="Загрузите изображение">
						<input type="file" class="hide"  id="inputfile" name="file">
						<label class="popup-form-input-file" for="inputfile"></label>
					</div>
				</div>
				<div class="popup-form-element">
					<div class="qtip-container">
						ссылка на проект
						<div class="qtip-arrow"></div>
					</div>
					<div class="popup-form-title">URL проекта</div>
					<input type="text" class="popup-form-input input-val" name="projectURL" placeholder="Добавьте ссылку">
				</div>
				<div class="popup-form-element">
					<div class="qtip-container">
						описание проекта
						<div class="qtip-arrow"></div>
					</div>
					<div class="popup-form-title">Описание</div>
					<textarea class=" popup-form-textarea input-val" name="projectDescr" placeholder="Пара слов о Вашем проекте"></textarea>
				</div>
				<div class="g-recaptcha" data-sitekey="6LfeYV4UAAAAAP1-FnYbr6HrDwsACM4_ALDcoNx7"></div>
				<div class="popup-form-submit-container">
					<input type="submit" class="popup-submit-button" value="Добавить" name="submit">
				</div>
			</form>
		</div>
	</div>
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
							<li class="navigation-list-item"><a href="index.php" class="navigation-link">Обо мне</a></li>
							<li class="navigation-list-item active-nav pix2"><a href="works.php" class="navigation-link active-nav">Мои работы</a></li>
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
					<span class="main-head">Мои работы</span>
					<div class="underline"> </div>
					<div class="works-container">
						<div class="works-element-container">
							<div class="work-site-container">
								<div class="work-site-back">
									<a href="test" class="site-works-link-in">Test</a>
								</div>
							</div>
							<a href="test" class="works-site-link">Test</a>
							<span class="works-site-descript">Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum </span>
						</div>
					<?php

					$projData = 'SELECT * FROM projects';
					
					$projRes = $DB->query($projData);

					if($projRes->rowCount() > 0){
						$projBlocks = array();
						while ($row = $projRes->fetch()) {
							$projBlocks[] = $row;
						};
					};

					if (!empty($projBlocks)) {
						foreach ($projBlocks as $value) {
							echo '
								<div class="works-element-container">
									<div class="work-site-container" style="background-image:url('.'files'.strrchr($value['image'], '/').')">
										<div class="work-site-back">
											<a href="'.$value['url'].'" class="site-works-link-in">'.$value['name'].'</a>
										</div>
									</div>
									<a href="'.$value['url'].'" class="works-site-link">'.$value['url'].'</a>
									<span class="works-site-descript">'.$value['description'].'</span>
								</div>
									';
						};
					};
					if($_SESSION){
						if($_SESSION['login'] === "admin" && $_SESSION['password'] === "admin"){
							echo('
								<div class="works-element-container">
									<div class="work-site-add-container">
										<a href="" class="work-site-add-link">
										<img src="images/add-proj.png" alt="" class="work-site-add-img">
									Добавить проект</a>
									</div>
								</div>');
						};
					};
					?>
					</div>
					</div>
				</section>
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
	<!--endbuild-->
	
</body>
</html>