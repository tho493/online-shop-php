<?php

class order
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    ////////////////////////order info//////////////////////////
    public function countAllOrder()
    {
        $this->db->query("select order_id from orders_info");
        $results = $this->db->mysqli_num_rows();
        return $results;
    }

    public function getOrder_id()
    {
        $order_id = $this->countAllOrder();
        if ($order_id == 0) {
            $order_id = 1;
        } else {
            $this->db->query("select max(order_id) as max_val from orders_info");
            $results = $this->db->resultSet();
            $results = $results[0]['max_val'];
            $order_id = $results + 1;
        }
        return $order_id;
    }

    public function addOrder_info($order_id, $user_id, $f_name, $email, $address, $city, $state, $zip, $cardname, $cardnumberstr, $expdate, $total_count, $prod_total, $cvv)
    {
        $sql = "INSERT INTO `orders_info` (`order_id`,`user_id`,`f_name`, `email`,`address`, `city`, `state`, `zip`, `cardname`,`cardnumber`,`expdate`,`prod_count`,`total_amt`,`cvv`) VALUES ($order_id, '$user_id','$f_name','$email', '$address', '$city', '$state', '$zip','$cardname','$cardnumberstr','$expdate','$total_count','$prod_total','$cvv')";
        $this->db->query($sql);
        $result = $this->db->getResult();
    }

    public function getOrdersPage($limit)
    {
        // $this->db->query("select * from order_products,products,orders_info,user_info where order_products.product_id=products.product_id and user_info.user_id=orders_info.user_id Limit $limit,10");
        $this->db->query("select * from order_products,products,orders_info,user_info where order_products.product_id=products.product_id and user_info.user_id=orders_info.user_id");
        $results = $this->db->resultSet();
        return $results;
    }


    ///////////////////// order product ///////////////////
    public function addOrder_product($order_id, $prod_id, $prod_qty, $sub_total)
    {
        $this->db->query("INSERT INTO `order_products`  (`order_pro_id`,`order_id`,`product_id`,`qty`,`amt`)  VALUES (NULL, '$order_id','$prod_id','$prod_qty','$sub_total')");
        $result = $this->db->getResult();
        return $result;
    }
}


?>