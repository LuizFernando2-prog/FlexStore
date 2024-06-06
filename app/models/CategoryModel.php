<?php
class CategoryModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function all()
    {
        $query = "SELECT * FROM categories";
        return $this->db->query($query);
    }

    public function create($name)
    {
        $query = "INSERT INTO categories (name) VALUES (?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        return $stmt->insert_id;
    }
    
}
?>
