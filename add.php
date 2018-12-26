<?php

session_start();
if (isset($_SESSION['admin_login'])) {
  	$pageTitle = 'Add Member';
	include 'init.php';
?>

<div class="widget_form">
  <h1 class="text-center ">Add Member</h1>
  <form action="insert.php" method="POST">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="username" class="form-control" id="name">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="text" name="password" class="form-control" id="password">
    </div>
    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="text" name="phone" class="form-control" id="phone">
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" name="address" class="form-control" id="address">
    </div>
    <div class="form-group">
      <label for="tall">Tall</label>
      <input type="text" name="tall" class="form-control" id="tall">
    </div>
    <div class="form-group">
      <label for="weight">Weight</label>
      <input type="text" name="weight" class="form-control" id="weight">
    </div>
    <div class="form-group">
      <label for="speed">Speed</label>
      <input type="text" name="speed" class="form-control" id="speed">
    </div>
    
    <input type="submit" class="btn btn-default" name="submit" value="Add">
  </form>
</div>

<?php 

    include  'footer.php';

}else{
        header('Location:login.php');
        exit();
    }
