-- Insert sample data into categories
INSERT INTO categories (name) VALUES ('Electronics'), ('Books'), ('Clothing');

-- Insert sample data into subcategories
INSERT INTO subcategories (name, category_id) VALUES 
('Mobile Phones', 1), 
('Laptops', 1), 
('Fiction', 2), 
('Non-fiction', 2), 
('Men', 3), 
('Women', 3);

-- Insert sample data into products
INSERT INTO products (name, description, category_id, subcategory_id, image) VALUES 
('iPhone 13', 'Latest model from Apple', 1, 1, NULL), 
('Dell XPS 13', 'High-performance laptop', 1, 2, NULL), 
('The Great Gatsby', 'Classic novel by F. Scott Fitzgerald', 2, 3, NULL), 
('Sapiens', 'A Brief History of Humankind by Yuval Noah Harari', 2, 4, NULL), 
('Levi\'s Jeans', 'Comfortable and stylish jeans for men', 3, 5, NULL), 
('Zara Dress', 'Elegant dress for women', 3, 6, NULL);