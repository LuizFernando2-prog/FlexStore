<?php

require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../models/ProductModel.php';
require_once __DIR__ . '/../models/CategoryModel.php';
require_once __DIR__ . '/../models/SubcategoryModel.php';

class ProductController
{
    private $db;
    private $product;
    private $category;
    private $subcategory;

    public function __construct()
    {
        $this->db = require __DIR__ . '/../../config/db.php';
        $this->product = new ProductModel($this->db);
        $this->category = new CategoryModel($this->db);
        $this->subcategory = new SubcategoryModel($this->db);
    }

    public function index()
    {
        $products = $this->product->all();
        include __DIR__ . '/../views/products/index.php';
    }

    public function create()
    {
        $categories = $this->category->all();
        $subcategories = $this->subcategory->all();
        include __DIR__ . '/../views/products/create.php';
    }

    public function store($data)
    {
        if (isset($data['category_name'])) {
            $this->category->create($data['category_name']);
        }
        
        if (isset($data['subcategory_name']) && isset($data['category_id'])) {
            $this->subcategory->create($data['subcategory_name'], $data['category_id']);
        }

        $this->product->create($data);
        header('Location: /flexstore/app/views/products/index.php');
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $categories = $this->category->all();
        $subcategories = $this->subcategory->all();
        include __DIR__ . '/../views/products/edit.php';
    }

    public function update($id, $data)
    {
        $this->product->update($id, $data);
        header('Location: /flexstore/app/views/products/index.php');
    }

    public function delete($id)
    {
        $this->product->delete($id);
        header('Location: /flexstore/app/views/products/index.php');
    }
}
?>
