<?php
require("../../config/nuke_library.php");
$token_admin 	= '1abc18908aa11001';
$token_admin2 = '200a11abc18908aa11001';

$iduser 					= $_POST['iduser'];
$passwordfrm 			= $_POST['dash_newpass'];
$privilege_level 	= $_POST['privilege_level'];

$password  = sha1($passwordfrm);
$password2 = sha1($password);
$password3 = md5($password2.'U100101U');
$password4 = sha1($password3);
$password5 = sha1($password4.'U100101U');

$query = $db->query("
	UPDATE `1001ti14_vi3w2014` 
	SET 
		`B10010289` = AES_ENCRYPT('$password5','$token_admin2'), 
		`id_master_privilege` = '".$privilege_level."'
	WHERE 
		`id`='$iduser'
");

if($query):
	echo 200;
else:
	echo 300;
endif;
?>