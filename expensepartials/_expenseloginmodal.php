<?php
include "_expensedbconnect.php";
 ?>

<?php
// echo $_SERVER["REQUEST_METHOD"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM `signup` WHERE `username`='$username';";
  $result = mysqli_query($conn,$sql);
  $num = mysqli_num_rows($result);
  // echo $num;
//   $row = mysqli_fetch_array($result);
 
//   // $arr =  var_dump($row);
//   // echo $arr;
//   // echo "<br>";
//   // echo $row['password'];
//   // echo "<br>";
//   // echo "User ne taklela password ".$password;
if($num>0){
    $loginSuccessAlert = true;
    session_start();
    $_SESSION["loggedIn"] = true;
    $_SESSION["username"] = $username;
    ?>
    <script type="text/javascript">
    window.location.href = 'expensetrackerhome.php';
    </script>
    <?php
    // header("Location: expensetrackerhome.php");
  
//  if(isset($_SESSION)){


  // }
    // do{
    //     $row = mysqli_fetch_array($result);
    //     echo $row['password'];
    //     echo $password;
    //     echo $row['username'];
    //     echo $username;
    //     if($row['password']==$password && $row['username']==$username){
    //         //  break;
    //     }
    // }while($row != NULL);
}
else{
    $invalidCredentials = true;
}
}
?>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="expensetracker.php" method="post">
      <div class="modal-body">
  <div class="form-group">
    <label for="username">Username</label>
    <input name="username" type="text" class="form-control" id="username" >

  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input name="password" type="password" class="form-control" id="password">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</form>
    </div>
  </div>
</div>