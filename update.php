<?php

include "connect.php";

if(isset($_POST['updateid'])){
    $userid = $_POST['updateid'];
    $sql = "SELECT * FROM users WHERE id=$userid";
    $result = mysqli_query($conn,$sql);
    $response = mysqli_fetch_assoc($result);
    // $response = array();
    // while($row=mysqli_fetch_assoc($result)){
    //   $response = $row;
    // }
    echo json_encode($response);
}

// }else{
//     // $response['status']=200;
//     // $response['message']="Invalid or data not found";
// }

// update data

if(isset($_POST['hiddendata'])){
    $uniqueid = $_POST['hiddendata'];
    $name = $_POST['updatename'];
    $email = $_POST['updateemail'];
    $phone = $_POST['updatephone'];
    $place = $_POST['updateplace'];

    $sql = "UPDATE users SET name='$name',email='$email',phone='$phone',place='$place' WHERE id=$uniqueid";
    $result = mysqli_query($conn,$sql);
    if(!$result){
       die(mysqli_error($conn)); 
    }

}

?>