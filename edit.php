<?php
session_start();
if (isset($_SESSION['admin_login'])) {
    $pageTitle = 'Add Member';
    include 'init.php';

    $do = isset($_GET['do'])?$_GET['do'] : '';
    
if($do == ''){

   if (isset($_GET['userid'])&& is_numeric($_GET['userid'])) {
         $userid=$_GET['userid'];
          $stmt=$con->prepare("SELECT user_info.*, members.* FROM user_info
         join members on members.memberid=user_info.userid where userid=?");
       $stmt->execute(array($userid));
       $users=$stmt->fetch();
    
	?>
	
<div class="widget_form">
  <h1 class="text-center ">Edit Member Data</h1>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>?do=update" method="POST">
    <input type="hidden" name="userid" value="<?php echo $userid ?>">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="username" class="form-control" id="name" value="<?php echo $users['username']?>" />
    </div>
    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="text" name="phone" class="form-control" id="phone" value="<?php echo $users['phone']?>" />
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" name="address" class="form-control" id="address" value="<?php echo $users['address']?>" />
    </div>
    <div class="form-group">
      <label for="tall">Tall</label>
      <input type="text" name="tall" class="form-control" id="tall" value="<?php echo $users['tall']?>" />
    </div>
    <div class="form-group">
      <label for="weight">Weight</label>
      <input type="text" name="weight" class="form-control" id="weight" value="<?php echo $users['weight']?>" />
    </div>
    <div class="form-group">
      <label for="speed">Speed</label>
      <input type="text" name="speed" class="form-control" id="speed" value="<?php echo $users['speed']?>" />
    </div>
    <input type="submit" class="btn btn-default" name="update" value="Update">
    <a href="index.php" class="btn btn-default" >Back</a>
  </form>
</div>


<?php
}
}elseif ($do == 'update') {
  if (isset($_POST['update'])) 
    {
      $user_id   = $_POST['userid'];
      $username  =$_POST['username'];
      $phone     =$_POST['phone'];
      $address   =$_POST['address'];
      $tall      =$_POST['tall'];
      $weight    =$_POST['weight'];
      $speed     =$_POST['speed'];
     
      $stmt=$con->prepare("UPDATE user_info  SET username=?, phone=? WHERE userid=?");
      $stmt->execute(array($username,$phone,$user_id));

      $stmt1=$con->prepare("UPDATE members  SET tall=?,weight=?,speed=? WHERE memberid=?"); 
      $stmt1->execute(array($tall,$weight,$speed,$user_id));
      if ($stmt1 && $stmt ) {
        redirectPage('back');
      }
    }
}


  include  'footer.php';

}else{
        header('Location:login.php');
        exit();
    }
