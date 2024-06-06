<?php
class ProductModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function all()
    {
        $query = "SELECT products.*, categories.name as category_name, subcategories.name as subcategory_name
                  FROM products
                  LEFT JOIN categories ON products.category_id = categories.id
                  LEFT JOIN subcategories ON products.subcategory_id = subcategories.id";
        return $this->db->query($query);
    }

    public function find($id)
    {
        $query = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($name, $description, $category_id, $subcategory_id, $image)
    {
    
        $query = "INSERT INTO products (name, description, category_id, subcategory_id, image) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssiss", $name, $description, $category_id, $subcategory_id, $image);
        $stmt->execute();
    }
    

    public function update($id, $name, $description, $category_id, $subcategory_id, $image)
    {
        $query = "UPDATE products SET name = ?, description = ?, category_id = ?, subcategory_id = ?, image = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssibsi", $name, $description, $category_id, $subcategory_id, $image, $id);
        $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM products WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
?>
