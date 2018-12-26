<?php
 session_start();
 include "connect.php";
if($_SERVER['REQUEST_METHOD']="POST"){
    
 $username=$_POST['username'];
 $password=$_POST['password'];
 $hashpass = sha1($password);
  

   }
 
  echo $username ;
$stmt=$con->prepare("SELECT * FROM user_info  WHERE username=?  AND  password=? AND GroupID=1");
$stmt->execute(array($username,$hashpass));
$row=$stmt->fetch();
$count=$stmt->rowCount();


if ($count>0) {
     $_SESSION['admin_login']=$username;
     $_SESSION['name']=$username;
     $_SESSION['id']=$row['userid'];
    

     header("location:index.php");
   
    exit();
     }else{
      header("location:login.php");
   
     }