<?php include __DIR__ . '/../templates/header.php';
require_once __DIR__ . '/autoload.php';


$autoload = new Autoload('product', 'create', null);
$data = $autoload->execute();

$categories = $data['categories'];
$subcategories = $data['subcategories'];

?>

<head>
    <link href="/FlexStore/css/styles.css" rel="stylesheet">
    <script src="/flexstore/js/create.js"></script>
</head>
<h1>Adicionar Produto</h1>
<?php
echo '<form action="autoload.php?action=store" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descrição</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>';

if (isset($categories) && $categories->num_rows > 0) {
    echo '<div class="mb-3">
            <label for="category_id" class="form-label">Categoria</label>
            <select class="form-control" id="category_id" name="category_id">
                <option value="">Selecione uma Categoria</option>';  // Adiciona uma opção vazia no início
    while ($category = $categories->fetch_assoc()) {
        echo '<option value="' . htmlspecialchars($category['id']) . '">' . htmlspecialchars($category['name']) . '</option>';
    }
    echo '</select>
        </div>
        <div class="mb-3">
            <label for="new_category_name" class="form-label">Nova Categoria</label>
            <input type="text" class="form-control" id="new_category_name" name="new_category_name" placeholder="Nova Categoria">
        </div>';
} else {
    echo '<div class="mb-3">
            <label for="new_category_name" class="form-label">Nova Categoria</label>
            <input type="text" class="form-control" id="new_category_name" name="new_category_name" placeholder="Nova Categoria">
        </div>';
}

if (isset($subcategories) && $subcategories->num_rows > 0) {
    echo '<div class="mb-3">
            <label for="subcategory_id" class="form-label">Subcategoria</label>
            <select class="form-control" id="subcategory_id" name="subcategory_id">
                <option value="">Selecione uma Subcategoria</option>';  // Adiciona uma opção vazia no início
    while ($subcategory = $subcategories->fetch_assoc()) {
        echo '<option value="' . htmlspecialchars($subcategory['id']) . '">' . htmlspecialchars($subcategory['name']) . '</option>';
    }
    echo '</select>
        </div>
        <div class="mb-3">
            <label for="new_subcategory_name" class="form-label">Nova Subcategoria</label>
            <input type="text" class="form-control" id="new_subcategory_name" name="new_subcategory_name" placeholder="Nova Subcategoria">
        </div>';
} else {
    echo '<div class="mb-3">
            <label for="new_subcategory_name" class="form-label">Nova Subcategoria</label>
            <input type="text" class="form-control" id="new_subcategory_name" name="new_subcategory_name" placeholder="Nova Subcategoria">
        </div>';
}

echo '<div class="mb-3">
        <label for="image" class="form-label">Imagem</label>
        <input type="file" class="form-control" id="image" name="image" required>
    </div>
    <button type="submit" class="btn btn-primary">Adicionar Produto</button>
</form>';
?>
<?php include __DIR__ . '/../templates/footer.php'; ?>