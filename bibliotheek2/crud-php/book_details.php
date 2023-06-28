<?php
session_start();

include "db_conn.php";
include "crud-php\model\readmodel.php";

if (isset($_GET['id'])) {
    $boek_id = $_GET['id'];

    // Retrieve the book details from the database
    $sql = "SELECT * FROM boeken WHERE boek_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $boek_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $book = mysqli_fetch_assoc($result);

    // Retrieve the book image if available
    $image_path = "";
    $sql = "SELECT image_path FROM images WHERE boek_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $boek_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $image = mysqli_fetch_assoc($result);
    if ($image) {
        $image_path = $image['image_path'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Book Details</title>
</head>
<body>
    
<?php require_once("navbar.php") ?>

    <div class="container">
        <h1>Book Details</h1>
        <?php if ($conn) { ?>
            <div class="book-details">
                <div class="book-image">
                    <?php if (!empty($image_path)) { ?>
                        <img src="../uploads/<?=$image_path?>" alt="<?=$book['titel']?>" width="200">
                    <?php } else { ?>
                        <img src="../uploads/plaatje boek.png" alt="No Image" width="200">
                    <?php } ?>
                </div>
                <div class="col-md-8">
                                    <h5 class="Titel">titel: <br><?=$rows['titel']?></h5>

                                    <p class="rows">categorie: <?=$rows['categorie']?></p>

                                    <!--<p><?=$rows['datum']?></p>-->

                                    <p class="rows">Uitgever: <?=$rows['uitgever']?></p>

                                    <p class="rows">Schrijver: <?=$rows['schrijver']?></p>

                                    <p class="rows">Uitgeleend: <?php if ($rows['uitgeleend'] == 0) {
                                            echo "Nee";
                                        } else {
                                            echo "Ja";
                                        } ?></p>
                                    <p><?=$rows['description']?></p>

                                    <div><!--het gedeelte dat voor de rollen zorgt-->
                                        <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 'Medewerker' || $_SESSION['role'] == 'Admin')) { ?>
                                            <a href="update.php?id=<?=$rows['boek_id']?>" class="btn btn-warning">Edit</a>
                                            <a href="delete.php?id=<?=$rows['boek_id']?>" class="btn btn-danger">Verwijder</a>
                                        <?php } elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'Lezer') { ?>
                                        <?php } ?>
                                    </div>
                                </div>
            </div>
        <?php } else { ?>
            <p>Book not found.</p>
        <?php } ?>
    </div>
</body>
</html>
