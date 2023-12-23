<?php

class category
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllCategories($where = null)
    {
        $sql = "SELECT * FROM categories";
        if ($where != null) {
            $sql .= " WHERE $where";
        }
        $this->db->query($sql);
        $results = $this->db->resultSet();
        return $results;
    }

    public function countProducts($i)
    {
        $sql = "SELECT COUNT(*) as count FROM products WHERE product_cat=$i";
        $this->db->query($sql);
        $results = $this->db->resultSet();
        return $results[0]["count"];
    }

    public function getCategory_with_keyword($keyword)
    {
        $this->db->query("SELECT * FROM products,categories WHERE product_cat=cat_id AND product_keywords LIKE '%$keyword%'");
        $results = $this->db->resultSet();
        return $results;
    }

    public function countProductAndCategory()
    {
        $sql = "SELECT COUNT(*) as count FROM products,categories WHERE product_cat=cat_id";
        $this->db->query($sql);
        $results = $this->db->resultSet();
        return $results[0]["count"];
    }





}
?>