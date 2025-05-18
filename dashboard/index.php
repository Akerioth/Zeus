<?php
session_start();
include '../app/sso/header.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

// Get user role
$role = $_SESSION['role'];
?>

<div class="container mt-5">
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <p>Your role: <?php echo ucfirst($role); ?></p>
    
    <?php if ($role === 'administrator'): ?>
        <!-- Admin-specific content -->
        <div class="alert alert-danger">
            <h4>Admin Dashboard</h4>
            <p>Manage users and system settings</p>
        </div>
    <?php elseif ($role === 'moderator'): ?>
        <!-- Moderator-specific content -->
        <div class="alert alert-warning">
            <h4>Moderator Dashboard</h4>
            <p>Manage content and user posts</p>
        </div>
    <?php else: ?>
        <!-- Member content -->
        <div class="alert alert-success">
            <h4>Member Dashboard</h4>
            <p>Welcome to your member area</p>
        </div>
    <?php endif; ?>
    
    <a href="../logout.php" class="btn btn-secondary">Logout</a>
</div>

<?php include '../app/sso/footer.php'; ?>