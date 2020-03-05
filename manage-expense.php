  <?php  

include 'lib/Expense.php';
error_reporting(0);

if(isset($_GET['del']))
{
	$ID = $_GET['del'];
	$expense = new Expense();

	$data=$expense -> delete($ID);
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
				<li class="active">Expense</li>
			</ol>
		</div><!--/.row-->
					
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Expense</div>
					  <div class="panel-body">	
						<div class="col-md-12">
								<?php
                       if(isset($data))
                       {
                       	echo $data;
                       	
                       }
					?>
							<div class="table-responsive" id="expense_table">
            <table class="table table-bordered mg-b-0">
              <thead>
                <tr>
                  <!--<th>S.NO</th>-->
                  <th>Expense date</th>
                  <th>Expense item</th>
                  <th>Expense cost</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              	<?php
              	$expense = new Expense();
              	$rows= $expense->select();
              	//var_dump($rows);
              	//exit();

              	foreach($rows as $row) 
              	{
              	?>
                <tr>
                  <!--<th><?php echo  $row['ID']; ?></th> -->             
                  <td><?php  echo $row['dateexpense']; ?></td>
                  <td><?php  echo $row['expenseitem']; ?></td>
                  <td><?php  echo $row['costitem']; ?></td>
                  <td><a href="manage-expense.php?del=<?php echo $row['ID']; ?>">Delete</a></td> 
                                   </tr>

                <?php 

                 }  ?> 

             </tbody>
            </table>
          </div>
						</div>

                 <div align="center">  
                     <button name="create_excel" id="create_excel" class="btn btn-success">Create Excel File</button>  
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
<script>
	$(document).ready(function() {
		$('#create_excel').click(function() {
			var excel_data = $('#expense_table').html();
			var page =encodeURI("action.php?data="+excel_data);
			window.location =page;
		});
	});
</script>