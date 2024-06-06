<?php

require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../models/ProductModel.php';
require_once __DIR__ . '/../models/CategoryModel.php';
require_once __DIR__ . '/../models/SubcategoryModel.php';
require_once __DIR__ . '/../models/DataAccess.php';

class ProductController
{
    private $db;
    private $product;
    private $category;
    private $subcategory;

    public function initialize()
    {
        $this->db = DataAccess::getConnection();
        $this->product = new ProductModel($this->db);
        $this->category = new CategoryModel($this->db);
        $this->subcategory = new SubcategoryModel($this->db);
    }

    public function index()
    {
        if (!$this->db) {
            $this->initialize();
        }
        return $products = $this->product->all();
    }

    public function create()
    {
        if (!$this->db) {
            $this->initialize();
        }
        $categories = $this->category->all();
        $subcategories = $this->subcategory->all();

        $categoriesAndSubcategories = [
            'categories' => $categories,
            'subcategories' => $subcategories
        ];

        // Retornando o array combinado
        return $categoriesAndSubcategories;
    }

    public function store($data)
    {
        if (!$this->db) {
            $this->initialize();
        }

        // Tratamento de nova categoria
        if (!empty($data['new_category_name'])) {
            $this->category->create($data['new_category_name']);
            $data['category_id'] = $this->db->insert_id; // Recupera o ID da nova categoria criada
        }

        // Tratamento de nova subcategoria
        if (!empty($data['new_subcategory_name']) && !empty($data['category_id'])) {
            $categoryId = $data['category_id']; // Obtém o ID da categoria
            $this->subcategory->create($data['new_subcategory_name'], $categoryId);
            $data['subcategory_id'] = $this->db->insert_id; // Recupera o ID da nova subcategoria criada
        } else {
            // Se não houver subcategoria, defina subcategory_id como NULL
            $data['subcategory_id'] = !empty($data['subcategory_id']) ? $data['subcategory_id'] : null;
        }

        // Tratamento da imagem
        if (!empty($_FILES['image']['name'])) {
            $targetDir = __DIR__ . "/../../uploads/";
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            $targetFile = $targetDir . basename($_FILES["image"]["name"]);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                $data['image'] = basename($_FILES["image"]["name"]);
            } else {
                $data['image'] = null;
            }
        } else {
            $data['image'] = null;
        }

        $this->product->create($data['name'], $data['description'], $data['category_id'], $data['subcategory_id'], $data['image']);
        header('Location: /flexstore/app/views/products/index.php');
    }


    public function edit($id)
    {
        if (!$this->db) {
            $this->initialize();
        }
        $product = $this->product->find($id);
        $categories = $this->category->all();
        $subcategories = $this->subcategory->all();
        include __DIR__ . '/../views/products/edit.php';
    }

    public function update($id, $data)
    {
        if (!$this->db) {
            $this->initialize();
        }
        $this->product->update($id, $data['name'], $data['description'], $data['category_id'], $data['subcategory_id'], $data['image']);
        header('Location: /flexstore/app/views/products/index.php');
    }

    public function delete($id)
    {
        if (!$this->db) {
            $this->initialize();
        }
        $this->product->delete($id);
        header('Location: /flexstore/app/views/products/index.php');
    }
}
