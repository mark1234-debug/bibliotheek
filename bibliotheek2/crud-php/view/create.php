<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container">
        <h1>Create</h1>
        <form action="../model/createmodel.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="alles">
                <label for="titel">Titel Boek:</label>
                <input type="text" name="titel" class="form-control" id="titel"  placeholder="Vul de titel in">
                
                <label for="cat">Categorie:</label>
                <select name="cat" class="form-control" id="cat" placeholder="Wat is de categorie?">
                    <option value="" selected disabled>Kies een categorie</option>
                    <?php
                    $categories = array(
                        "Romans",
                        "Thrillers",
                        "Misdaad",
                        "Sciencefiction",
                        "Fantasy",
                        "Jongvolwassenen",
                        "Kinderboeken",
                        "Biografieën",
                        "Geschiedenis",
                        "Filosofie",
                        "Reizen",
                        "Kookboeken",
                        "Zelfhulp",
                        "Poëzie",
                        "Wetenschap",
                        "Kunst en Cultuur",
                        "Religie en Spiritualiteit",
                    );
                
                    foreach ($categories as $category) {
                        echo '<option value="' . $category . '">' . $category . '</option>';
                    }
                    ?>
                </select>
                
                <label for="datum">Datum:</label>
                <input type="date" name="datum" class="form-control" id="Datum"  placeholder="Wat is de datum van publicatie?">
                
                <label for="uitgever">Uitgever:</label>
                <input type="text" name="uitgever" class="form-control" id="Uitgever"  placeholder="Wie is de uitgever?">
                
                <label for="schrijver">Schrijver:</label>
                <select name="schrijver" class="form-control" id="Schrijver" placeholder="Wie is de schrijver?">
                    <option value="" >Selecteer een schrijver</option>
                    <?php
                    include "db_conn.php";

                    // Retrieve schrijvers from the database
                    $query = "SELECT * FROM schrijvers";
                    $result = mysqli_query($conn, $query);

                    // Display schrijvers as options in the dropdown
                    include "../model/createmodel.php";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['id'] . '">' . $row['naam'] . '</option>';
                    }
                    ?>
                </select>
              <!--  <input type="text" name="schrijver" class="form-control" id="Schrijver"  placeholder="Wie is de schrijver?"> -->

                <a href="#" onclick="openCreateSchrijverPopup()">Add New Schrijver</a>
                <script>
    	        function openCreateSchrijverPopup() {
    	            // Open the create schrijver popup using a new window or a modal dialog, depending on your requirements
    	            // Customize the URL or method of opening the popup as needed
    	            window.open('schrijvercrudview.php', 'Create Schrijver', 'width=600,height=400');
    	        }
    	        </script>

                <label for="description">Beschrijving:</label>
                <textarea name="description" class="form-control" id="description"  placeholder="Voeg een beschrijving toe"></textarea>

                <label for="uitgeleend">Uitgeleend:</label>
                <input type="checkbox" name="uitgeleend" value="1">

                <label for="image">Afbeelding:</label>
                <input type="file" name="image" class="form-control" id="image" enctype="multipart/form-data">
                
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="read.php" class="link-primary">View</a>
            <a href="index.php">Home</a> <!--naar de home pagina-->
        </form>
    </div>
</body>
</html>
