<?php

$filepath = realpath(dirname(__FILE__));
include_once $filepath.'/../lib/Session.php';
Session::init();
?>
<?php
if(isset($_GET['action']) &&  ($_GET['action']) =="Logout" )
{
    Session::destroy();
}
?>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            <div class="profile-userpic">
                <img src="http://placehold.it/50/2B94E5/fff" class="img-responsive" alt="">
            </div>
            <div class="profile-usertitle">


                <div class="profile-usertitle-name">
                   
                </div>
                <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
        


        <ul class="nav menu">
            <li class="active"><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            
        <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-navicon">&nbsp;</em>Expenses <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <li><a class="" href="add-expense.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Add Expenses
                    </a></li>
                    <li><a class="" href="manage-expense.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Manage Expenses
                    </a></li>
                   
                    <li><a class="" href="income.php">
                        <span class="fa fa-arrow-right">&nbsp;</span>Add Income
                    </a></li>
                    
                    <li><a class="" href="manage-income.php">
                        <span class="fa fa-arrow-right">&nbsp;</span>Manage Income
                    </a></li>

                    <li><a class="" href="left-balance.php">
                        <span class="fa fa-arrow-right">&nbsp;</span>Balance Left
                    </a></li>


                </ul>

            </li>
           
                    <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                    <em class="fa fa-navicon">&nbsp;</em>Expense Report <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                    </a>
                    <ul class="children collapse" id="sub-item-2">
                        <li><a class="" href="datewise-expense.php">
                            <span class="fa fa-arrow-right">&nbsp;</span> Daywise Expenses
                        </a></li>
                        <li><a class="" href="monthly-expense.php">
                            <span class="fa fa-arrow-right">&nbsp;</span> Monthwise Expenses
                        </a></li>
                        <li><a class="" href="yearwise-expense.php">
                            <span class="fa fa-arrow-right">&nbsp;</span> Yearwise Expenses
                        </a></li>
                        
                    </ul>
                </li>
                
           <!-- <li><a href="profile.php"><em class="fa fa-user">&nbsp;</em> Profile</a></li>-->
            <!--<li><a href="change-password.php"><em class="fa fa-clone">&nbsp;</em> Change Password</a></li>-->
            <li><a href="?action=Logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
   

            

        </ul>
    </div>

