<?php
 include "expensepartials/_expensedbconnect.php";
session_start();
?>
  <?php
   include 'expensepartials/_expensenheader.php';
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
        <link rel="stylesheet" href="expensecss/expenseheader.css">
        <link rel="stylesheet" href="expensecss/expensetracker.css">
    <title>Expense Tracker</title>
</head>

<body>
  
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="expenseimg/slide3.jfif" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="expenseimg/slide7.jfif" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="expenseimg/slide8.jfif" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
    <!-- Carousel text -->
    <div class="carousel-text">
        <p>Welcome to Expense Tracker</p>
        <p>Enjoy the freedom that comes with having complete control of your expenses</p>
    </div>

    <div class="cards my-4">

        <div class="cardbox my-4">
            <img src="expenseimg/card1.png" class=" img-thumbnail" alt="...">
            <div class="cardboxtext">
                <h2>Track your spending</h2><p>Easily keep track of your spending as they happen.Have a record of how you
                spend your money.</p>
            </div>
        </div>

        <div class="cardbox alternate my-4">
            <img src="expenseimg/card2.jpeg" class="img-thumbnail col-md-3" alt="...">
            <div class="cardboxtext col-md-9">
                <h2>Know where you spend</h2><p>Track Expense and Income by daily and monthly. Never overspend again.</p>
            </div>
        </div>

        <div class="cardbox my-4 ">
            <img src="expenseimg/card3.png" class="img-thumbnail" alt="...">
            <div class="cardboxtext">
                <h2>Spending Reports</h2><p>One report to give a clear view on your spending patterns. Understand where your money comes and goes.</p>
            </div>
        </div>
  
        <div class="cardbox alternate my-4">
            <img src="expenseimg/card4.webp" class="img-thumbnail" alt="...">
            <div class="cardboxtext">
                <h2>Set up your Goals</h2><p>Track and follow what matters to you.Save for important things.</p>
            </div>
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