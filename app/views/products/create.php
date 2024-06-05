<?php include __DIR__ . '/../templates/header.php'; 
require_once "autoload.php?action=create";
?>

<head>
    <link href="/FlexStore/css/styles.css" rel="stylesheet">
</head>
<h1>Add Product</h1>
<form action="autoload.php?action=store" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>
    <?php if (isset($category) && $category->num_rows > 0) : ?>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <?php while ($category = $categories->fetch_assoc()) : ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="new_category_name" class="form-label">New Category</label>
            <input type="text" class="form-control" id="new_category_name" name="new_category_name" placeholder="New Category Name">
        </div>
    <?php else : ?>
        <div class="mb-3">
            <label for="new_category_name" class="form-label">New Category</label>
            <input type="text" class="form-control" id="new_category_name" name="new_category_name" placeholder="New Category Name">
        </div>
    <?php endif; ?>
    <?php if (isset($subcategory) && $subcategory->num_rows > 0) : ?>
        <div class="mb-3">
            <label for="subcategory_id" class="form-label">Subcategory</label>
            <select class="form-control" id="subcategory_id" name="subcategory_id" required>
                <?php while ($subcategory = $subcategories->fetch_assoc()) : ?>
                    <option value="<?= $subcategory['id'] ?>"><?= $subcategory['name'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="new_subcategory_name" class="form-label">New Subcategory</label>
            <input type="text" class="form-control" id="new_subcategory_name" name="new_subcategory_name" placeholder="New Subcategory Name">
        </div>
    <?php else : ?>
        <div class="mb-3">
            <label for="new_subcategory_name" class="form-label">New Subcategory</label>
            <input type="text" class="form-control" id="new_subcategory_name" name="new_subcategory_name" placeholder="New Subcategory Name">
        </div>
    <?php endif; ?>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Product</button>
</form>

<?php include __DIR__ . '/../templates/footer.php'; ?>
