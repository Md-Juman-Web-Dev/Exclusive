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
      <h1>Welcome to the Home Page</h1>
      <p>This is the Home Page of the webpage.</p>
   </main>
   
   <?php
   // Include the All Script CDN
    require("script.php");
    ?>
</body>

</html>