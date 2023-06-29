<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Home.css">
    <title>Bibliotheek home</title>
</head>

<body>
<?php $_SESSION['activeTab'] = 'home'; $activeTab = $_SESSION['activeTab']; include_once("navbar.php"); ?>

    <img class="achtergrond" src="uploads/simple-bookshelf.jpg" alt="achtergrond">
    <div class="front">
        <div class="front_img">
            <img src="uploads/FirdaGeel_Groen-07_0_0.png" alt="firdalogo">
            <h1>welkom op de Firda bibliotheek site</h1>
        </div>

        <div class="knoppen_front">
            <a class="btn verzameling" href="view/read.php">bekijk onze verzameling</a>
            <?php if (empty($_SESSION['role'])): ?>
                <a class="btn word_lid" href="../account/signup/register.index.php">Word lid</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="informatie">
        <h3>nieuw</h3>

        <div class="box">
            <?php
            include_once("db_conn.php");

            // hier haalt ie de 3 boeken die bovenaan staan als je sorteert op datum op
            $query = "SELECT * FROM boeken ORDER BY datum DESC LIMIT 3";
            $result = mysqli_query($conn, $query);

            // Loop door de resultaten en laat de nieuwste zien
            while ($row = mysqli_fetch_assoc($result)) {
                $title = $row['titel'];
                $author = $row['schrijver'];
                $coverImage = base64_encode($row['image']); // Convert BLOB to base64

                // hier wordt de informatie van het boek weergegeven
                echo '<div class="release">';
                echo '<img src="data:image/jpeg;base64,' . $coverImage . '" alt="' . $title . '">';
                echo '<h4>' . $title . '</h4>';
                echo '<p>' . $author . '</p>';
                echo '<a class="btn" href="book_details.php?id='. $row["boek_id"] .'">View Book</a>'; // Button to view book details
                echo '</div>';
            }

            // Free the result set
            mysqli_free_result($result);
            ?>
        </div>
    </div>

    <div class="footer">
        <h1>FIRDA</h1>
    </div>

</body>

</html>
