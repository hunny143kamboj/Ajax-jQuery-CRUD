<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>PHP AJAX CRUD</title>
</head>
<body>
    <div class="container">
        <center><h1>PHP AJAX CRUD USING BOOTSTRAP</h1></center>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add User
</button>
<br><br>
<div id="displayDataTable"></div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">FORM</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
      <div class="mb-2">
    <label for="completename" class="form-label">Name</label>
    <input type="text" class="form-control" id="completename" required>
  </div>
      </div>

      <div class="modal-body">
      <div class="mb-2">
    <label for="completeemail" class="form-label">Email</label>
    <input type="text" class="form-control" id="completeemail" required>
  </div>
      </div>

      <div class="modal-body">
      <div class="mb-2">
    <label for="completephone" class="form-label">Phone</label>
    <input type="text" class="form-control" id="completephone" required>
  </div>
      </div>

      <div class="modal-body">
      <div class="mb-2">
    <label for="completeplace" class="form-label">Place</label>
    <input type="text" class="form-control" id="completeplace" required>
  </div>
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-dark" onclick="adduser()">Submit</button>
      </div>
    </div>
  </div>
</div>

 <!-- Update modal -->

 <div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
      <div class="mb-2">
    <label for="updatename" class="form-label">Name</label>
    <input type="text" class="form-control" id="updatename" required>
  </div>
      </div>

      <div class="modal-body">
      <div class="mb-2">
    <label for="updateemail" class="form-label">Email</label>
    <input type="text" class="form-control" id="updateemail" required>
  </div>
      </div>

      <div class="modal-body">
      <div class="mb-2">
    <label for="updatephone" class="form-label">Phone</label>
    <input type="text" class="form-control" id="updatephone" required>
  </div>
      </div>

      <div class="modal-body">
      <div class="mb-2">
    <label for="updateplace" class="form-label">Place</label>
    <input type="text" class="form-control" id="updateplace" required>
  </div>
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-dark" onclick="UpdateDetails()">Update</button>
        <input type="hidden" id="hiddendata">
      </div>
    </div>
  </div>
</div>

    </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>

  $(document).ready(function(){
    displayData();
  });
    // display function
   function displayData(){
    var displayData = "true";
          $.ajax({
            url:"display.php",
            type:"post",
            data:{
                displaySend:displayData
            },
            success:function(data,status){
                $('#displayDataTable').html(data);
            }
          });
   }

// Add User

    function adduser(){
        var nameAdd = $('#completename').val();
        var emailAdd = $('#completeemail').val();
        var phoneAdd = $('#completephone').val();
        var placeAdd = $('#completeplace').val();

        $.ajax({
            url:"insert.php",
            type:"post",
            data:{
                nameSend:nameAdd,
                emailSend:emailAdd,
                phoneSend:phoneAdd,
                placeSend:placeAdd
            },
            success:function(data,status){
                //function to display data
                // console.log(status);
                $('#exampleModal').modal('hide');

                displayData();
            }
        });
    }

    // Delete User

  function DeleteUser(deleteid){
    $.ajax({
      url:"delete.php",
      type:"post",
      data:{
        deleteSend:deleteid
      },
    success:function(data,status){
      displayData();
    }
    });
  }

  // Update User

  function UpdateUser(updateid){
 $('#hiddendata').val(updateid);

 $.post("update.php",
 {
 updateid:updateid
 },
 function(data,status){

var userid=JSON.parse(data);

$('#updatename').val(userid.name);
$('#updateemail').val(userid.email);
$('#updatephone').val(userid.phone);
$('#updateplace').val(userid.place);

 });

$('#UpdateModal').modal("show");
}

// onclick update event function

function UpdateDetails(){
  var updatename = $('#updatename').val();
  var updateemail = $('#updateemail').val();
  var updatephone = $('#updatephone').val();
  var updateplace = $('#updateplace').val();
  var hiddendata = $('#hiddendata').val();

  $.post("update.php",{
        updatename:updatename,
        updateemail:updateemail,
        updatephone:updatephone,
        updateplace:updateplace,
        hiddendata:hiddendata
  },function(data,success){
$('#UpdateModal').modal('hide');
displayData();
  });

}

</script>

</body>
</html>