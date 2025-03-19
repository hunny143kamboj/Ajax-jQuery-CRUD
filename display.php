<?php

include "connect.php";

if(isset($_POST['displaySend'])){
    $table='<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Place</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>';

  $sql = "SELECT * FROM users";
  $result = mysqli_query($conn,$sql);
  $i=1;
  while($row=mysqli_fetch_assoc($result)){
  $id = $row['id'];
  $name = $row['name'];
  $email = $row['email'];
  $phone = $row['phone'];
  $place = $row['place'];
  $table.='<tr>
      <td scope="row">'.$i.'</td>
      <td>'.$name.'</td>
      <td>'.$email.'</td>
      <td>'.$phone.'</td>
      <td>'.$place.'</td>
      <td>
      <button class="btn btn-dark" onclick="UpdateUser('.$id.')">Update</button>
      <button class="btn btn-danger" onclick="DeleteUser('.$id.')">Delete</button>
      </td>

    </tr>';
  $i++;
  }

  $table.= '</table>';
   echo $table;

}
?>
