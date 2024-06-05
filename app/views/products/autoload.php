<?php 
include __DIR__ . '/../../controllers/ProductController.php';
$routes = [
    'product' => 'ProductController'
];



$action = $_GET['action'] ?? 'index';
$controller = $_GET['controller'] ?? 'product';
$id = $_GET['id'] ?? null;

if ($controller === 'product') {
    $productController = new ProductController();
    if ($action === 'create') {
        $productController->create();
    } elseif ($action === 'store') {
        $productController->store($_POST);
    } elseif ($action === 'edit' && $id) {
        $productController->edit($id);
    } elseif ($action === 'update' && $id) {
        $productController->update($id, $_POST);
    } elseif ($action === 'delete' && $id) {
        $productController->delete($id);
    } else {
        $productController->index();
    }
} else {
    echo "Invalid controller";
}
?>
