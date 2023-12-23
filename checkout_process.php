<?php
session_start();
include "database/db.php";
include "database/order_class.php";
include "database/cart_class.php";

$order = new order();
$cart = new cart();

if (isset($_SESSION["uid"])) {
    $f_name = $_POST["firstname"];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $cardname = $_POST['cardname'];
    $cardnumber = $_POST['cardNumber'];
    $expdate = $_POST['expdate'];
    $cvv = $_POST['cvv'];
    $user_id = $_SESSION["uid"];
    $cardnumberstr = (string) $cardnumber;
    $total_count = $_POST['total_count'];
    $prod_total = $_POST['total_price'];


    $order_id = $order->getOrder_id();

    $order->addOrder_info($order_id, $user_id, $f_name, $email, $address, $city, $state, $zip, $cardname, $cardnumberstr, $expdate, $total_count, $prod_total, $cvv);

    if ($order) {
        $i = 1;


        while ($i <= $total_count) {
            $prod_id = $_POST['prod_id_' . $i];
            $prod_price = $_POST['prod_price_' . $i];
            $prod_qty = $_POST['prod_qty_' . $i];
            $sub_total = (int) $prod_price * (int) $prod_qty;

            $result = $order->addOrder_product($order_id, $prod_id, $prod_qty, (string) $sub_total);
            if ($result) {
                $cart->deleteCart($user_id);
                echo "<script>window.location.href='store.php'</script>";
            }
            $i++;


        }
    }

} else {
    echo "<script>window.location.href='index.php'</script>";
}
?>