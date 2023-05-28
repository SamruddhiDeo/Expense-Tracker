<?php
 include "expensepartials/_expensedbconnect.php";
session_start();
?>
<?php
$username = $_SESSION["username"];
//calculating income amount
 $incomecategoryarray = array("Salary", "Bonus", "Allowance", "Award", "Dividend","Investment","Lottery","Other"); 
 $incomeamountarray = array(0,0,0,0,0,0,0,0);
 $i = 0;
 foreach ($incomecategoryarray as $cate) {
	 $sql = "SELECT * FROM `income` WHERE category = '$cate' AND username = '$username';";
	 $result = mysqli_query($conn,$sql);
	 $num = mysqli_num_rows($result);
	 while($row = mysqli_fetch_assoc($result)){
		$incomeamountarray[$i] = $incomeamountarray[$i] + $row['amount'];
  }
  $i++;
}

//calculating expense amount
 $expensecategoryarray = array("Travel", "Entertainment", "Clothing", "Health", "Food","Furniture","Groceries","Other","Goals"); 
 $expenseamountarray = array(0,0,0,0,0,0,0,0,0);
 $i = 0;
 foreach ($expensecategoryarray as $cate) {
	 $sql = "SELECT * FROM `expense` WHERE category = '$cate' AND username = '$username';";
	 $result = mysqli_query($conn,$sql);
	 $num = mysqli_num_rows($result);
	 while($row = mysqli_fetch_assoc($result)){
		$expenseamountarray[$i] = $expenseamountarray[$i] + $row['amount'];
  }
  $i++;
}
?>
<?php 
   $totalIncome = array_sum($incomeamountarray);
   $totalExpense = array_sum($expenseamountarray);
   $totalRemainingAmount = $totalIncome - $totalExpense;
?>
<?php 
    include 'expensepartials/_expensenheader.php';
?>
<!DOCTYPE html>
<html>

<head>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<link rel="stylesheet" href="expensecss/overview.css">
<link rel="stylesheet" href="expensecss/expensenheader.css">

<?php 
echo '
<body>
    <h2 class="mt-2">Total Amount you have : '.$totalRemainingAmount.'</h2>
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
 
    <div class="mainpiechartbox">
        <div id="incomeChartContainer">
        <h2>Total Income : '.$totalIncome.'</h2>
            <h2>Income Piechart</h2>
            <div id="incomeChart"></div>
    </div>
        <div id="expenseChartContainer">
        <h2>Total Expense : '.$totalExpense.'</h2>
            <h2>Expense Piechart</h2>
            <div id="expenseChart"></div>  
    </div>
</div>

<script>
    // Create chart instance
    var incomechart = am4core.create("incomeChart", am4charts.PieChart);
    // Add data
    incomechart.data = [{
        "Category": "Salary",
        "Amount": '.$incomeamountarray[0].'
    }, {
        "Category": "Bonus",
        "Amount": '.$incomeamountarray[1].'
    }, {
        "Category": "Allowance",
        "Amount": '.$incomeamountarray[2].'
    }, {
        "Category": "Award",
        "Amount": '.$incomeamountarray[3].'
    }, {
        "Category": "Dividend",
        "Amount": '.$incomeamountarray[4].'
    }, {
        "Category": "Investment",
        "Amount": '.$incomeamountarray[5].'
    },  {
        "Category": "Lottery",
        "Amount": '.$incomeamountarray[6].'
    },  {
        "Category": "Other",
        "Amount": '.$incomeamountarray[7].'
    },];

    // Add and configure Series
    var pieSeries = incomechart.series.push(new am4charts.PieSeries());
    pieSeries.dataFields.value = "Amount";
    pieSeries.dataFields.category = "Category";

    // Add legend
    // incomechart.legend = new am4charts.Legend();
</script>


<script>
    // Create chart instance
    var expensechart = am4core.create("expenseChart", am4charts.PieChart);
    // Add data
    expensechart.data = [{
        "Category": "Travel",
        "Amount": '.$expenseamountarray[0].'
    }, {
        "Category": "Entertainment",
        "Amount": '.$expenseamountarray[1].'
    }, {
        "Category": "Clothing",
        "Amount": '.$expenseamountarray[2].'
    }, {
        "Category": "Health",
        "Amount": '.$expenseamountarray[3].'
    }, {
        "Category": "Food",
        "Amount": '.$expenseamountarray[4].'
    }, {
        "Category": "Furniture",
        "Amount": '.$expenseamountarray[5].'
    },  {
        "Category": "Groceries",
        "Amount": '.$expenseamountarray[6].'
    },  {
        "Category": "Other",
        "Amount": '.$expenseamountarray[7].'
    }, {
        "Category": "Goals",
        "Amount": '.$expenseamountarray[8].'
    }];

    // Add and configure Series
    var pieSeries = expensechart.series.push(new am4charts.PieSeries());
    pieSeries.dataFields.value = "Amount";
    pieSeries.dataFields.category = "Category";

    // Add legend
    // expensechart.legend = new am4charts.Legend();
</script>

</body>
</html>

';
?>