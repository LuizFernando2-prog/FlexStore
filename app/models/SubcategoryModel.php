<?php
class SubcategoryModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function all()
    {
        $query = "SELECT * FROM subcategories";
        return $this->db->query($query);
    }

    public function create($name, $categoryId)
    {
        $query = "INSERT INTO subcategories (name, category_id) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $name, $categoryId);
        $stmt->execute();
    }
}
?>
