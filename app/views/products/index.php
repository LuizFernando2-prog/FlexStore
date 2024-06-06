<?php
include __DIR__ . '/../templates/header.php';
require_once __DIR__ . '/autoload.php'; 


$autoload = new Autoload('product', 'index', null);
$products = $autoload->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/FlexStore/css/styles.css" rel="stylesheet">
    <title>Lista de Produto</title>
</head>

<body>
    <h1>Lista de Produto</h1>
    <?php
    if (isset($products) && $products->num_rows > 0) {
        echo '<div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Categoria</th>
                        <th>Subcategoria</th>
                        <th>Imagem</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>';
        while ($product = $products->fetch_assoc()) {
            echo '<tr>
                <td>' . htmlspecialchars($product['name']) . '</td>
                <td>' . htmlspecialchars($product['description']) . '</td>
                <td>' . htmlspecialchars($product['category_name']) . '</td>
                <td>' . htmlspecialchars($product['subcategory_name']) . '</td>
                <td><img src="data:image/jpeg;base64,' . base64_encode($product['image']) . '" width="50" height="50" /></td>
                <td>
                    <a href="autoload.php?action=edit&id=' . $product['id'] . '" class="btn btn-warning">Edit</a>
                    <a href="autoload.php?action=delete&id=' . $product['id'] . '" class="btn btn-danger">Delete</a>
                </td>
            </tr>';
        }
        echo '</tbody>
        </table>
    </div>';
    } else {
        echo '<div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6">No products found.</td>
                    </tr>
                </tbody>
            </table>
        </div>';
    }
    ?>
</body>

</html>

<?php include __DIR__ . '/../templates/footer.php'; ?>