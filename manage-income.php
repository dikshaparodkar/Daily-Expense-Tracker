  <?php  

include 'lib/Income.php';
if(isset($_GET['del']))
{
	$ID = $_GET['del'];
	$expense = new Income();
	$expense -> delete1($ID);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daily Expense Tracker || Manage Expense</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<?php include_once('includes/header.php');?>
	<?php include_once('includes/sidebar.php');?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Income</li>
			</ol>
		</div><!--/.row-->
		
		
				
		
		<div class="row">
			<div class="col-lg-12">
			
				
				
				<div class="panel panel-default">
					<div class="panel-heading">Income</div>
					<div class="panel-body">
						
						<div class="col-md-12">
							
							<div class="table-responsive">
            <table class="table table-bordered mg-b-0">
              <thead>
                <tr>
                  <!--<th>S.NO</th>-->
                  <th>Income date</th>
                  <th>Income category</th>
                  <th>Amount</th>

                  <th>Action</th>
                </tr>
              </thead>
              
 
              <tbody>
              	<?php
              	
              	$expense = new Income();
              	$rows= $expense->select1();
              	foreach($rows as $row) 
                 //while($rows =fetch($row))

              	{
              	?>
                <tr>
                  <!--<th><?php echo $row['ID']; ?></th>-->
              
                  <td><?php  echo $row['income_date']; ?></td>
                  <td><?php  echo $row['income_category']; ?></td>
                  <td><?php  echo $row['income_amount']; ?></td>
                  <td><a href="edit.php?ID=<?php echo $row['ID'];?>">Edit</a>&nbsp;&nbsp;
                  <a href="manage-income.php?del=<?php echo $row['ID']; ?>">Delete</a></td>   
                </tr>
                <?php 

} ?>
               
              </tbody>
            </table>
          </div>
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			<?php include_once('includes/footer.php');?>
		</div><!-- /.row -->
	</div><!--/.main-->
	
<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
