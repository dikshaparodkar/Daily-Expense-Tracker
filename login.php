<?php
include 'includes/header.php';
include 'lib/User.php';
Session::checkLogin();

//include('includes/Database.php');

?>
<?php
$user =new User();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']))
{

	$usrLogin = $user->userLogin($_POST);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daily Expense Tracker - Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
 <style>
	body {
  overflow-x: hidden;
}
</style>
	
</head>
<body>

	<div class="row">
			<h2 align="center">Daily Expense Tracker</h2>
	<hr />
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log In</div>
				<div class="panel-body">
                       <?php
                       if(isset($usrLogin))
                       {
                       	echo $usrLogin;
                       }
					?>
					<form role="form" action="" method="post" id="" name="login">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
							</div>
							<!--<a href="forgot-password.php">Forgot Password?</a>-->
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="checkbox">
								<button type="submit" value="login" name="login" class="btn btn-primary">Login</button><span style="padding-left:250px">
								<a href="register.php" class="btn btn-primary">Register</a></span>
							</div>
							</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
