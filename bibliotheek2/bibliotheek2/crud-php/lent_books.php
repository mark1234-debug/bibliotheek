<?php
session_start();

include "db_conn.php";

$error_message = "";

if (isset($_POST['boek_id'])) {
    $boek_id = $_POST['boek_id'];
    $gebruiker_id = $_SESSION['username'];

    // Check if the book is already lent
    $check_sql = "SELECT * FROM uitgeleende_boeken WHERE boek_id = ? AND retourdatum IS NULL";
    $check_stmt = mysqli_prepare($conn, $check_sql);
    mysqli_stmt_bind_param($check_stmt, "i", $boek_id);
    mysqli_stmt_execute($check_stmt);
    $check_result = mysqli_stmt_get_result($check_stmt);

    if (mysqli_num_rows($check_result) > 0) {
        $error_message = "Het boek is al uitgeleend.";
    } else {
        // Insert lending information into the uitgeleende_boeken table
        $insert_sql = "INSERT INTO uitgeleende_boeken (boek_id, username, begindatum) VALUES (?, ?, CURDATE())";
        $insert_stmt = mysqli_prepare($conn, $insert_sql);
        mysqli_stmt_bind_param($insert_stmt, "ii", $boek_id, $gebruiker_id);

        if (mysqli_stmt_execute($insert_stmt)) {
            mysqli_stmt_close($insert_stmt);
            header("Location: lent_books.php");
            exit();
        } else {
            $error_message = "Er is een fout opgetreden bij het uitlenen van het boek.";
        }
    }
}

$sql = "SELECT boeken.*, begindatum, username
        FROM uitgeleende_boeken
        INNER JOIN boeken ON uitgeleend_id = boeken.boek_id
        INNER JOIN accounts ON username
        WHERE einddatum IS NULL";

$result = mysqli_query($conn, $sql);

// Check for query execution error
if (!$result) {
    $error_message = "Er is een fout opgetreden bij het ophalen van uitgeleende boeken: " . mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Uitgeleende Boeken</title>
</head>
<body>
    <div class="navbar">
        <div class="nav-item"><a href="../index.html">Home</a></div>
        <div class="nav-item"><a href="../../account (1)/login/login.php">Inloggen</a></div>
        <div class="nav-item"><a href="#">Diensten</a></div>
        <div class="nav-item"><a href="#">Contact</a></div>
        <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 'Medewerker' || $_SESSION['role'] == 'Admin')) { ?>
            <div class="nav-item"><a href="../view/create.php">Toevoegen</a></div>
        <?php } ?>
    </div>

    <div class="container">
        <h1>Uitgeleende Boeken</h1>
        <?php if (!empty($error_message)) : ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <div class="lent-books">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class="lent-book">
                    <h3><?php echo $row['titel']; ?></h3>
                    <p><strong>Uitgeleend door:</strong> <?php echo $row['gusername']; ?></p>
                    <p><strong>Uitleendatum:</strong> <?php echo $row['begindatum']; ?></p>
                </div>
            <?php endwhile; ?>
            
        </div>

        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Lezer') { ?>
            <h2>Boek uitlenen</h2>
            <form action="lent_books.php" method="POST">
                <div class="form-group">
                    <label for="boek_id">Boek ID:</label>
                    <input type="text" name="boek_id" id="boek_id" required>
                </div>
                <button type="submit" name="lend" class="btn btn-primary">Uitlenen</button>
            </form>
        <?php } ?>
    </div>
</body>
</html>
