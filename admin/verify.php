<?php
$pdo = new PDO('mysql:host=localhost;dbname=exclusive', 'root', '');

// Check if token is provided
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Verify token in the database
    $stmt = $pdo->prepare("SELECT * FROM verification_tokens WHERE token = ?");
    $stmt->execute([$token]);
    $token_data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($token_data) {
        $admin_id = $token_data['admin_id'];

        // Update admin's verification status
        $stmt = $pdo->prepare("UPDATE admins SET is_verified = 1 WHERE id = ?");
        $stmt->execute([$admin_id]);

        // Delete the token after successful verification
        $stmt = $pdo->prepare("DELETE FROM verification_tokens WHERE token = ?");
        $stmt->execute([$token]);

        echo "Your email has been verified. Please wait for admin approval.";
    } else {
        echo "Invalid or expired token.";
    }
} else {
    echo "No token provided.";
}
?>
