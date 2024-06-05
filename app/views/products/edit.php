<?php include __DIR__ . '/../templates/header.php'; ?>
<head>
    <link href="/FlexStore/css/styles.css" rel="stylesheet">
</head>
<h1>Edit Product</h1>
<form action="/app/controllers/ProductController.php?action=update&id=<?= $product['id'] ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $product['name'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" required><?= $product['description'] ?></textarea>
    </div>
    <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select class="form-control" id="category_id" name="category_id" required>
            <?php while ($category = $categories->fetch_assoc()): ?>
                <option value="<?= $category['id'] ?>" <?= $product['category_id'] == $category['id'] ? 'selected' : '' ?>><?= $category['name'] ?></option>
            <?php endwhile; ?>
        </select>
        <div class="input-group mt-3">
            <input type="text" class="form-control" id="new_category_name" name="category_name" placeholder="New Category Name">
        </div>
    </div>
    <div class="mb-3">
        <label for="subcategory_id" class="form-label">Subcategory</label>
        <select class="form-control" id="subcategory_id" name="subcategory_id" required>
            <?php while ($subcategory = $subcategories->fetch_assoc()): ?>
                <option value="<?= $subcategory['id'] ?>" <?= $product['subcategory_id'] == $subcategory['id'] ? 'selected' : '' ?>><?= $subcategory['name'] ?></option>
            <?php endwhile; ?>
        </select>
        <div class="input-group mt-3">
            <input type="text" class="form-control" id="new_subcategory_name" name="subcategory_name" placeholder="New Subcategory Name">
        </div>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Update Product</button>
</form>

<?php include __DIR__ . '/../templates/footer.php'; ?>
