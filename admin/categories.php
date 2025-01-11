<?php

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
    $parent_id = $_POST['parent_id'] ?: NULL;

    // Check if the slug already exists
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM categories WHERE slug = ?");
    $stmt->execute([$category_slug]);
    $slug_count = $stmt->fetchColumn();

    // If slug exists, modify it to be unique
    if ($slug_count > 0) {
        $original_slug = $category_slug;
        $counter = 1;
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
    <?php include './links.php' ?>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
    <?php include './sidebar.php' ?>



    <?php include './script.php' ?>
    
</body>

</html>