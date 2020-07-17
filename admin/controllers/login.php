<?php

	class login extends Controller{

		public function __construct(){

			parent::__construct();

			if($_SERVER["REQUEST_METHOD"] == "POST"){ //kiem tra xem co phuong thuc post hay khong

				$email = $_POST["email"];
				$password = $_POST["password"];

				$check = $this->Model->fetchOne("select * from users where email='$email'"); //kiem tra xem co ton tai email nguoi dung hay khong

				if( isset($check["email"]) ) { //kiem tra tai email va pass co trung trong csdl hay khong
					if( md5($password) == $check["password"] ){
						$_SESSION["account"] = $email;
						$_SESSION["name"] = $check["name"];
						header("location: index.php");
					}
				}

			}

			include "views/login.php";
		}

	}
	new login();

?>