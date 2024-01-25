<!DOCTYPE html>
<?php
include 'includes/config/_config.php';
function setLoginwwid($wwid)
{
	
	$db = new Db();
	
	$sql = "SELECT Idsid,WWID FROM `Recognition`.`hspe_employees` WHERE `WWID`='$wwid'";
	$readuser	=  $db->select($sql);
	$idsid = $readuser[0]['Idsid'];
	

	if ($readuser[0]['WWID'] === $wwid) {
		$pass	=	1;
		$id 	=	$idsid;
	} 
	if ($pass == 1) {
		setcookie('IDSID', $id, time() + (86400 * 30), "/");
		$_SESSION['id'] = $id;
	}
}
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Login</title>
</head>
<body>
	<span style='color:#0071c5;font-size:20px;'>Authentication in progress, please wait...</span>
</body>

</html>
