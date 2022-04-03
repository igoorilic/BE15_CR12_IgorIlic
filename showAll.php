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
        <h2>AJAX - API</h2>
        <!-- refering the function on the onclick button and creating the function down below -->
        <button type="button" class="btn-primary" onclick="loadApiContent()">Load content</button>
        <!-- content is gonna get printed here -->
        <div id="content"></div>
    <script>
        // creating the function
        function loadApiContent() {
            
            let contentApi = new XMLHttpRequest();
            contentApi.onload = function(){
                    document.getElementById("content").innerHTML = this.responseText;
                
            };
            contentApi.open("GET", "displayAll.php");
            contentApi.send();
        }
    </script>
</div>
    
</body>
</html>