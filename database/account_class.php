<?php

class account
{
    private $db, $first_name, $last_name, $email, $password, $mobile, $address1, $address2, $user_id;

    public function __construct($first_name = '', $last_name = '', $email = '', $password = '', $mobile = '', $address1 = '', $address2 = '')
    {
        $this->db = new Database;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->mobile = $mobile;
        $this->address1 = $address1;
        $this->address2 = $address2;
    }

    public function setValues($first_name, $last_name, $email, $password, $mobile, $address1, $address2)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->mobile = $mobile;
        $this->address1 = $address1;
        $this->address2 = $address2;
    }

    public function getAllAccounts()
    {
        $this->db->query("SELECT * FROM user_info");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getAccount()
    {
        $this->db->query("SELECT * FROM `user_info` WHERE `user_id`= $this->user_id");
        $results = $this->db->resultSet();
        return $results[0];
    }

    public function addAccount()
    {
        $this->db->query("INSERT into `user_info` (`first_name`, `last_name`,`email`,`password`,`mobile`,`address1`,`address2`) values ('$this->first_name','$this->last_name','$this->email','$this->password','$this->mobile','$this->address1','$this->address2')");
    }

    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    public function deleteAccount()
    {
        $this->db->query("DELETE from user_info where user_id='$this->user_id'");
    }

    public function updateAccount()
    {
        $this->db->query("UPDATE user_info set first_name='$this->first_name', last_name='$this->last_name', email='$this->email', mobile='$this->mobile', address1='$this->address1', address2='$this->address2' where user_id='$this->user_id'");
    }

    public function checkLoginAdmin($email, $password)
    {
        $this->db->query("SELECT * FROM `admin_info` WHERE `admin_email` = '$email' AND `admin_password` = '$password'");
        $count = ($this->db->mysqli_num_rows() > 0) ? 1 : 0;
        $row = $this->db->mysqli_fetch_array();
        $array = array(
            "count" => $count,
            "row" => $row
        );
        return $array;
    }

    public function checkLoginUser($email, $password)
    {

        $this->db->query("SELECT * FROM `user_info` WHERE `email` = '$email' AND `password` = '$password'");
        $count = ($this->db->mysqli_num_rows() > 0) ? 1 : 0;
        $row = $this->db->mysqli_fetch_array();
        $array = array(
            "count" => $count,
            "row" => $row
        );
        return $array;
    }

    public function checkRegisterUser($email, $password)
    {
        $this->db->query("SELECT * FROM `user_info` WHERE `email` = '$email' or `password` = '$password'");
        $results = $this->db->resultSet();
        return $results;
    }

    public function registerUser($username, $email, $password)
    {
        $this->db->query("INSERT INTO register (Name, email, password)  VALUES('$username', '$email', '$password'");
    }
}

?>