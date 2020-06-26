<?php 
session_start();
require_once('bd.php');
$data = array();
$login = $_POST['login'];
$password = $_POST['password'];

$userData = $DB->prepare('SELECT login, password FROM admins');
$userData->execute();
if ($userData->rowCount() > 0) {
	$userResArray = array();
	while ($row = $userData->fetch()) {
		$userResArray[] = $row;
	}
}

if (!$userResArray) {
	$data['mess'] = 'error in PDO';
}else{
	foreach ($userResArray as $value) {
		if ($value['login'] === $login && $value['password'] === $password) {
			$data['mess'] = 'done';
			$_SESSION['login'] = $login;
			$_SESSION['password'] = $password;
		};
	};
};

header("Content-Type", "application/JSON");
echo json_encode($data);
 ?>