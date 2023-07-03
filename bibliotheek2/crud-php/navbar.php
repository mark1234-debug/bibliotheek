<?php

include "db_conn.php";

$role = $_SESSION['role'] ?? '';

if ($role === 'Admin') {
    echo '<div class="header">
        <h1 style="float: left;">FIRDA admin</h1>
        <!-- de navbar in de header -->
        <div class="navbar">
            <!-- de links in de navbar -->
            <a class="active" href="#">Home</a>
            <a href="admin-pannel.php">admin panel</a>
            <a href="view/read.php">Boeken</a>
            <a href="../account/logout.php" onclick="return confirmLogout();">logout</a>
            <a href="#">Reservaties (komt nog)</a>
        </div>
    </div>';
} else if ($role === "Medewerker") {
    echo '<div class="header">
        <h1 style="float: left;">FIRDA medewerker</h1>
        <!-- de navbar in de header -->
        <div class="navbar">
            <!-- de links in de navbar -->
            <a class="active" href="">Home</a>
            <a href="view/read.php">Boeken</a>
            <a href="../account/logout.php" onclick="return confirmLogout();">log uit</a>
            <a href="">Reservaties (komt nog)</a>
        </div>
    </div>';
} else if ($role === "Lezer") {
    echo '<div class="header">
        <h1 style="float: left;">FIRDA lid</h1>
        <!-- de navbar in de header -->
        <div class="navbar">
            <!-- de links in de navbar -->
            <a class="active" href="#" rel="noopener noreferrer">Home</a>
            <a href="view/read.php">Boeken</a>
            <a href="../account/logout.php" onclick="return confirmLogout();">log uit</a>
            <a href="">Reservaties (komt nog)</a>
        </div>
    </div>';
} else if ($role === "") { // Check for empty value
    echo '<div class="header">
        <h1 style="float: left;">FIRDA</h1>
        <!-- de navbar in de header -->
        <div class="navbar">
            <!-- de links in de navbar -->
            <a class="active" href="#">Home</a>
            <a href="view/read.php">Boeken</a>
            <a href="../account/signup/register.index.php" rel="noopener noreferrer">word lid</a>
            <a href="../account/login/login.php" rel="noopener noreferrer">login</a>
        </div>
    </div>';
}


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
