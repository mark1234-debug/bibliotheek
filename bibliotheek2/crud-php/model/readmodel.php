<?php
include "C:\wamp64\www\crud-php\db_conn.php";

function getFilteredBooks($filter, $filter_query)
{
    global $conn;
    
    // Prepare the query using placeholders
    $sql = "SELECT * FROM boeken WHERE $filter LIKE ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind the values to the placeholders
    $filter_query = '%' . $filter_query . '%';
    mysqli_stmt_bind_param($stmt, "s", $filter_query);
    
    // Execute the prepared statement
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    return $result;
}

function getAllBooks()
{
    global $conn;

    $sql = "SELECT boeken.*, images.image_path FROM boeken LEFT JOIN images ON boeken.boek_id = images.boek_id";
    $result = mysqli_query($conn, $sql);

    return $result;
}
?>