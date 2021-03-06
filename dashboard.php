<?php 
      include_once('includes/header.php');
      include_once('includes/sidebar.php');
	  include 'lib/User.php';
	    //include 'lib/Expense.php';

	  Session::checkSession();
       $user = new User();
      ?>
     
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daily Expense Tracker - Dashboard</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	
</head>

<body>

	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active"><h4><strong>Welcome </strong>
					<?php $username=Session::get("username");
					if(isset($username))
						{
							echo $username;
						}
						?></h4></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
			
		<div class="row">
			<div class="col-xs-6 col-md-3">
				
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
                         <?php
                          $expense = new User();
              	         $rows= $expense->todaysexpense();
                          foreach($rows as $row)
                  {
                  	?>
						<h4>Today's Expense</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $row;?>" ><span class="percent">
							<?php if($row=="")
							{
                                 echo "0";
                            }
                              else
                            {
                               echo $row;
                            }

                          } ?>

	                  </span>
	              </div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					
					<div class="panel-body easypiechart-panel">
						<?php
                          $expense = new User();
              	         $rows= $expense->yesterdaysexpense();
                          foreach($rows as $row)
                  {
                  	?>
						<h4>Yesterday's Expense</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $row;?>" ><span class="percent">

                     <?php if($row=="")
							{
                                 echo "0";
                            }
                              else
                            {
                               echo $row;
                            }

                          } ?>
	               </span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">

                         <?php
                          $expense = new User();
              	         $rows= $expense->weeklyexpense();
                          foreach($rows as $row)
                  {

                  	?>
						<h4>Last 7day's Expense</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $row;?>"><span class="percent">
                            <?php if($row=="")
							{
                                 echo "0";
                            }
                              else
                            {
                               echo $row;
                            }

                          } ?>
	                    </span>
                        </div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
                        <?php
                          $expense = new User();
              	         $rows= $expense->monthexpense();
                          foreach($rows as $row)
                  {
                 	?>
					<h4>Last 30day's Expenses</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $row;?>" ><span class="percent">
							<?php if($row=="")
							{
                                 echo "0";
                            }
                              else
                            {
                               echo $row;
                            }

                          } ?>
	</span></div>
					</div>
				</div>
			</div> 	
		</div> 
		<!--/.row--> 
			<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<?php
                          $expense = new User();
              	         $rows= $expense->yearlyexpense();
                          foreach($rows as $row)
                  {
                  	?>
						<h4>Current Year Expenses</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $row;?>" ><span class="percent">
							<?php if($row=="")
							{
                                 echo "0";
                            }
                              else
                            {
                               echo $row;
                            }
                          } ?>
	                    </span>
	                </div>
					</div>				
				</div>
			</div>

		<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<?php
                          $expense = new User();
              	         $rows= $expense->totalexpense();
                          foreach($rows as $row)
                  {
                	?>
						<h4>Total Expenses</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $row;?>" ><span class="percent">
							<?php if($row=="")
							{
                                 echo "0";
                            }
                              else
                            {
                               echo $row;
                            }

                          } ?>
	                   </span>
                        </div>
					</div>				
				</div>
			</div>            

		</div>
		
		<!--/.row-->
	<!--</div>-->	<!--/.main-->
	<?php include_once('includes/footer.php');?>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>
