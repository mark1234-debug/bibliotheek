<?php
session_start();

include "../db_conn.php";

if (isset($_POST['uitlenen'])) {
    $boek_id = $_POST['boek_id'];
    
    // Update the book status in the database
    $update_sql = "UPDATE boeken SET uitgeleend = 1 WHERE boek_id = ?";
    $update_stmt = mysqli_prepare($conn, $update_sql);
    mysqli_stmt_bind_param($update_stmt, "i", $boek_id);

    if (mysqli_stmt_execute($update_stmt)) {
        mysqli_stmt_close($update_stmt);
        header("Location: ../view/read.php");
        exit();
    } else {
        // Handle any errors during the update process
        $error_message = "ERROR: Could not update the book status.";
    }
}
?>