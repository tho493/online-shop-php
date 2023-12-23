<?php

class product
{
    private $db, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_detail, $product_image, $product_keywords;

    public function __construct($product_cat = '', $product_brand = '', $product_title = '', $product_price = '', $product_desc = '', $product_detail = '', $product_image = '', $product_keywords = '')
    {
        $this->db = new Database;
        $this->product_cat = $product_cat;
        $this->product_brand = $product_brand;
        $this->product_title = $product_title;
        $this->product_price = $product_price;
        $this->product_desc = $product_desc;
        $this->product_detail = $product_detail;
        $this->product_image = $product_image;
        $this->product_keywords = $product_keywords;
    }

    public function getAllProducts($callback = null)
    {
        if ($callback == null) {
            $this->db->query("SELECT * FROM products, categories WHERE product_cat=cat_id");
            $results = $this->db->resultSet();
            return $results;
        } else if ($callback == "mysql_num_rows") {
            $this->db->query("SELECT * FROM products");
            $count = $this->db->mysqli_num_rows();
            return $count;
        }
    }

    public function getProductPage($limit)
    {
        $this->db->query("select * from products Limit $limit,10");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getProductWithStartLimit($start, $limit)
    {
        $this->db->query("SELECT * FROM products,categories WHERE product_cat=cat_id AND product_id BETWEEN $start AND $limit");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getProductLimit($start, $limit)
    {
        $this->db->query("SELECT * FROM products,categories WHERE product_cat=cat_id LIMIT $start,$limit");
        $result = $this->db->resultSet();
        return $result;
    }

    public function getProductInCat($cat)
    {
        $this->db->query("SELECT * FROM products,categories WHERE product_cat=cat_id AND product_cat = $cat");
        $result = $this->db->resultSet();
        return $result;
    }

    public function deleteProduct($id)
    {
        $this->db->query("DELETE FROM products WHERE product_id=$id");
    }

    public function getProduct($id)
    {
        $this->db->query("SELECT * FROM products WHERE product_id=$id");
        $results = $this->db->resultSet();
        return $results;
    }

    public function addProduct()
    {
        $this->db->query("insert into products (product_cat, product_brand,product_title,product_price, product_desc, product_details, product_image,product_keywords) values ('$this->product_cat','$this->product_brand','$this->product_title','$this->product_price','$this->product_desc','$this->product_detail','$this->product_image','$this->product_keywords')");
    }

    public function countProduct($i, $product = null)
    {
        if ($product == "cat") {
            $this->db->query("SELECT COUNT(*) AS count_items FROM products WHERE product_cat=$i");
            $results = $this->db->resultSet();
            return $results[0]["count_items"];
        } elseif ($product == "brand") {
            $this->db->query("SELECT COUNT(*) AS count_items FROM products WHERE product_brand=$i");
            $results = $this->db->resultSet();
            return $results[0]["count_items"];
        }
    }

    public function updateProduct($id, $product)
    {
        $this->db->query("UPDATE products SET product_cat=$product WHERE product_id=$id");
        $result = $this->db->resultSet();
        return $result;
    }

    public function getProduct_cat($where)
    {
        $sql = "SELECT * FROM products,categories WHERE " . $where;
        $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;
    }

}
?>