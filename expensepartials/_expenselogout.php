<?php
session_start(); //to ensure you are using same session
session_unset();
session_destroy(); //destroy the session
header("location: ../expensetracker.php"); //to redirect back to "expensetracker.php" after logging out
exit();
?>

