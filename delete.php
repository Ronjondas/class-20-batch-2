<?php
require_once ("lib/connection.php");


if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "DELETE FROM students WHERE id=" .$id;
    $status = $conn->query($sql);

    if($status){
        echo "Delete successfully";
    }else{
        echo "something wrong";
    }

}



//redirect page to home page
header("Location: index.php");
?>

