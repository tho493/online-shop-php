<?php

class brand
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBrands()
    {
        $this->db->query("SELECT * FROM brands");
        $results = $this->db->resultSet();
        return $results;
    }

    public function countBrand($i)
    {
        $sql = "SELECT COUNT(*) as count FROM products WHERE product_brand=$i";
        $this->db->query($sql);
        $results = $this->db->resultSet();
        return $results[0]["count"];
    }
} ?>