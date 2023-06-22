<?php
include_once '../db_conn.php';

// Retrieve schrijvers from the database
$sql = "SELECT * FROM schrijvers";
$result = mysqli_query($conn, $sql);

// Check if there are any schrijvers
if (mysqli_num_rows($result) > 0) {
    echo "<h2>Schrijvers List</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Naam</th><th>Nationaliteit</th><th>Geboortedatum</th><th>Beschrijving</th><th>Actions</th></tr>";

    // Iterate over each row and display schrijver information
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $naam = $row['naam'];
        $nationaliteit = $row['nationaliteit'];
        $geboortedatum = $row['geboortedatum'];
        $beschrijving = $row['beschrijving'];

        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$naam</td>";
        echo "<td>$nationaliteit</td>";
        echo "<td>$geboortedatum</td>";
        echo "<td>$beschrijving</td>";
        echo "<td><a href='schrijveredit.php?id=$id'>Edit</a> | <a href='../model/schrijvercrudmodel.php?delete=$id'>Delete</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No schrijvers found.";
}

mysqli_close($conn);
?>
