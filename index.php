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
    <title>Document</title>
</head>
<body>
    <!-- nav begin  -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="showAll.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="showAll.php">Show all</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- nav end  -->
<!-- main begin  -->
<div class="container">
        <div class="text-center mt-5 mb-5">
            <a href="create.php" class="btn btn-primary fs-4 mb-4">Create a offer</a>
            <h1>All offers: </h1>
        </div>
        <div class="row row-cols-lg-4 row-cols-md-8 d-flex justify-content-evenly">
            <?php 
                if(is_array($rows)){

                
                foreach($rows as $row){ 
            ?>
            <div class="col">
                <div class="card mb-5 text-center" style="width: 18rem;">
                    <img src="pictures/<?= $row["picture"] ?>" class="card-img-top" alt="..." height="400px">
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
<!-- main end  -->
</body>
</html>