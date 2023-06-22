<?php
session_start();

include "db_conn.php";

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: account (1)/login/login.php");
    exit();
}

// Check if the book ID is provided
if (!isset($_GET['id'])) {
    header("Location: lent_books.php");
    exit();
}

$boek_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

// Check if the book is already lent
$sql = "SELECT * FROM uitgeleende_boeken WHERE boek_id = ? AND username = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ii", $book_id, $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    // Error occurred while executing the query
    echo "Error: " . mysqli_error($conn);
    exit();
}

if (mysqli_num_rows($result) > 0) {
    // Book is already lent
    header("Location: lent_books.php");
    exit();
}

// Insert the lending information into the database
$sql = "INSERT INTO uitgeleende_boeken (boek_id, username, begindatum) VALUES (?, ?, NOW())";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ii", $boek_id, $user_id);

if (mysqli_stmt_execute($stmt)) {
    // Book successfully lent
    header("Location: lent_books.php");
    exit();
} else {
    // Error occurred while lending the book
    echo "Error lending the book.";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
