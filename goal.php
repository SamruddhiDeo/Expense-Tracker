<?php
 include "expensepartials/_expensedbconnect.php";

session_start(); 
?>

<?php
$username = $_SESSION["username"];
//To make completion symbol cross if target date crossed
$sqlc = "SELECT * FROM goal WHERE `goal`.`username` = '$username';";
$resultc = mysqli_query($conn, $sqlc);
while($rowc =  mysqli_fetch_assoc($resultc)){
    $id = $rowc["goal_id"];
    $reqamount = $rowc['req_amount'];
    $targetdate = $rowc["date"];
    if($reqamount <= 0){
        $sql = "UPDATE `goal` SET `completion` = '&#x2705;' WHERE `goal_id` = '$id';";
        $result = mysqli_query($conn,$sql);

      
    }
    else if((substr($targetdate,0,4) < substr(date("Y-m-d"),0,4)) || ((substr($targetdate,0,4) <= substr(date("Y-m-d"),0,4)) && (substr($targetdate,5,2) < substr(date("Y-m-d"),5,2))) || ((substr($targetdate,0,4) <= substr(date("Y-m-d"),0,4)) && (substr($targetdate,5,2) <= substr(date("Y-m-d"),5,2))  && (substr($targetdate,8,2) < substr(date("Y-m-d"),8,2)))){
    
        $sql = "UPDATE `goal` SET `completion` = '&#10062;' WHERE `goal`.`goal_id` = '$id';";
        $result = mysqli_query($conn,$sql);

     
    }
    // <!-- else{
    //     $sql = "UPDATE `goal` SET `completion` = '---' WHERE `goal`.`goal_id` = $id;";
    //     $result = mysqli_query($conn,$sql);
    // } -->
   
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['savedamount'])){
    // echo '
    // <script>
    //     location.reload() 
    // </script>
    // ';
    header("Location: ".$_SERVER['PHP_SELF']);
    $savedamount = $_POST['savedamount'];
    $id = $_POST['id'];
    $username = $_SESSION['username'];

    $sql = "SELECT * FROM goal WHERE `goal`.`goal_id` = $id";
    $result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$goal_title = $row["title"];
$date = date("d-m-Y");

    //for piechart updation
    $sqlp = "INSERT INTO `expense` (`title`, `amount`, `date`, `category`, `username`) VALUES ('$goal_title','$savedamount','$date', 'Goals', '$username');";
    $resultp = mysqli_query($conn,$sqlp);
    echo mysqli_error($conn);

//selecting goal table
$sqlg = "SELECT * FROM `goal` WHERE `goal_id` = '$id';";
$resultg = mysqli_query($conn,$sqlg);
$rowg = mysqli_fetch_assoc($resultg);
$reqamount = $rowg['req_amount'] - $savedamount;

    $sql = "UPDATE `goal` SET `req_amount` = '$reqamount' WHERE `goal`.`goal_id` = $id;";
    $result = mysqli_query($conn,$sql);
  }
  else{
    $title = $_POST['title'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $username = $_SESSION['username'];
    $sql = "INSERT INTO `goal` (`title`, `amount`,`req_amount`, `date`, `username`,`completion`) VALUES ('$title', '$amount','$amount', '$date', '$username','---');";
    $result = mysqli_query($conn,$sql);
  }

  }
  ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="expensecss/nexpenseheader.css">
    <link rel="stylesheet" href="expensecss/goal.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <title>Expense Tracker</title>
</head>

<body>
    <?php
   include 'expensepartials/_expensenheader.php';
   ?>
    <div class="container goalbox my-3">
        <h1 class="my-3 text-center">Add Goal</h1>
        <form class="my-3" action="goal.php" method="post">
            <div class="form-group">
                <label for="title">Enter Title</label>
                <input required name="title" type="text" class="" id="title" size="50">

            </div>
            <div class="form-group">
                <label for="amount">Enter Amount</label>
                <input required name="amount" type="number" class="" id="amount" size="50">
            </div>
            <div class="form-group">
                <label for="date">Target Date</label>
                <input required name="date" type="date" class="" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" id="date" size="50">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="maingoalprogress container my-5">
        <?php
  	 $sql = "SELECT * FROM `goal` WHERE `goal`.`username` = '$username';";
     $result = mysqli_query($conn,$sql);
     $num = mysqli_num_rows($result);
       $no = 1;
       if($num > 0){
        echo '  <table class="table my-4 "">
        <thead>
         <tr>
         <th scope="col">Sno</th>
         <th scope="col">Title</th>
         <th scope="col">Total Amount</th>
         <th scope="col">Required Amount</th>
         <th scope="col">Date</th>
         <th scope="col">Save</th>
         <th scope="col">Completion</th>

         </tr>
         </thead>
         <tbody>';
         while($row = mysqli_fetch_assoc($result)){
  echo '<tr>
  <td>'. $no .'</td>
  <td>'. $row["title"] .'</td>
  <td>'. $row["amount"] .'</td>
  <td>'. $row["req_amount"] .'</td>
  <td>'. $row["date"] .'</td>
  <td>
    <form action="goal.php" method="post">
    <input hidden value="'. $row["goal_id"] .'" name="id" type="number">
    <input required name="savedamount" type="number">
    <button type="submit">Save</button></a>
  </form>
</td>
<td>'. $row["completion"] .'</td>

</tr>';
          
          
          $no++;
        }
      }
        ?>
        </tbody>
        </table>



    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>