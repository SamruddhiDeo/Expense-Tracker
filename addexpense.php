<?php
 include "expensepartials/_expensedbconnect.php";
session_start();
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $category = $_POST['category'];
    $username = $_SESSION['username'];
    $sql = "INSERT INTO `expense` (`title`, `amount`, `date`, `category`, `username`) VALUES ('$title', '$amount', '$date', '$category', '$username');";
    $result = mysqli_query($conn,$sql);
    // $num = mysqli_num_rows($result);
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
    <link rel="stylesheet" href="expensecss/add.css">
    <title>Expense Tracker</title>
</head>

<body>
    <?php
   include 'expensepartials/_expensenheader.php';
   ?>
    <div class="container addbox">
        <h1 class="text-center">Add Expense</h1>
        <form class="mt-3" action="addexpense.php" method="post">
            <div class="form-group">
                <label for="title">Enter Title</label>
                <input required name="title" type="text" class="" id="title" size="50" maxlength="25">

            </div>
            <div class="form-group">
                <label for="amount">Enter Amount</label>
                <input required name="amount" type="text" class="" id="amount" size="50" maxlength="25">
            </div>
            <div class="form-group">
                <label for="date">Enter Date</label>
                <input required name="date" type="date" class="" value="<?php echo date('Y-m-d'); ?>" id="date" size="50">
            </div>
            <div class='form-group'>
                <label for="exampleInputPassword1">Category</label>
                <div class='form-group '>
                    <div class='categorybox expensecategorybox'>
                        <div class='form-check '>
                            <input required class='form-check-input' type='radio' name='category' id='category'
                                value='Travel'>
                            <label class='form-check-label' for='category'>
                                Travel
                            </label>
                        </div>
                        <div class='form-check'>
                            <input class='form-check-input' type='radio' name='category' id='category'
                                value='Entertainment'>
                            <label class='form-check-label' for='category'>
                                Entertainment
                            </label>
                        </div>
                        <div class='form-check'>
                            <input class='form-check-input' type='radio' name='category' id='category' value='Clothing'>
                            <label class='form-check-label' for='category'>
                                Clothing
                            </label>
                        </div>
                        <div class='form-check'>
                            <input class='form-check-input' type='radio' name='category' id='category' value='Health'>
                            <label class='form-check-label' for='category'>
                                Health
                            </label>
                        </div>
                        <div class='form-check'>
                            <input class='form-check-input' type='radio' name='category' id='category' value='Food'>
                            <label class='form-check-label' for='category'>
                                Food
                            </label>
                        </div>
                        <div class='form-check'>
                            <input class='form-check-input' type='radio' name='category' id='category'
                                value='Furniture'>
                            <label class='form-check-label' for='category'>
                                Furniture
                            </label>
                        </div>
                        <div class='form-check'>
                            <input class='form-check-input' type='radio' name='category' id='category'
                                value='Groceries'>
                            <label class='form-check-label' for='category'>
                                Groceries
                            </label>
                        </div>
                        <div class='form-check'>
                            <input class='form-check-input' type='radio' name='category' id='category' value='Other'>
                            <label class='form-check-label' for='category'>
                                Other
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
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