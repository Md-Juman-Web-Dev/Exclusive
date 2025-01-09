<?php
// Database connection
$pdo = new PDO('mysql:host=localhost;dbname=exclusive', 'root', '');

// Handle category deletion
if (isset($_GET['delete_category'])) {
    $category_id = $_GET['delete_category'];

    // Delete category and its subcategories
    $stmt = $pdo->prepare("DELETE FROM categories WHERE id = ? OR parent_id = ?");
    $stmt->execute([$category_id, $category_id]);

    echo "Category deleted successfully.";
}

// Add category or subcategory
if (isset($_POST['add_category'])) {
    $category_name = $_POST['category_name'];
    $category_slug = strtolower(str_replace(' ', '-', $category_name));
    $parent_id = $_POST['parent_id'] ?: NULL;  // If no parent is selected, set to NULL

    // Check if the slug already exists
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM categories WHERE slug = ?");
    $stmt->execute([$category_slug]);
    $slug_count = $stmt->fetchColumn();

    // If slug exists, modify it to be unique
    if ($slug_count > 0) {
        $original_slug = $category_slug;
        $counter = 1;
        // Append number to slug until it's unique
        while ($slug_count > 0) {
            $category_slug = $original_slug . '-' . $counter;
            $stmt->execute([$category_slug]);
            $slug_count = $stmt->fetchColumn();
            $counter++;
        }
    }

    // Insert the category with the unique slug
    $stmt = $pdo->prepare("INSERT INTO categories (name, slug, parent_id) VALUES (?, ?, ?)");
    $stmt->execute([$category_name, $category_slug, $parent_id]);

    echo "Category added successfully.";
}

// Fetch categories and subcategories
$categories = $pdo->query("SELECT * FROM categories WHERE parent_id IS NULL")->fetchAll(PDO::FETCH_ASSOC);
$subcategories = $pdo->query("SELECT * FROM categories WHERE parent_id IS NOT NULL")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Manage Categories</title>
</head>
<body>
    <h2>Admin Panel - Manage Categories</h2>
    
    <!-- Add Category/Subcategory Form -->
    <form method="post">
        <label for="category_name">Category Name:</label>
        <input type="text" name="category_name" required>
        
        <!-- Parent Category Dropdown (for Subcategories) -->
        <label for="parent_id">Select Parent Category (for Subcategory):</label>
        <select name="parent_id">
            <option value="">-- Select Parent Category --</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['id']; ?>"><?php echo htmlspecialchars($category['name']); ?></option>
            <?php endforeach; ?>
        </select>
        
        <button type="submit" name="add_category">Add Category</button>
    </form>
    
    <h3>Existing Categories</h3>
    <ul>
        <?php foreach ($categories as $category): ?>
            <li>
                <?php echo htmlspecialchars($category['name']); ?> 
                <a href="?delete_category=<?php echo $category['id']; ?>" onclick="return confirm('Are you sure you want to delete this category and its subcategories?')">Delete</a>
                <ul>
                    <?php foreach ($subcategories as $subcategory): ?>
                        <?php if ($subcategory['parent_id'] == $category['id']): ?>
                            <li>
                                <?php echo htmlspecialchars($subcategory['name']); ?> 
                                <a href="?delete_category=<?php echo $subcategory['id']; ?>" onclick="return confirm('Are you sure you want to delete this subcategory?')">Delete</a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
