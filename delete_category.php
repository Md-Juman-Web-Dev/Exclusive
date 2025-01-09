<?php
// Database connection
$pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');

// Check if the category ID is passed in the URL
if (isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // Delete category from the database
    $stmt = $pdo->prepare("DELETE FROM categories WHERE id = ?");
    $stmt->execute([$category_id]);
}

// Redirect back to admin panel
header("Location: admin.php");
exit();
?>
