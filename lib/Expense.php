<?php 
include_once 'Session.php';
include 'Database.php';

  class Expense

   {  
    
    private $db;
    public function __construct()
    {
       $this->db=new Database();
    }

 public function add_expense($data) 
    {
      $dateexpense =  $data['dateexpense'];
      $expenseitem =  $data['expenseitem'];
      $costitem    =  $data['costitem'];

      $username =$_SESSION['username'];
       if($dateexpense=="" or $expenseitem=="" or $costitem=="") 
      {
        $msg="<div class='alert alert-danger'><strong>Error!</strong>Field must not be empty</div>";
        return $msg;
      }

      $sql1="SELECT * from tbluser where username='$username'";
      $query = $this->db->pdo->prepare($sql1);
        $query->execute();
            while($row =$query->fetch())
            {
                $ID=$row['ID'];

            }
       
               if($costitem < 0)
                {
                  $msg="<div class='alert alert-danger'><strong>Error!</strong>Negative value</div>";
                          return $msg;

                 }
                 

      // Create query
      
 $sql ="INSERT into tblexpense(dateexpense,expenseitem,costitem,user_id) values(:dateexpense,:expenseitem,:costitem,:ID)";

           $query = $this->db->pdo->prepare($sql);
           $query->bindvalue(':dateexpense', $dateexpense);
           $query->bindvalue(':expenseitem', $expenseitem);
           $query->bindvalue(':costitem', $costitem);
           $query->bindvalue(':ID', $ID);
           $result = $query->execute();
           if($result)
           {    
              $msg="<div class='alert alert-success'><strong>success!</strong>Record inserted successfully</div>";
              header('location:manage-expense.php');
                            return $msg;

           }

           else
           {
                return false;
           }
    }

    public function select()
    {
           $ID=$_SESSION['ID'];
          $sql= "SELECT *from tblexpense where user_id='$ID'";
           $query = $this->db->pdo->prepare($sql);
           $query->execute();
           
           if($query->rowCount() > 0 )
           {
            while($row =$query->fetch())
            {
              $data[]=$row;
            }
            return $data;
           }
         else 
         {
          return false;
         }
    }


public function delete($ID)
{
    $sql="DELETE from tblexpense where ID=:ID";
     $query = $this->db->pdo->prepare($sql);
    $query->bindvalue(':ID', $ID);
     $result = $query->execute();
           if($result)
           {               
                $msg="<div class='alert alert-success'><strong>success!</strong>Record deleted successfully</div>";
                return $msg;
                //header('location:manage-expense.php');
           }
            else
           {    
                
                return false;
           }
}
      

public function datewise()
{    
$ID=$_SESSION['ID'];
$fdate = $_POST['fdate'];
$tdate = $_POST['tdate'];
 $sql= "SELECT dateexpense,costitem as totaldaily FROM tblexpense where (dateexpense between '$fdate' and '$tdate') AND user_id='$ID'";
   $query = $this->db->pdo->prepare($sql);
            $query->execute();          
          if($query->rowCount() > 0 )
          {
            while($row =$query->fetch())
            {

               $data[]= $row;
            }
            return $data;
           
         }
}


public function monthwise()
{    

$ID=$_SESSION['ID'];
$fdate = $_POST['fdate'];
$tdate = $_POST['tdate'];
 $sql= "SELECT month(dateexpense) as rptmonth,year(dateexpense) as rptyear,SUM(costitem) as totalmonth FROM tblexpense  where (dateexpense BETWEEN '$fdate' and '$tdate') AND user_id='$ID' ";
   $query = $this->db->pdo->prepare($sql);
            $query->execute();          
          if($query->rowCount() > 0 )
          {
            while($row =$query->fetch())
            {
               $data[]= $row;
            }
            return $data;
           
         }
}

public function yearwise()
{    

$ID=$_SESSION['ID'];
$fdate = $_POST['fdate'];
$tdate = $_POST['tdate'];

 $sql= "SELECT year(dateexpense) as rptyear,SUM(costitem) as totalyear FROM tblexpense  where (dateexpense BETWEEN '$fdate' and '$tdate') AND user_id='$ID'";
   $query = $this->db->pdo->prepare($sql);

            $query->execute();          
          if($query->rowCount() > 0 )
          {
            while($row =$query->fetch())
            {

               $data[]= $row;
            }
            return $data;
           
         }
       }


}