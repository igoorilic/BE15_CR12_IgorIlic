<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "components/boot.php"?>
    <?php require_once "components/db_connect.php" ?>
    <title>AJAX</title>
</head>
<body>
<div class="container">
       <h2>AJAX - API request</h2>
       <button type="button" id="btn" class="btn btn-primary">Load content</button>
       <hr>
       <div id="content" class="row" href="displayAll.php"></div>
   </div>

   <script>
       document.getElementById('btn').addEventListener('click', loadApiContent);
       let content = document.getElementById('content');
       function loadApiContent() {
           let ajReq = new XMLHttpRequest();
           ajReq.open("GET", displayAll.php);
           ajReq.send();
       }
   </script>
    
</body>
</html>