<?php
// Include the database connection
include('../config/db.php');

// Check if a search query is provided
if (isset($_GET['query'])) {
    $searchQuery = htmlspecialchars($_GET['query']); // Sanitize the input

    // SQL query to search for products in the database
    $sql = "SELECT * FROM products WHERE name LIKE ? OR description LIKE ?";
    
    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        $searchTerm = "%" . $searchQuery . "%"; // Use wildcards for partial matches
        $stmt->bind_param("ss", $searchTerm, $searchTerm); // Bind the parameters
        
        // Execute the statement
        $stmt->execute();
        
        // Get the result
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Display the results
            echo "<h2>Search Results for: '$searchQuery'</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='product'>";
                echo "<h3>" . $row['name'] . "</h3>";
                echo "<p>" . $row['description'] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No results found for '$searchQuery'.</p>";
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Error preparing the SQL query.";
    }

} else {
    echo "<p>Please enter a search term.</p>";
}

// Close the database connection
$conn->close();
?>
