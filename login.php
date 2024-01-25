<!DOCTYPE html>
<?php
include 'includes/config/_config.php';
function setLoginwwid($wwid)
{
	$redirect_url = isset($_GET['redirect']) && !empty($_GET['redirect']) ? $_GET['redirect'] : '';
	$db = new Db();
	
	$sql = "SELECT Idsid,WWID FROM `Recognition`.`hspe_employees` WHERE `WWID`='$wwid'";
	$readuser	=  $db->select($sql);
	$idsid = $readuser[0]['Idsid'];
	$pass = 0;
	$id = "";
	$msg = "";

	if ($readuser[0]['WWID'] === $wwid) {
		$pass	=	1;
		$id 	=	$idsid;
	} else {
		/* if(!insertNewSubscribers($idsid)){
			require_once "templates/home.php";
			exit();
		}else{
			$pass	=	1;
			$id 	=	$idsid; //BB-VALID cookie id
		} */
		setcookie('IDSID', $idsid, time() + (86400 * 30), "/");
		require_once "templates/home.php";
		exit();
		/* if(!is_bb($idsid)){
			require_once "templates/401.php";
			exit();
		}else{
			$pass	=	1;
			$id 	=	$idsid; //BB-VALID cookie id
		} */
	}
	if ($pass == 1) {
		setcookie('IDSID', $id, time() + (86400 * 30), "/");
		$_SESSION['id'] = $id;
		if (!empty($redirect_url)) {
			$redirect_url1 = urldecode($redirect_url);
			header("location:$redirect_url1");
		} else {

			header("location:imet_home.php");
		}
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
