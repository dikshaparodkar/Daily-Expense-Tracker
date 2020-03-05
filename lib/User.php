<?php
include_once 'Session.php';
include 'Database.php';

class User
{
    private $db;
    public function __construct()
    {
       $this->db=new Database();
    }

    public function userRegistration($data)
    {
    	$username=$data['username'];
    	$email=$data['email'];
    	$password=md5($data['password']);
      $repeatpassword =md5($data['repeatpassword']);
    	$chk_email=$this->emailCheck($email);

    	if($username=="" or $email=="" or $password=="") 
    	{
    		$msg="<div class='alert alert-danger'><strong>Error!</strong>Field must not be empty</div>";
    		return $msg;
    	}

    	if(strlen($username) < 4)
    	{
    		$msg="<div class='alert alert-danger'><strong>Error!</strong>username is too short!</div>";
    		return $msg;
    	}

    	if(filter_var($email,FILTER_VALIDATE_EMAIL)=== false)
    	{
        $msg="<div class='alert alert-danger'><strong>Error!</strong>the email address is not valid!</div>";
    		return $msg;
    	}

      if($chk_email == true)
      {
  	   $msg="<div class='alert alert-danger'><strong>Error!</strong>the email address already  exist!</div>";
    	 return $msg;

  }

 if(preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST["password"]) === 0)
  {
    $msg="<div class='alert alert-danger'><strong>Error!</strong>Password must contain at least eight characters, including uppercase, lowercase letters and numbers.</div>";
    return $msg;
  }
   
  if ($password != $repeatpassword) 
  {
    $msg="<div class='alert alert-danger'><strong>Error!</strong>Password do not match</div>";
    return $msg; 
  }

  $sql ="INSERT into tbluser(username,email,password) values(:username,:email,:password)"; 
  $query = $this->db->pdo->prepare($sql);
           $query->bindvalue(':username', $username);
           $query->bindvalue(':email', $email);
           $query->bindvalue(':password', $password);
           $result = $query->execute();
           if($result)
           {
           	$msg="<div class='alert alert-success'><strong>success!</strong>You have been registered</div>";
    		    return $msg;
           }
           else
           {
           	$msg="<div class='alert alert-danger'><strong>Error!</strong>Sorry, there has been problem inserting your details.</div>";
    		    return $msg;
           }
 }

       public function emailCheck($email)
       {
           $sql="SELECT email from tbluser where email= :email";
           $query = $this->db->pdo->prepare($sql);
           $query->bindvalue(':email', $email);
           $query->execute();
           if($query->rowcount()>0)
           {
           	 return true;
           }
           else 
           {
           	return false;
           }
       }

public function getLoginUser($email,$password)
{
	$sql="SELECT * from tbluser where email= :email AND password=:password limit 1";
           $query = $this->db->pdo->prepare($sql);
           $query->bindvalue(':email', $email);
           $query->bindvalue(':password', $password);
           $query->execute();
           $result= $query->fetch(PDO::FETCH_OBJ);
           return $result;

}
       public function userLogin($data)
       {
    	$email=$data['email'];
    	$password=md5($data['password']);
    	$chk_email=$this->emailCheck($email);
    	if($email=="" or $password=="") 
    	{
    		$msg="<div class='alert alert-danger'><strong>Error!</strong>Field must not be empty</div>";
    		return $msg;
    	}

    	if(filter_var($email,FILTER_VALIDATE_EMAIL)=== false)
    	{
              $msg="<div class='alert alert-danger'><strong>Error!</strong>the email address is not valid!</div>";
    		return $msg;
    	}

       if($chk_email == false)
        {
  	        $msg="<div class='alert alert-danger'><strong>Error!</strong>the email address doesnot  exist!</div>";
    		return $msg;

        }

     $result = $this->getLoginUser($email,$password);
     if($result)
     {
          Session::init();
          Session::set("login",true);
          Session::set("ID",$result->ID);
          Session::set("username",$result->username);
          Session::set("loginmsg","<div class='alert alert-success'><strong>Error!</strong>you are LoggedIn!</div>");
           header("location:dashboard.php");

     }
     else
     {
     	 $msg="<div class='alert alert-danger'><strong>Error!</strong>Data not found</div>";
    		return $msg;
     }

 }

