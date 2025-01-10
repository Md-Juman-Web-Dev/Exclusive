<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

$pdo = new PDO('mysql:host=localhost;dbname=exclusive', 'root', '');

// Fetch unapproved admins
$stmt = $pdo->prepare("SELECT * FROM admins WHERE is_verified = 1 AND is_approved = 0");
$stmt->execute();
$admins_to_approve = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Approve or reject admin
if (isset($_GET['approve_id'])) {
    $admin_id = $_GET['approve_id'];
    $stmt = $pdo->prepare("UPDATE admins SET is_approved = 1 WHERE id = ?");
    $stmt->execute([$admin_id]);
    echo "Admin approved.";
    header("Location: approve_admins.php");
    exit;
}

if (isset($_GET['reject_id'])) {
    $admin_id = $_GET['reject_id'];
    $stmt = $pdo->prepare("UPDATE admins SET is_approved = 0 WHERE id = ?");
    $stmt->execute([$admin_id]);
    echo "Admin rejected.";
    header("Location: approve_admins.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Approval</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Approve New Admins</h2>
        <?php if (empty($admins_to_approve)): ?>
            <p>No new admins pending approval.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($admins_to_approve as $admin): ?>
                    <li>
                        <?php echo htmlspecialchars($admin['username']); ?> (<?php echo htmlspecialchars($admin['email']); ?>)
                        <a href="?approve_id=<?php echo $admin['id']; ?>" class="btn btn-success">Approve</a>
                        <a href="?reject_id=<?php echo $admin['id']; ?>" class="btn btn-danger">Reject</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</body>
</html>
