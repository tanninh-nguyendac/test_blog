<?php

	session_start();
	include "../config/Config.php";
	include "../config/Model.php";
	include "../config/Controller.php";
	include "../config/RemoveUnicode.php";
	include "../config/Token.php";

	if(isset($_GET["act"]) && $_GET["act"]=="logout")
		unset($_SESSION["account"]); //logout

	if(isset($_SESSION['account'])) {
		$controller = isset($_GET["controller"])?"controllers/".$_GET["controller"]."Controller.php":"controllers/home.php"; //kiem tra co ton tai controller hay khong
		include "../layout/admin.php";
	}
	else {
		include "controllers/login.php";
	}

?>