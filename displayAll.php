<?php 
require_once "components/db_connect.php";
// if the method is GET then... 
function response(){
}
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $sql = 'SELECT * FROM products';
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($connect);

    echo json_encode($row);
}
?>