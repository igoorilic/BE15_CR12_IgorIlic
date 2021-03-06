<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
            #map {
                height: 90%;
            }

           html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
    </style>
    <?php require_once "components/boot.php" ?>
    <title>Details</title>
</head>
<body>
    <?php 
    error_reporting(E_ALL); 
    ini_set('display_errors', TRUE);
    

    require_once "components/db_connect.php";
    if(isset($_GET["id"]) && !empty ($_GET["id"])){

        $id = $_GET["id"];
        $sql = "SELECT * FROM products WHERE id = {$id}";  
        $result = mysqli_query($connect,$sql);
        $row = mysqli_fetch_assoc($result);  
        $longitude = $row['longitude'];
        $latitude = $row['latitude'];
              
    ?>
        <!-- nav begin  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <div class="container ">
    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
      <div>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active lol" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="showAll.php">Show all</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link active" href="#">Contact</a>
        </li>
        </div>
        <div>
        <li>
          <a href="#" class="fa fa-facebook ms-5"></a>
          <a href="#" class="fa fa-twitter"></a>
          <a href="#" class="fa fa-google"></a>
          <a href="#" class="fa fa-linkedin"></a>
          <a href="#" class="fa fa-youtube"></a>
          <a href="#" class="fa fa-instagram"></a>
          <a href="#" class="fa fa-pinterest"></a>
          <a href="#" class="fa fa-snapchat-ghost"></a>
        </li>
        </div>
      </ul>
    </div>
  </div>
</nav>
<!-- nav end  -->

<!-- card begin  -->

<div class="d-flex justify-content-center mt-5">
<div class="card text-center d-flex" style="width: 18rem;">
<img src="pictures/<?= $row["picture"] ?>"  class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $row["locationName"] ?></h5>
    <p class="card-text">Price: <?= $row["price"]?></p>
    <p class="card-text"><?= $row["description"] ?></p>
    <a href="index.php" class="btn btn-primary">Home</a>
  </div>
</div>
</div>
<!-- card end  -->

<!-- maps begin  -->

<div class="" id="map"></div>
        <script>
            var map;
            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: <?php echo $longitude?>, lng: <?php echo $latitude?>}, zoom: 8
                });
                var pinpoint = new google.maps.Marker({
                position: {lat: <?php echo $longitude?>, lng: <?php echo $latitude?>},
                map: map
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap" async defer></script>

<!-- maps end  -->
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php }
else {
    header("Location: index.php");
} ?>