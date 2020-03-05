
<?php
//include_once 'lib/Session.php';
//session_start();
include 'lib/Income.php';

if(isset($_GET['ID']))
{
  $ID= $_GET['ID'];
  $edit= new Income();
  $result=$edit->selectone($ID);
}

  $edit= new Income();

if(isset($_POST['submit']))
{
  
$ID = $_GET['ID'];
 $income_date = $_POST['income_date'];
 $income_category = $_POST['income_category'];
 $income_amount = $_POST['income_amount'];
 
 if($edit->update($ID,$income_date,$income_category,$income_amount))
 {
  $msg = "<div class='alert alert-info'>
    <strong>WOW!</strong> Record was updated successfully <a href='income.php'></a>!
    </div>";
 }
 else
 {
  $msg = "<div class='alert alert-warning'>
    <strong>SORRY!</strong> ERROR while updating record !
    </div>";
 }
}
?> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daily Expense Tracker ||Edit Income</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/datepicker3.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
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
        <li class="active">Edit</li>
      </ol>
    </div><!--/.row-->  
    <div class="row">
      <div class="col-lg-12"> 
        
      <div class="panel panel-default">
          <div class="panel-heading">Edit</div>
          <div class="panel-body">
            <div class="col-md-12">
              <?php
               
               if(isset($msg))
               {
                echo $msg;
              }

               
              ?>
              <form role="form" method="post" action="">
               
                <div class="form-group">
                  <label>Date of Income</label>
                  <input class="form-control" type="date" name="income_date" value="<?php echo $result['income_date']; ?>">
                </div>
                <div class="form-group">
                  <label>category</label>
                  <input type="text" class="form-control" name="income_category" value="<?php echo $result['income_category']; ?>">
                </div>
                
                <div class="form-group">
                  <label>Amount</label>
                  <input class="form-control" type="text"  name="income_amount" value="<?php echo $result['income_amount']; ?>">

                </div>
                               
                <div class="form-group has-success">
                  <button type="submit" class="btn btn-primary" name="submit">Edit</button>
                </div>  
                
              </form>
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
