<?php
include "database/db.php";
include "database/account_class.php";
include "database/cart_class.php";

session_start();
$db = new Database();
$account = new account();
$cart = new cart();


#Login script is begin here
#If user given credential matches successfully with the data available in database then we will echo string login_success
#login_success string will go back to called Anonymous funtion $("#login").click() 

if (isset($_POST["email"]) && isset($_POST["password"])) {
	$email = $_POST["email"];
	$password = $_POST["password"];

	$result = $account->checkLoginUser($email, $password);
	$count = $result["count"];
	$row = $result["row"];
	$ip_add = getenv("REMOTE_ADDR");

	if ($count == 1) {
		$_SESSION["uid"] = $row["user_id"];
		$_SESSION["name"] = $row["first_name"];

		if (isset($_COOKIE["product_list"])) {
			$p_list = stripcslashes($_COOKIE["product_list"]);
			//here we are decoding stored json product list cookie to normal array
			$product_list = json_decode($p_list, true);
			for ($i = 0; $i < count($product_list); $i++) {
				//After getting user id from database here we are checking user cart item if there is already product is listed or not
				$result = $cart->checkItem($product_list[$i], $_RESSION["uid"], "uid");
				if ($result) {
					//if user is adding first time product into cart we will update user_id into database table with valid id
					$cart->updateCart($_SESSION["uid"], $ip_add);
				} else {
					$result = $cart->removeItemFromCart($product_list[$i], $ip_add, "ip");
				}
			}
			//here we are destroying user cookie
			setcookie("product_list", "", strtotime("-1 day"), "/");
			//if user is logging from after cart page we will send cart_login
			echo "cart_login";
			exit();
		}
		//if user is login from page we will send login_success
		echo "Đăng nhập thành công";
		$BackToMyPage = $_SERVER['HTTP_REFERER'];
		if (!isset($BackToMyPage)) {
			echo "<script> location.href=" . $BackToMyPage . " </script>";
		} else {
			echo "<script> location.href='index.php'; </script>";
		}
		exit;

	} else {
		$email = $_POST["email"];
		$password = $_POST["password"];
		$result = $account->checkLoginAdmin($email, $password);
		$count = $result["count"];
		$row = $result["row"];

		if ($count == 1) {
			$_SESSION["uid"] = $row["admin_id"];
			$_SESSION["name"] = $row["admin_name"];
			$ip_add = getenv("REMOTE_ADDR");

			echo "Đăng nhập thành công";
			sleep(1);
			echo "<script> location.href='admin/index.php'; </script>";
			exit;

		} else {
			echo "<span style='color:red;'>Tài khoản không tồn tại!</span>";
			exit();
		}


	}


}

?>