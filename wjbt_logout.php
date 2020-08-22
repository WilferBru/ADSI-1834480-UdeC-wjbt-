<?php
session_start();
$SESSION = array();
if (ini_get("session.use_cookies")) {
	$params = session_get_cookie_params();
	setcookie(session_name(), '', time() - 42000,
	    $params["path"], $params["domain"], 
		$params["secure"], $params["httponnly"]
	);	
}
session_destroy();
header("Location:wjbt_login.php");
?>