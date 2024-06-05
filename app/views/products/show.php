<?php include __DIR__ . '/../templates/header.php'; ?>
<head>
    <link href="/FlexStore/css/styles.css" rel="stylesheet">
</head>
<h1>Product Details</h1>
<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?= $product['name'] ?></h5>
        <p class="card-text"><?= $product['description'] ?></p>
        <p class="card-text"><strong>Category:</strong> <?= $product['category_name'] ?></p>
        <p class="card-text"><strong>Subcategory:</strong> <?= $product['subcategory_name'] ?></p>
        <img src="data:image/jpeg;base64,<?= base64_encode($product['image']) ?>" class="img-fluid"/>
        <a href="/" class="btn btn-primary mt-3">Back to Products</a>
    </div>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>
