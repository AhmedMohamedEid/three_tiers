<?php
 session_start();
if (isset($_SESSION['admin'])) {


 include("connect.php");
 $x=simplexml_load_file("xml/m.xml");
 include("xmlru.php");
  

   $stmt=$con->prepare("SELECT user_info.*, members.* FROM user_info
    join members on members.memberid=user_info.userid");
   $stmt->execute();
   $users=$stmt->fetchAll();
   
   

    echo"<table>";
   	echo "<tr>";
    echo"<td>name</td>";
   	echo"<td>address</td>";
   	echo"<td>phone</td>";
   	echo"<td>tall</td>";
   	echo"<td>weight</td>";
   	echo"<td>speed</td>";
   	 echo"<td>sport</td>";
    echo"<td>control</td>";
    
     
   echo "</tr>"; 
   

     foreach ($users as $user) 
     {
       echo "<tr>";
     	echo "<td>".$user['username']."</td>";
     	echo "<td>".$user['address']."</td>";
     	echo "<td>".$user['phone']."</td>";
      echo "<td>".$user['tall']."</td>";
     	echo "<td>".$user['weight']."</td>";
     	echo "<td>".$user['speed']."</td>";
     echo "<td>"; 

   
foreach ($x->children() as $child) {
  
  
    
  $tallf=explode('-',$child->tall);
  $tallf=range($tallf[0], $tallf[1]);
    
 

  $weightf=explode('-',$child->weight);
  $weightf=range($weightf[0], $weightf[1]);
    
    
    
    $speedf=explode('-',$child->speed);
    $speedf=range($speedf[0], $speedf[1]);
    
   
    $sportf=$child->sport;
  
  
if (in_array($user['tall'], $tallf) and in_array($user['weight'], $weightf) and 

    in_array($user['speed'], $speedf)
   )
   {
        // echo "<td>".$sportf."</td>";
        echo $sportf;
     } 
   
     // else{echo "sorry";} 
  
}

echo "</td>";

       echo "<td>";
           echo "<button><a href='edit.php?userid=".$user['userid']."'>edit</a></button>";
           echo "<span>||</span>";
           echo "<span>||</span>";
           echo "<button><a href='delete.php?userid=".$user['userid']."'>delete</a></button>";
          
           echo "</td>";
     
     echo "</tr>";
     }

  


   echo"</table>";
 
 ?>
 <div><a href="add.php">add member</a></div>
 <div><a href="xml/uixml.php">add rules</a></div>
 <div><a href="index.php">main page</a></div>
 <div><a href="showxmlrules.php">show rules</a></div>

 <?php }else{header("location:index.php");}


// foreach($xml->children() as $books) { 
//     echo $books->title['lang'];
//     echo "<br>"; 
// } 
?> 


<?php 
    include  $file.'footer.php';
?>