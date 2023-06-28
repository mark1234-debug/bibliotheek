
<?php 

$_SESSION['role'] = 'Admin';

$role = $_SESSION['role'];

if ($role === 'Admin' ) {echo 
    '<div class="header">
        <h1 style="float: left;">FIRDA admin</h1>
<!-- de navbar in de header -->
<div class="navbar">
<!-- de links in de navbar -->
      <a class="active" href="index.php" >Home</a>
      <a href="admin-pannel.php">admin pannel</a>
      <a href="book_details.php">Boeken</a>
      <a href="../account/login/login.php">inloggen/registreren</a>
      <a href="">Reservaties (komt nog)</a>
      <!--<a href="../account (1)/login/login.php" target="_blank" rel="noopener noreferrer">inloggen</a>-->
  </div>
    </div>';
}

else if ($role === "Medewerker") {echo
    '<div class="header">
            <h1 style="float: left;">FIRDA medewerker</h1>
    <!-- de navbar in de header -->
    <div class="navbar">
    <!-- de links in de navbar -->
          <a class="active" href="index.php" >Home</a>
          <a href="admin-pannel.php">admin pannel</a>
          <a href="view/read.php">Boeken</a>
          <a href="../account/login/login.php">inloggen/registreren</a>
          <a href="">Reservaties (komt nog)</a>
          <!--<a href="../account (1)/login/login.php" target="_blank" rel="noopener noreferrer">inloggen</a>-->
      </div>
        </div>';
    }

else if ($role === "Lid") {echo
    '<div class="header">
            <h1 style="float: left;">FIRDA lid</h1>
    <!-- de navbar in de header -->
    <div class="navbar">
    <!-- de links in de navbar -->
          <a class="active" href="index.php" >Home</a>
          <a href="view/read.php">Boeken</a>
          <a href="../account/login/login.php">inloggen/registreren</a>
          <a href="">Reservaties (komt nog)</a>
          <!--<a href="../account (1)/login/login.php" target="_blank" rel="noopener noreferrer">inloggen</a>-->
      </div>
        </div>';
    }

else {echo
'<div class="header">
        <h1 style="float: left; ">FIRDA Lezer</h1>
<!-- de navbar in de header -->
<div class="navbar">
<!-- de links in de navbar -->
      <a class="active" href="index.php" >Home</a>
      <a href="view/read.php">Boeken</a>
      <a href="" target="_blank" rel="noopener noreferrer">word lid</a>
      <a href="" target="_blank" rel="noopener noreferrer">login</a>
  </div>
    </div>';
}

?>

