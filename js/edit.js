document.addEventListener("DOMContentLoaded", function() {
    const categorySelect = document.getElementById('category_id');
    const newCategoryInput = document.getElementById('new_category_name');
    const subcategorySelect = document.getElementById('subcategory_id');
    const newSubcategoryInput = document.getElementById('new_subcategory_name');

    function toggleCategorySelect() {
        if (categorySelect) {
            categorySelect.disabled = newCategoryInput.value.trim() !== '';
        }
    }

    function toggleNewCategoryInput() {
        if (newCategoryInput) {
            newCategoryInput.disabled = categorySelect.value !== '';
        }
    }

    function toggleSubcategorySelect() {
        if (subcategorySelect) {
            subcategorySelect.disabled = newSubcategoryInput.value.trim() !== '';
        }
    }

    function toggleNewSubcategoryInput() {
        if (newSubcategoryInput) {
            newSubcategoryInput.disabled = subcategorySelect.value !== '';
        }
    }

    if (newCategoryInput) {
        newCategoryInput.addEventListener('input', toggleCategorySelect);
        toggleCategorySelect();  
    }

    if (categorySelect) {
        categorySelect.addEventListener('change', toggleNewCategoryInput);
        toggleNewCategoryInput(); 
    }

    if (newSubcategoryInput) {
        newSubcategoryInput.addEventListener('input', toggleSubcategorySelect);
        toggleSubcategorySelect(); 
    }

    if (subcategorySelect) {
        subcategorySelect.addEventListener('change', toggleNewSubcategoryInput);
        toggleNewSubcategoryInput();
    }
});