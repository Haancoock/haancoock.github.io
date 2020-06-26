<?php 
require('config.php');
$data = array();
$image = new \claviska\SimpleImage();
$name = $_POST['projectName'];
$url = $_POST['projectURL'];
$descript = $_POST['projectDescr'];
$file = $_POST['img'];
$fileD = $_FILES['file'];
$gCaptcha = $_POST['g-recaptcha-response'];
$captchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
$captchaKey = '6LfeYV4UAAAAAP6Y8SMAlEnNTi6wNijpW1OtgOld';
$captchaQuery = $captchaUrl.'?secret='.$captchaKey.'&response='.$gCaptcha.'&remoteip='.$_SERVER['REMOTE_ADDR'];
$gData = json_decode(file_get_contents($captchaQuery));


if ($name === '' || $url === '' || $file === '' || $descript === '' || empty($fileD['name']) || !$gCaptcha || $gData->success == false) {
		$data['mes'] = 'error';
}else{

	if (!file_exists('../files')) {
		mkdir('../files', 777);
	};

	if($fileD['type'] !== 'image/gif' && $fileD['type'] !== 'image/jpeg' && $fileD['type'] !== 'image/png'){
		$data['mes'] = 'error';
	}else{
		//создание имени для картинки, защита от перезаписи
		$type = strtolower(strrchr($fileD['name'], '.')); // взятие типа файла 
		$fileName = md5(uniqid(rand(10000, 99999)));
		$fileNameCopy = $fileName.'_copy';
		//указание пути сохранения файла
		$fileDist = $_SERVER['DOCUMENT_ROOT'].'/portf/test-portfolio-old/app/files/'.$fileName.$type;
		$fileDistCopy = $_SERVER['DOCUMENT_ROOT'].'/portf/test-portfolio-old/app/files/'.$fileNameCopy.$type;
		if($fileD['size'] == 0 || $fileD['size'] > 2097152){
			$data['mes'] = 'error';
		}else{
			if (!move_uploaded_file($fileD['tmp_name'], $fileDist)) {
				$data['mes'] = 'error';
			}else{
				$data['mes'] = 'Ok';
				$image -> fromFile($fileDist) -> resize(180, 135) -> toFile($fileDist);
				
			};
		};
	};
	$ar = array('name' => $name, 'image' => $fileDist, 'url' => $url, 'description' => $descript);

	$sql = 'INSERT INTO `projects`(`name`, `image`, `url`, `description`, `date`) VALUES(:name, :image, :url, :description, NOW())';
	$res = $DB->prepare($sql);
	$res->execute($ar);
};


header("Content-Type", "application/JSON");
echo json_encode($data);
exit;
 ?>