<?php

include "db_conn.php";

$role = $_SESSION['role'] ?? '';

// hierboven wordt de rol van de gebruiker gecontroleerd als deze bestaat

// if ($role === 'Admin') {
//     echo '<div class="header">
//         <h1 style="float: left;">FIRDA admin</h1>
//         <!-- de navbar in de header -->
//         <div class="navbar">
//             <!-- de links in de navbar -->
//             <a class="active" href="#">Home</a>
//             <a href="admin-pannel.php">admin panel</a>
//             <a href="view/read.php">Boeken</a>
//             <a href="../account/logout.php" onclick="return confirmLogout();">logout</a>
//             <a href="#">Reservaties (komt nog)</a>
//         </div>
//     </div>';
// } else if ($role === "Medewerker") {
//     echo '<div class="header">
//         <h1 style="float: left;">FIRDA medewerker</h1>
//         <!-- de navbar in de header -->
//         <div class="navbar">
//             <!-- de links in de navbar -->
//             <a class="active" href="">Home</a>
//             <a href="view/read.php">Boeken</a>
//             <a href="../account/logout.php" onclick="return confirmLogout();">log uit</a>
//             <a href="">Reservaties (komt nog)</a>
//         </div>
//     </div>';
// } else if ($role === "Lezer") {
//     echo '<div class="header">
//         <h1 style="float: left;">FIRDA lid</h1>
//         <!-- de navbar in de header -->
//         <div class="navbar">
//             <!-- de links in de navbar -->
//             <a class="active" href="#" rel="noopener noreferrer">Home</a>
//             <a href="view/read.php">Boeken</a>
//             <a href="../account/logout.php" onclick="return confirmLogout();">log uit</a>
//             <a href="">Reservaties (komt nog)</a>
//         </div>
//     </div>';
// } else if ($role === "") { // Check for empty value
//     echo '<div class="header">
//         <h1 style="float: left;">FIRDA</h1>
//         <!-- de navbar in de header -->
//         <div class="navbar">
//             <!-- de links in de navbar -->
//             <a class="active" href="#">Home</a>
//             <a href="view/read.php">Boeken</a>
//             <a href="../account/signup/register.index.php" rel="noopener noreferrer">word lid</a>
//             <a href="../account/login/login.php" rel="noopener noreferrer">login</a>
//         </div>
//     </div>';
// }
?>

<script>
    function confirmLogout() {
        return confirm('Are you sure you want to log out?');
    }
</script>

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
            <a href="../account/logout.php" <?php if ($activeTab === 'logout') echo 'class="active"'; ?>>Log out</a>
            <a href="#" <?php if ($activeTab === 'reservaties') echo 'class="active"'; ?>>Reservaties</a>
        <?php if ($role === 'User'): ?>
            <a href="#" <?php if ($activeTab === 'login') echo 'class="active"'; ?>>Log in</a>
        <?php endif; ?>
    </div>
</div>
</body>
</html>