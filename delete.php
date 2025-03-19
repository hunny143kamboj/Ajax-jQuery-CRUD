<?php

include "connect.php";

if(isset($_POST['deleteSend'])){
    $unique = $_POST['deleteSend'];

    $sql = "DELETE from users WHERE id = $unique";
    $result = mysqli_query($conn,$sql);
    if(!$result){
        
    die(mysqli_error($conn));
    
    }
}
?>