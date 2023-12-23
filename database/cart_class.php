<?php
class cart
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function countCart($sql, $data)
    {
        if ($sql == "uid") {
            $sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $data";
        } elseif ($sql == "ip") {
            $sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$data' AND user_id < 0";
        }
        $this->db->query($sql);
        $results = $this->db->resultSet();
        return $results[0]["count_item"];
    }

    public function getCartProduct($type, $user_id)
    {
        if ($type == "uid") {
            $sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$user_id'";
        } elseif ($type == "ip") {
            $sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$user_id' AND b.user_id < 0";
        }
        $this->db->query($sql);
        $results = $this->db->resultSet();
        return $results;
    }

    public function addToCart($p_id, $ip_add, $user_id, $qty)
    {
        $sql = "INSERT INTO `cart` (`p_id`, `ip_add`, `user_id`, `qty`)  VALUES ('$p_id','$ip_add','$user_id',$qty)";
        $this->db->query($sql);
        $result = $this->db->getResult();
        return $result;
    }

    public function updateCartItem($qty, $p_id, $user_id, $type)
    {
        if ($type == 'ip') {
            $sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$p_id' AND ip_add = '$user_id'";
        } else {
            $sql = "UPDATE cart SET qty = $qty WHERE p_id = $p_id AND user_id = $user_id";
        }
        $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;
    }

    public function updateCart($uid, $ip_add)
    {
        $sql = "UPDATE cart SET user_id = '$_SESSION[uid]' WHERE ip_add = '$ip_add' AND user_id = -1";
        $this->db->query($sql);
    }

    public function removeItemFromCart($p_id, $user_id, $type)
    {
        if ($type == 'ip') {
            $sql = "DELETE FROM cart WHERE p_id = '$p_id' AND ip_add = '$user_id' AND user_id = -1";
        } else {
            $sql = "DELETE FROM cart WHERE p_id = $p_id AND user_id = $user_id";
        }
        $this->db->query($sql);
        $result = $this->db->getResult();
        return $result;
    }

    public function checkItem($p_id, $user_id, $type = null)
    {
        if ($type == 'ip') {
            $sql = "SELECT * FROM cart WHERE ip_add = '$user_id' AND p_id = '$p_id' AND user_id = -1";
        } else {
            $sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
        }
        $this->db->query($sql);
        $result = $this->db->mysqli_num_rows();
        return $result > 0;
    }

    public function deleteCart($user_id, $type = null)
    {
        if ($type == 'ip') {
            $sql = "DELETE FROM cart WHERE ip_add = '$user_id' AND user_id = -1";
        } else {
            $sql = "DELETE FROM cart WHERE user_id = '$user_id'";
        }
        $this->db->query($sql);
    }
}
?>