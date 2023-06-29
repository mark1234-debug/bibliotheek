<?php

include "db_conn.php";

$role = $_SESSION['role'] ?? '';

?>
<!DOCTYPE html>
<html>
<body>
    
<div class="header">
        <h1 style="float: left;">FIRDA</h1>
<!-- de navbar in de header -->
    <div class="navbar">
    <!-- de links in de navbar -->
        <a href="index.php" <?php if ($activeTab === 'home') echo 'class="active"'; ?>>Home</a>
        <a href="view/read.php" <?php if ($activeTab === 'boeken') echo 'class="active"'; ?>>Boeken</a>
        <?php if ($role === 'Admin'); elseif ($role == 'Medewerker'); elseif ($role == 'Lid'); ?>
            <a href="admin-pannel.php" <?php if ($activeTab === 'admin') echo 'class="active"'; ?>>Admin Panel</a>
            <a href="#" <?php if ($activeTab === 'logout') echo 'class="active"'; ?>>Log out</a>
            <a href="#" <?php if ($activeTab === 'reservaties') echo 'class="active"'; ?>>Reservaties</a>
        <?php if ($role === 'User'): ?>
            <a href="#" <?php if ($activeTab === 'login') echo 'class="active"'; ?>>Log in</a>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
