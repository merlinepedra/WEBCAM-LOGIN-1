<?php
require_once('autoload.php');

if(!isset($_POST['email'])){
	echo json_encode(
		array(
			'val' => false, 
			'responseText' => 'Not all fields were filled out.'
		)
	);
	die();
}

if(!isset($_SESSION['webcam_login_session'])){
	echo json_encode(
		array(
			'val' => false, 
			'responseText' => 'You need to be logged in to do that.'
		)
	);
	die();
}

$user = explode(';', $_SESSION['webcam_login_session'])[1];
$email = $_POST['email'];

$change = new FaceRecognition($user);
$res = $change->changeMail($mail);

echo json_encode($res);
die();
?>