//report
public function todaysexpense()
{
  $ID=$_SESSION['ID'];
  $tdate=date('Y-m-d');
$sql="SELECT sum(costitem)  as todaysexpense from tblexpense where (dateexpense)='$tdate' && user_id='$ID'";
$query = $this->db->pdo->prepare($sql);
            $query->execute();           
            while($row =$query->fetch())
            {
                $sum_today_expense[]=$row['todaysexpense'];
            }
            return $sum_today_expense;
     }      
public function yesterdaysexpense()
{
    $ID=$_SESSION['ID'];
  $ydate=date('Y-m-d',strtotime("-1 days"));
$sql="SELECT sum(costitem)  as yesterdayexpense from tblexpense where (dateexpense)='$ydate' && user_id='$ID'";
$query = $this->db->pdo->prepare($sql);
            $query->execute();          
          
            while($row =$query->fetch())
            {
                $sum_yesterday_expense[]=$row['yesterdayexpense'];
            }
            return $sum_yesterday_expense;

}

public function weeklyexpense()
{ 
$ID=$_SESSION['ID'];
$pastdate=  date("Y-m-d", strtotime("-1 week")); 
$crrntdte=date("Y-m-d");
$sql="SELECT sum(costitem)  as weeklyexpense from tblexpense where (dateexpense between '$pastdate' and '$crrntdte') && user_id='$ID'";
$query = $this->db->pdo->prepare($sql);
$query->execute();          
 while($row =$query->fetch())
    {
      $sum_weekly_expense[]=$row['weeklyexpense'];
    }
      return $sum_weekly_expense;
}

public function monthexpense()
{
$ID=$_SESSION['ID'];
$monthdate=  date("Y-m-d", strtotime("-1 month")); 
$crrntdte=date("Y-m-d");
$sql="SELECT sum(costitem)  as monthlyexpense from tblexpense where (dateexpense between '$monthdate' and '$crrntdte') && user_id='$ID'";
     $query = $this->db->pdo->prepare($sql);
     $query->execute();               
      while($row =$query->fetch())
            {
                $sum_monthly_expense[]=$row['monthlyexpense'];
            }
            return $sum_monthly_expense;
}
  

public function yearlyexpense()
{
  $ID=$_SESSION['ID'];
  $cyear= date("Y");
  $sql="SELECT sum(costitem)  as yearlyexpense from tblexpense where (year(dateexpense)='$cyear') && user_id='$ID'";
  $query = $this->db->pdo->prepare($sql);
  $query->execute();               
  while($row =$query->fetch())
    {
        $sum_yearly_expense[]=$row['yearlyexpense'];
    }
    return $sum_yearly_expense;
}

public function totalexpense()
{
    $ID=$_SESSION['ID'];
    $sql="SELECT sum(costitem)  as totalexpense from tblexpense where user_id='$ID'";
     $query = $this->db->pdo->prepare($sql);
     $query->execute();          
      while($row =$query->fetch())
            {
                $sum_total_expense[]=$row['totalexpense'];
            }
            return $sum_total_expense;
}


public function monthincome()
{
$ID=$_SESSION['ID'];
$monthdate=  date("Y-m-d", strtotime("1 month")); 
$crrntdte=date("Y-m-d");
$sql="SELECT income_amount from income where (income_date between '$monthdate' and '$crrntdte') && user_id='$ID'";
     $query = $this->db->pdo->prepare($sql);
     $query->execute();               
      while($row =$query->fetch())
            {
                $sum_monthly_income[]=$row;
            }
            return $sum_monthly_income;
}

public function balance_left()
{
     
}
}

?>