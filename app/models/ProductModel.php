<?php

class ProductModel
{
    private $conn;
    private $table_name = "product";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getProducts()
    {
        $query = "
            SELECT
                p.id,
                p.name,
                p.description,
                p.price,
                c.name AS category_name
            FROM " . $this->table_name . " p
            LEFT JOIN category c ON p.category_id = c.id
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getProductById($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function addProduct($name, $description, $price, $category_id)
    {
        $errors = $this->validateProduct($name, $description, $price);

        if (!empty($errors)) {
            return $errors;
        }

        $query = "
            INSERT INTO " . $this->table_name . "
                (name, description, price, category_id)
            VALUES
                (:name, :description, :price, :category_id)
        ";

        $stmt = $this->conn->prepare($query);
        $this->bindProductData($stmt, $name, $description, $price, $category_id);

        return $stmt->execute();
    }

    public function updateProduct($id, $name, $description, $price, $category_id)
    {
        $query = "
            UPDATE " . $this->table_name . "
            SET
                name = :name,
                description = :description,
                price = :price,
                category_id = :category_id
            WHERE id = :id
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $this->bindProductData($stmt, $name, $description, $price, $category_id);

        return $stmt->execute();
    }

    public function deleteProduct($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    private function validateProduct($name, $description, $price)
    {
        $errors = [];

        if (empty($name)) {
            $errors['name'] = 'Tên sản phẩm không được để trống';
        }

        if (empty($description)) {
            $errors['description'] = 'Mô tả không được để trống';
        }

        if (!is_numeric($price) || $price < 0) {
            $errors['price'] = 'Giá sản phẩm không hợp lệ';
        }

        return $errors;
    }

    private function bindProductData($stmt, $name, $description, $price, $category_id)
    {
        $name = $this->sanitize($name);
        $description = $this->sanitize($description);
        $price = $this->sanitize($price);
        $category_id = $this->sanitize($category_id);
        

        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':price', $price);
        $stmt->bindValue(':category_id', $category_id);
      
    }

    private function sanitize($value)
    {
        return htmlspecialchars(strip_tags($value));
    }
}
