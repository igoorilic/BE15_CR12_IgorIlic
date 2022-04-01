<?php 
error_reporting(E_ALL); 
ini_set('display_errors', TRUE);

require_once "components/db_connect.php";

$sql = "SELECT * FROM products";

$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) == 0){
    $rows = "No result";
} else {
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "components/boot.php" ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
    <!-- nav begin  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <div class="container ">
    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
      <div>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active lol" aria-current="page" href="showAll.php">Home</a>
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
<!-- slider begin  -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="pictures/slider1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="pictures/slider2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="pictures/slider3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- slider end  -->
<!-- main begin  -->
<div class="container">
        <div class="text-center mt-5 mb-5">
            <a href="create.php" class="btn btn-primary fs-4 mb-4">Create a offer</a>
        </div>
        <div>
        <div class="row row-cols-lg-3 row-cols-md-8">
            <?php 
                if(is_array($rows)){

                
                foreach($rows as $row){ 
            ?>
            <div class="col text-center d-flex justify-content-center">
                <div class="card mb-5 text-center mx-0" style="width: 18rem;">
                    <img src="pictures/<?= $row["picture"] ?>" class="card-img-top" alt="..." height="300px">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row["locationName"] ?></h5>
                        <p class="card-text"><?= $row["description"]?></p>
                        <a href="details.php?id=<?= $row["id"] ?>" class="btn btn-primary">Show offer</a>
                        <div class="mt-2">
                        <a href="update.php?id=<?= $row["id"] ?>" class="btn btn-warning">Update</a>
                        <a href="delete.php?id=<?= $row["id"] ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
            }
                ?>
        </div>
        </div>
    </div>
<!-- main end  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>