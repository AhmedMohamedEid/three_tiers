<?php 
session_start();
    $pageTitle = 'Admin Login';
    $nonavbar = '';
    if(isset($_SESSION['Admin_login'])){
        header('Location: index.php'); // Register to dashboard Page
    }
    include 'init.php';
?>
<div class="widget_form">
  <h1 class="text-center ">Login</h1>
  <form action="logininf.php" method="POST">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" name="username" class="form-control" id="username" />
    </div>
    <div class="form-group">
      <label for="password">password</label>
      <input type="password" name="password" class="form-control" id="password" />
    </div>
    <input type="submit" class="btn btn-default" name="submit" value="Login"/>
  </form>
</div>
 
<?php 
    include 'footer.php';
?>