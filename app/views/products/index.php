<?php 
include __DIR__ . '/../templates/header.php';
require_once "autoload.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/FlexStore/css/styles.css" rel="stylesheet">
    <title>Product List</title>
</head>
<body>
<h1>Product List</h1>
<div>
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
    <?php if (isset($products) && $products->num_rows > 0) : ?>
        <?php while ($product = $products->fetch_assoc()) : ?>
            <tr>
                <td><?= htmlspecialchars($product['name']) ?></td>
                <td><?= htmlspecialchars($product['description']) ?></td>
                <td><?= htmlspecialchars($product['category_name']) ?></td>
                <td><?= htmlspecialchars($product['subcategory_name']) ?></td>
                <td><img src="data:image/jpeg;base64,<?= base64_encode($product['image']) ?>" width="50" height="50" /></td>
                <td>
                    <a href="/app/controllers/ProductController.php?action=edit&id=<?= $product['id'] ?>" class="btn btn-warning">Edit</a>
                    <a href="/app/controllers/ProductController.php?action=delete&id=<?= $product['id'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else : ?>
        <tr>
            <td colspan="6">No products found.</td>
        </tr>
    <?php endif; ?>
</tbody>

    </table>
</div>
</body>
</html>

<?php include __DIR__ . '/../templates/footer.php'; ?>