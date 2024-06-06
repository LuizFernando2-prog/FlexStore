<?php

// Inclui o arquivo do controlador de produto
require_once __DIR__ . '/../../controllers/ProductController.php';

class Autoload
{
    private $controller;
    private $action;
    private $id;

    public function __construct($controller, $action, $id)
    {
        $this->controller = $controller;
        $this->action = $action;
        $this->id = $id;
    }

    public function execute()
    {
        if ($this->controller === 'product') {
            $productController = new ProductController();
            switch ($this->action) {
                case 'create':
                    return $this->create($productController);

                case 'store':
                    return $this->store($productController);

                case 'edit':
                    return $this->edit($productController);

                case 'update':
                    return $this->update($productController);

                case 'delete':
                    return $this->delete($productController);

                default:
                    return $this->index($productController);
            }
        } else {
            echo "Invalid controller";
        }
    }

    private function create($productController)
    {
        return $productController->create();
    }

    private function store($productController)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productController->store($_POST);
        } else {
            echo "Invalid request method for action 'store'";
        }
    }

    private function edit($productController)
    {
        if ($this->id) {
            $productController->edit($this->id);
        } else {
            echo "Missing ID for action 'edit'";
        }
    }

    private function update($productController)
    {
        if ($this->id) {
            $productController->update($this->id, $_POST);
        } else {
            echo "Missing ID or invalid request method for action 'update'";
        }
    }

    private function delete($productController)
    {
        if ($this->id) {
            $productController->delete($this->id);
        } else {
            echo "Missing ID or invalid request method for action 'delete'";
        }
    }

    private function index($productController)
    {
        return $productController->index();
    }
}

// Obtém os parâmetros da URL
$action = $_GET['action'] ?? 'index';
$controller = $_GET['controller'] ?? 'product';
$id = $_GET['id'] ?? null;

// Cria uma instância da classe Autoload e executa a ação apropriada
$autoload = new Autoload($controller, $action, $id);
$autoload->execute();
