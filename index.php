
<?php
// Database connection
$pdo = new PDO('mysql:host=localhost;dbname=exclusive', 'root', '');

// Fetch categories
$categories = $pdo->query("SELECT * FROM categories WHERE parent_id IS NULL")->fetchAll(PDO::FETCH_ASSOC);

// Fetch subcategories
$subcategories = $pdo->query("SELECT * FROM categories WHERE parent_id IS NOT NULL")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home Page</title>
   <?php require("links.php") ?>
</head>

<body>
   <?php 
      // Include the header file
      require('header.php'); 
   ?>

   <!-- Main Content -->
   <main>
      <!-- Banner section Start here -->
      <section id="topBanner">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="categories">
                    <ul>
                        <?php foreach ($categories as $category): ?>
                            <li class="category-container">
                                <a href="#"><?php echo htmlspecialchars($category['name']); ?></a>
                                <ul class="subcategories">
                                    <?php foreach ($subcategories as $subcategory): ?>
                                        <?php if ($subcategory['parent_id'] == $category['id']): ?>
                                            <li><a href="#"><?php echo htmlspecialchars($subcategory['name']); ?></a></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <a href="#"><img src="" alt=""></a>
            </div>
        </div>
    </div>
</section>
      <!-- Banner section End here -->
   </main>
   
   <?php
   // Include the All Script CDN
    require("script.php");
    ?>
</body>

</html>