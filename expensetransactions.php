<?php
 include "expensepartials/_expensedbconnect.php";
session_start();
?>
<?php 
  if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['delete'])){
        $id = $_GET['delete'];
        $sql = "DELETE FROM expense WHERE `expense`.`expense_id` = $id;";
        $result = mysqli_query($conn,$sql);
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
    <link rel="stylesheet" href="expensecss/expensenheader.css">
    <link rel="stylesheet" href="expensecss/transactions.css">
    <title>Expense Tracker</title>
</head>

<body>
    <?php
   include 'expensepartials/_expensenheader.php';
   ?>
    <div class="container">
        <h2 class="text-center my-2">Expense Transactions</h2>
        <div class="transactionbox">
            <?php  
                     $username = $_SESSION['username'];
                  $finisheddates = array(); 
                  $sqld = "SELECT * FROM `expense` WHERE username = '$username'";
                  $resultd = mysqli_query($conn,$sqld);
                  $numd = mysqli_num_rows($resultd);
                  while($rowd = mysqli_fetch_assoc($resultd)){
                    $dated = $rowd['date'];
                    if (!(in_array($dated, $finisheddates))){

                      array_push($finisheddates,$dated);
                     }
                    }
                    foreach ($finisheddates as $value) {
                  $sql = "SELECT * FROM `expense` WHERE date = '$value' AND username = '$username';";
                  $result = mysqli_query($conn,$sql);
                  $num = mysqli_num_rows($result);
                  $no = 1;
                  if($num > 0){
                    while($row = mysqli_fetch_assoc($result)){
                      echo '    <table class="table my-4 " id="'.$value.'">
                <thead>
                    <tr>
                    <th class="datehead" colspan="5" scope="col">'.$value.'</th>
                       
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th scope="col">Sno</th>
                        <th scope="col">Title</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Category</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>';
          $sql = "SELECT * FROM `expense` WHERE date = '$value' AND username = '$username';";
          $result = mysqli_query($conn,$sql);
          $num = mysqli_num_rows($result);
          $no = 1;
          if($num > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo '
                <tr>
                <th scope="row">'. $no .'</th>
                <td>'. $row["title"] .'</td>
                <td>'. $row["amount"] .'</td>
                <td>'. $row["category"] .'</td>
                <td><a href="/myexpensetracker/expensetransactions.php?delete='. $row['expense_id'] .'"><button id="" class="delete">Delete</button></a></td>
            </tr> ';
          $no++;
                }
          }
            echo '</tbody>
            </table>';
            }
            }
          }
            ?>
        </div>
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
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
   

   
</body>

</html>