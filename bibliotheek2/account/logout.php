<<<<<<< HEAD
<?php
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or any other page you prefer
header('Location: ../account/login/login.php');
exit();
?>
=======
>>>>>>> c83a5d4c1371a046ccf09c6c54eceba9ec27d3ae
