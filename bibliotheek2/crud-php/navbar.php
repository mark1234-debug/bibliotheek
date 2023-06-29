<?php 

include "db_conn.php";

$role = $_SESSION['role'] ?? '';

// hierboven word de rol van de user gechecked als deze bestaat


if ($role === 'Admin') {
    echo '<div class="header">
        <h1 style="float: left;">FIRDA admin</h1>
<!-- de navbar in de header -->
<div class="navbar">
<!-- de links in de navbar -->
      <a class="active" href="" >Home</a>
      <a href="admin-pannel.php">admin pannel</a>
      <a href="view/read.php">Boeken</a>
      <a href="../account\logout.php">log uit</a>
      <a href="../account/login/login.php">inloggen/registreren</a>
      <a href="">Reservaties (komt nog)</a>
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
            <a href="../account/logout.php">log uit</a>
            <a href="">Reservaties (komt nog)</a>
        </div>
    </div>';
} else if ($role === "Lid") {
    echo '<div class="header">
        <h1 style="float: left;">FIRDA lid</h1>
        <!-- de navbar in de header -->
        <div class="navbar">
            <!-- de links in de navbar -->
            <a class="active" href="" target="_blank" rel="noopener noreferrer">Home</a>
            <a href="view/read.php">Boeken</a>
            <a href="../account/logout.php">log uit</a>
            <a href="">Reservaties (komt nog)</a>
        </div>
    </div>';
} else {
    echo '<div class="header">
        <h1 style="float: left;">FIRDA</h1>
        <!-- de navbar in de header -->
        <div class="navbar">
            <!-- de links in de navbar -->
            <a class="active" href="../index.php">Home</a>
            <a href="read.php">Boeken</a>
            <a href="../account/signup/register.index.php" target="_blank" rel="noopener noreferrer">word lid</a>
            <a href="./account/login/login.php" target="_blank" rel="noopener noreferrer">login</a>
        </div>
    </div>';
}

?>
