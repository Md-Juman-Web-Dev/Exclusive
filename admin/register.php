<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Use Composer autoload if installed via Composer

$pdo = new PDO('mysql:host=localhost;dbname=exclusive', 'root', '');

// Handle account creation
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        // Check if username or email already exists
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM admins WHERE username = ? OR email = ?");
        $stmt->execute([$username, $email]);
        $user_exists = $stmt->fetchColumn();

        if ($user_exists > 0) {
            $error = "Username or Email already exists.";
        } else {
            // Hash the password before storing it
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert the new admin into the database (set approval and verification to false initially)
            $stmt = $pdo->prepare("INSERT INTO admins (username, password, email, is_verified, is_approved) VALUES (?, ?, ?, 0, 0)");
            $stmt->execute([$username, $hashed_password, $email]);

            // Get the admin ID of the newly inserted admin
            $admin_id = $pdo->lastInsertId();

            // Generate a 6-digit OTP code
            $otp = rand(100000, 999999);

            // Set OTP expiration time (e.g., 5 minutes from now)
            $otp_expiry = date('Y-m-d H:i:s', strtotime('+5 minutes'));

            // Store the OTP and its expiration time in the database
            $stmt = $pdo->prepare("UPDATE admins SET otp = ?, otp_expiry = ? WHERE id = ?");
            $stmt->execute([$otp, $otp_expiry, $admin_id]);

            // Send OTP email using PHPMailer
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp-relay.brevo.com';  // Gmail SMTP server
                $mail->SMTPAuth = true;
                $mail->Username = '834306001@smtp-brevo.com';  // Your Gmail address
                $mail->Password = 'HL3BzghW9takSJ1O';  // Your Gmail password (or use App Password)
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                //Recipients
                $mail->setFrom('your-email@gmail.com', 'Admin Panel');
                $mail->addAddress($email, $username); // Add recipient

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Your OTP Code for Admin Verification';
                $mail->Body    = "Hello $username,<br><br>Your OTP code for admin verification is: <strong>$otp</strong><br><br>This OTP will expire in 5 minutes.";

                $mail->send();

                echo "Registration successful! An OTP has been sent to your email. Please enter it to verify your account.";
                $_SESSION['admin_id'] = $admin_id;  // Save the admin ID in session
                header('Location: verify_otp.php');
                exit;

            } catch (Exception $e) {
                $error = "Mailer Error: " . $mail->ErrorInfo;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Admin Account</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Create Admin Account</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="form-group mb-3">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <button type="submit" name="register" class="btn btn-primary">Register</button>
        </form>
        <br>
        <a href="login.php">Already have an account? Login here</a>
    </div>

    <script src="https://smtpjs.com/v3/smtp.js">
</script>
</body>
</html>
