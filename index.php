<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>

<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="dashboard.php"><span>Daily Expense Tracker</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="register.php"><h5>Register</h5></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php"><h5>Login</h5></a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="logout.php"><h5>Logout</h5></a>
            </li>

          </ul>
        </div>
                
            </div>
            
        </div>
        <!-- /.container-fluid -->
    </nav>