<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}

// Database connection
$pdo = new PDO('mysql:host=localhost;dbname=exclusive', 'root', '');


// Fetch editable text for the top bar
$stmt = $pdo->prepare("SELECT content FROM editable_text WHERE section = ?");
$stmt->execute(['topBar']);
$editableText = $stmt->fetchColumn();

// Handle text update
if (isset($_POST['update_text'])) {
    $new_text = $_POST['topBar_text'];
    $stmt = $pdo->prepare("UPDATE editable_text SET content = ? WHERE section = ?");
    $stmt->execute([$new_text, 'topBar']);
    echo "Text updated successfully.";
}

// Handle text deletion
if (isset($_POST['delete_text'])) {
    // Delete the content for the topBar section
    $stmt = $pdo->prepare("UPDATE editable_text SET content = NULL WHERE section = ?");
    $stmt->execute(['topBar']);
    echo "Text deleted successfully.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Manage Categories</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Admin Panel - Manage Categories</h2>
        <a href="logout.php" class="btn btn-danger mb-3">Logout</a>

        <!-- Add Category/Subcategory Form -->
        <form method="post">
            <label class="mb-2" for="category_name">Category Name:</label>
            <input class="form-control" type="text" name="category_name" required>
        
            <label class="mb-2" for="parent_id">Select Parent Category (for Subcategory):</label>
            <select name="parent_id" class="form-control">
                <option value="">-- Select Parent Category --</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category['id']; ?>"><?php echo htmlspecialchars($category['name']); ?></option>
                <?php endforeach; ?>
            </select>
        
            <button class="btn btn-primary mt-3" type="submit" name="add_category">Add Category</button>
        </form>
        <h3>Existing Categories</h3>
        <ul>
            <?php foreach ($categories as $category): ?>
                <li>
                    <?php echo htmlspecialchars($category['name']); ?>
                    <a class="btn btn-danger my-2" href="?delete_category=<?php echo $category['id']; ?>" onclick="return confirm('Are you sure you want to delete this category and its subcategories?')">Delete</a>
                    <ul>
                        <?php foreach ($subcategories as $subcategory): ?>
                            <?php if ($subcategory['parent_id'] == $category['id']): ?>
                                <li>
                                    <?php echo htmlspecialchars($subcategory['name']); ?>
                                    <a class="btn btn-danger" href="?delete_category=<?php echo $subcategory['id']; ?>" onclick="return confirm('Are you sure you want to delete this subcategory?')">Delete</a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endforeach; ?>
        </ul>


   <!-- Edit Top Bar Text (Including <a> tag) -->
   <h3>Edit Top Bar Text</h3>
    <form method="post">
        <label for="topBar_text">Edit Text (You can include HTML like <a> tags):</label><br>
        <textarea name="topBar_text" rows="4" cols="50"><?php echo htmlspecialchars($editableText); ?></textarea><br>
        <button type="submit" name="update_text">Update Text</button>
    </form>

    <!-- Delete Text Button -->
    <h3>Delete Top Bar Text</h3>
    <form method="post">
        <button type="submit" name="delete_text" onclick="return confirm('Are you sure you want to delete the text?')">Delete Text</button>
    </form>
    </div>
</body>
</html>
