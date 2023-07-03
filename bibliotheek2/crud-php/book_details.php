<?php
include "./db_conn.php";



if (isset($_GET['boek_id'])) {
    $bookId = $_GET['boek_id'];
    $sql = "SELECT * FROM boeken WHERE boek_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $bookId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $book = mysqli_fetch_assoc($result);
        // Continue with displaying the book details
    } else {
        echo "Book not found.";
    }
} else {
    echo "Invalid book ID.";

}

if (!$result) {
    echo "Error: " . mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
</head>
<body>
    <?php if (isset($book)): ?>
        <h2>Book Details</h2>
        <p>Title: <?=$book['titel']?></p>
        <p>Category: <?=$book['categorie']?></p>
        <p>Publisher: <?=$book['uitgever']?></p>
        <p>Author: <?=$book['schrijver']?></p>
        <p>Description: <?=$book['description']?></p>
        <!-- Additional book details -->

        <!-- Add your desired HTML structure to display the book details -->
    <?php endif; ?>
</body>
</html>