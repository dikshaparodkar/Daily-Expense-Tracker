<?php 
include_once 'Session.php';
include 'Database.php';

class Income
  {    
    private $db;
    public function __construct()
     {
       $this->db=new Database();
     }
        //income
public function income($data)
{
      $income_date     =  $data['income_date'];
      $income_category =  $data['income_category'];
      $income_amount   =  $data['income_amount'];
      $username =$_SESSION['username'];
       if($income_date=="" or $income_category=="" or $income_amount=="") 
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

            if($income_amount < 0)
                {
                  $msg="<div class='alert alert-danger'><strong>Error!</strong>Amount cannot be negative value</div>";
                          return $msg;

                 }
      // Create query
      
 $sql ="INSERT into income(income_date,income_category,income_amount,user_id) values(:income_date,:income_category,:income_amount,:ID)";

           $query = $this->db->pdo->prepare($sql);
           $query->bindvalue(':income_date', $income_date);
           $query->bindvalue(':income_category', $income_category);
           $query->bindvalue(':income_amount', $income_amount);
           $query->bindvalue(':ID', $ID);
           $result = $query->execute();
           if($result)
           {    
              $msg="<div class='alert alert-success'><strong>success!</strong>Record inserted successfully</div>";
              header('location:manage-income.php');
              return $msg;

           }

           else
           {
                return false;
           }
    
}

public function select1()
    {
           $ID=$_SESSION['ID'];

          $sql= "SELECT * from income where user_id='$ID'";

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

   public function totalexpense()
{
    $ID=$_SESSION['ID'];
    $sql="SELECT sum(costitem)  as totalexpense from tblexpense where user_id='$ID'";
         $query = $this->db->pdo->prepare($sql);

     $query->bindvalue(':ID', $ID);
     $query->execute();              
      while($row =$query->fetch())
            {
                $sum_total_expense[]=$row['totalexpense'];

            }
            return $sum_total_expense;
}

public function totalincome()
{
   $ID =$_SESSION['ID'];
   $sql="SELECT SUM(income_amount) as totalincome FROM income WHERE user_id='$ID'"; 
      $query = $this->db->pdo->prepare($sql);

   $query->bindvalue(':ID', $ID);
   $query->execute();          
   while($row =$query->fetch())
   {
         $sum_total_income[]=$row['totalincome'];

   }
                  return $sum_total_income;

}


public function delete1($ID)
{
    //$ID=$_SESSION['ID'];

    $sql="DELETE from income where ID=:ID";
     $query = $this->db->pdo->prepare($sql);
    $query->bindvalue(':ID', $ID);
    //$query->execute();
     $result = $query->execute();
           if($result)
           {               
                $msg="<div class='alert alert-success'><strong>success!</strong>Record deleted successfully</div>";
                return $msg;
                header('location:manage-income.php');
           }
            else
           {
                return false;
           }
}
      
public function selectone($ID)
{
             ///$ID=$_SESSION['ID'];

  $sql="SELECT * from income where ID=:ID";
  $query = $this->db->pdo->prepare($sql);
  $query->bindvalue(":ID",$ID);
   $query->execute();
   $result =$query->fetch(PDO::FETCH_ASSOC);
   return $result;

}

public function update($ID,$income_date,$income_category,$income_amount)
{     
     try
  {
   $stmt=$this->db->pdo->prepare("UPDATE income SET income_date=:income_date,income_category=:income_category, income_amount=:income_amount WHERE ID=:ID ");
   $stmt->bindparam(":income_date",$income_date);
   $stmt->bindparam(":income_category",$income_category);
   $stmt->bindparam(":income_amount",$income_amount);
   $stmt->bindparam(":ID",$ID);
   $stmt->execute();
   
   return true; 
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
}


}