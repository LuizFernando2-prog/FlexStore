<?php include __DIR__ . '/../templates/header.php';
require_once __DIR__ . '/autoload.php';
?>

<head>
    <link href="/FlexStore/css/styles.css" rel="stylesheet">
    <script src="/flexstore/js/edit.js"></script>
</head>
<h1>Editar Produto</h1>
<?php
echo '
<form action="autoload.php?action=update&id=' . $product['id'] . '" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" name="name" value="' . $product['name'] . '" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descrição</label>
        <textarea class="form-control" id="description" name="description" required>' . $product['description'] . '</textarea>
    </div>
    <div class="mb-3">
        <label for="category_id" class="form-label">Categoria</label>
        <select class="form-control" id="category_id" name="category_id" required>
            <option value="">Selecione uma Categoria</option>';


while ($category = $categories->fetch_assoc()) {
    echo '<option value="' . $category['id'] . '" ' . ($product['category_id'] == $category['id'] ? 'selected' : '') . '>' . $category['name'] . '</option>';
}

echo '
        </select>
    </div>
    <div class="mb-3">
        <label for="subcategory_id" class="form-label">Subcategoria</label>
        <select class="form-control" id="subcategory_id" name="subcategory_id" required>
            <option value="">Selecione uma Categoria</option>';

while ($subcategory = $subcategories->fetch_assoc()) {
    echo '<option value="' . $subcategory['id'] . '" ' . ($product['subcategory_id'] == $subcategory['id'] ? 'selected' : '') . '>' . $subcategory['name'] . '</option>';
}

echo '
        </select>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Imagem</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Update Product</button>
</form>';
?>


<?php include __DIR__ . '/../templates/footer.php'; ?>