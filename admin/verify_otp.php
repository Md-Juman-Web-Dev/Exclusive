<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=exclusive', 'root', '');

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

// Fetch admin data
$admin_id = $_SESSION['admin_id'];
$stmt = $pdo->prepare("SELECT * FROM admins WHERE id = ?");
$stmt->execute([$admin_id]);
$admin = $stmt->fetch(PDO::FETCH_ASSOC);

// Handle OTP verification
if (isset($_POST['verify_otp'])) {
    $entered_otp = $_POST['otp'];

    // Check if OTP is valid and not expired
    if ($admin['otp'] == $entered_otp) {
        $current_time = date('Y-m-d H:i:s');
        if ($current_time <= $admin['otp_expiry']) {
            // OTP is correct and not expired, mark the user as verified
            $stmt = $pdo->prepare("UPDATE admins SET is_verified = 1 WHERE id = ?");
            $stmt->execute([$admin_id]);

            echo "Your account has been verified. You can now proceed.";
            header('Location: login.php');
            exit;
        } else {
            $error = "OTP has expired. Please request a new OTP.";
        }
    } else {
        $error = "Invalid OTP entered. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify OTP</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Verify OTP</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="form-group mb-3">
                <label for="otp">Enter OTP:</label>
                <input type="text" name="otp" class="form-control" required>
            </div>
            <button type="submit" name="verify_otp" class="btn btn-primary">Verify OTP</button>
        </form>
    </div>
</body>
</html>
