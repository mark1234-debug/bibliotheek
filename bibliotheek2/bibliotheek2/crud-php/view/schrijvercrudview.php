<?php
include_once '../db_conn.php';

$error_message = "";

// Check if the delete action is triggered
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    // Delete the schrijver from the database
    $sql = "DELETE FROM schrijvers WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);
    
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            header("Location: ../view/read.php");
            exit();
        } else {
            $error_message = "ERROR: Could not execute $sql. " . mysqli_error($conn);
        }
    } else {
        $error_message = "ERROR: Could not prepare $sql. " . mysqli_error($conn);
    }
}

// Check if the edit action is triggered
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $naam = $_POST['naam'];
    $nationaliteit = $_POST['nationaliteit'];
    $geboortedatum = $_POST['geboortedatum'];
    $beschrijving = $_POST['beschrijving'];

    // Update the schrijver information in the database using prepared statement
    $sql = "UPDATE schrijvers SET naam = ?, nationaliteit = ?, geboortedatum = ?, beschrijving = ? WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssi", $naam, $nationaliteit, $geboortedatum, $beschrijving, $id);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            header("Location: ../view/read.php");
            exit();
        } else {
            $error_message = "ERROR: Could not execute $sql. " . mysqli_error($conn);
        }
    } else {
        $error_message = "ERROR: Could not prepare $sql. " . mysqli_error($conn);
    }
}

// Check if the create action is triggered
if (isset($_POST['naam'])) {
    $naam = $_POST['naam'];
    $nationaliteit = $_POST['nationaliteit'];
    $geboortedatum = $_POST['geboortedatum'];
    $beschrijving = $_POST['beschrijving'];

    // Insert schrijver information into the database using prepared statement
    $sql = "INSERT INTO schrijvers (naam, nationaliteit, geboortedatum, beschrijving) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssss", $naam, $nationaliteit, $geboortedatum, $beschrijving);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            header("Location: ../view/read.php");
            exit();
        } else {
            $error_message = "ERROR: Could not execute $sql. " . mysqli_error($conn);
        }
    } else {
        $error_message = "ERROR: Could not prepare $sql. " . mysqli_error($conn);
    }
}

// Uncomment the following lines to display errors and debug information
error_reporting(E_ALL);
ini_set('display_errors', true);

var_dump($_POST);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <script>
        function validateForm() {
            // Retrieve the form input values
            var naam = document.getElementById("naam").value;
            var nationaliteit = document.getElementById("nationaliteit").value;
            var geboortedatum = document.getElementById("geboortedatum").value;
            
            // Perform validation checks
            if (naam === "") {
                alert("Please enter a naam.");
                return false;
            }
            
            // Additional validation checks for other fields
            
            // If all validation checks pass, return true to submit the form
            return true;
        }
    </script>
</head>

<body>
    <div class="container">
        <h1>Create Schrijver</h1>
        <?php if (!empty($error_message)) : ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form action="../model/schrijvercrudmodel.php" method="post" onsubmit="return validateForm()">
            <div class="alles">
                <label for="naam">Naam:</label>
                <input type="text" name="naam" class="form-control" id="naam" placeholder="Vul de naam in" required>
                
                <label for="nationaliteit">Nationaliteit:</label>
                <input type="text" name="nationaliteit" class="form-control" id="nationaliteit" placeholder="Vul de nationaliteit in">
                
                <label for="geboortedatum">Geboortedatum:</label>
                <input type="date" name="geboortedatum" class="form-control" id="geboortedatum" placeholder="Vul de geboortedatum in">
                
                <label for="beschrijving">Beschrijving:</label>
                <textarea name="beschrijving" class="form-control" id="beschrijving" placeholder="Voeg een beschrijving toe"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="schrijveredit.php" class="link-primary">edit</a>
            <a href="schrijverlijst.php">View</a> <!--naar de home pagina-->
        </form>
    </div>
</body>
</html>
