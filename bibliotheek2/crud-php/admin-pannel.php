<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="home.css">
  <title>Document</title>
  
</head>
<body>

<?php $_SESSION['activeTab'] = 'admin'; $activeTab = $_SESSION['activeTab']; include_once("navbar.php"); ?>

<div class="tab">
  <button class="tablinks" onclick="openPopup('./view/schrijvercrudview.php')">Schrijver CRUD</button>
  <button class="tablinks" onclick="openPopup('../employees-crud/home.php')">Employees CRUD</button>
  <button class="tablinks" onclick="openPopup('../account/login/login.php')">Login</button>
  <button class="tablinks" onclick="openPopup('./view/read.php')">Read</button>
  <button class="tablinks" onclick="openPopup('./view/create.php')">Create</button>
</div>

  <div id="popupContainer" class="popup">
    <iframe id="popupContent" frameborder="0" width="100%" height="100%"></iframe>
  </div>

  <script>
    function openPopup(url) {
      var popup = document.getElementById('popupContainer');
      var content = document.getElementById('popupContent');
      
      content.src = url;
      popup.style.display = 'block';
    }
  </script>
</body>
</html>