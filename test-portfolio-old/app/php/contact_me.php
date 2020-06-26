<?php
require_once 'config.php';
$dataAns = array();
$gCaptcha = $_POST['g-recaptcha-response'];
$captchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
$captchaKey = '6LfeYV4UAAAAAP6Y8SMAlEnNTi6wNijpW1OtgOld';
$captchaQuery = $captchaUrl.'?secret='.$captchaKey.'&response='.$gCaptcha.'&remoteip='.$_SERVER['REMOTE_ADDR'];
$gData = json_decode(file_get_contents($captchaQuery));
$data= array();
foreach ($_POST as $key => $value) {
	$data[$key] = $value;
};

if ( $gData->success == false){
	exit('Misha...');
}else{
	validateForm($data);
	$body = '';
	$dataAns['mess'] = 'done';
	foreach ($data as $key => $value) {
		$data[$key] = strip_tags(trim($value));
		$body .= '<p><strong>'.$key.': </strong> '. $value . '</p>';
	}

$result = sendEmail($data['name'], $data['email'], $sub = 'Theme', $body);
header("Content-Type", "application/JSON");

}
echo json_encode($dataAns);
?>
