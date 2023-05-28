<?php
include "_expensedbconnect.php";
$signUpSuccessAlert = false;
$pdiffAlert = false;
$userExistsAlert = false;
 ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['issignup'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $sql = "SELECT * FROM `signup` WHERE `username`='$username'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($password == $cpassword && $num<1){
    $sql = "INSERT INTO `signup` (`username`, `password`, `time`) VALUES ('$username', '$password', current_timestamp())";
    $result = mysqli_query($conn,$sql);
    $signUpSuccessAlert = true;
    }
    else{
      if($password != $cpassword){
        $pdiffAlert = true;
      }
      else{
        $userExistsAlert = true;
      }
    }
}
}
?>

<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="expensetracker.php" method="post">
      <div class="modal-body">
      <input name="issignup" value="true" hidden type="text" class="form-control" id="issignup" >
  <div class="form-group">
    <label for="username">Username</label>
    <input name="username" type="text" class="form-control" id="username" >

  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input name="password" type="password" class="form-control" id="password">
  </div>
  <div class="form-group">
    <label for="cpassword">Confirm Password</label>
    <input name="cpassword" type="password" class="form-control" id="cpassword">
  </div>

  <button type="submit" class="btn btn-primary">Sign Up</button>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</form>
    </div>
  </div>
</div>