<?php
include 'lib/User.php';
include 'includes/header.php'
//include('includes/Database.php');

?>
<?php
$user =new User();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register']))
{
	$usrRegi = $user->userRegistration($_POST);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daily Expense Tracker - Signup</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
 <style>
	body {
  overflow-x: hidden;
}
</style>
<body>
	<div class="row">
	<h2 align="center">Daily Expense Tracker</h2>
	<hr/>
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Sign Up</div>
				<div class="panel-body">
					<?php
                       if(isset($usrRegi))
                       {
                       	echo $usrRegi;
                       }
					?>
					<form role="form" action="" method="POST">

						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" title="must not be less than 4 characters" value="<?php echo $_POST['username'] ?? '' ?>">

							</div>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" value="<?php echo $_POST['email'] ?? '' ?>">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" title="Password must contain at least eight characters, including uppercase, lowercase letters and numbers" value="">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="repeatpassword" name="repeatpassword" placeholder="Repeat Password">
							</div>
							<div class="checkbox">
								<button type="submit" value="submit" name="register" class="btn btn-primary">Register</button><span style="padding-left:250px">
								<a href="login.php" class="btn btn-primary">Login</a></span>
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
