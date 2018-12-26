<?php
ob_start(); // Output Buffring Start
session_start();
if (isset($_SESSION['admin_login'])) {
  	$pageTitle = 'Add Member';
	include 'init.php';
?>
<div class="widget_form">
  <h1 class="text-center ">Add Rule</h1>
  <form action="test.php" method="POST">
    <div class="form-group">
      <label for="tall">Tall</label>
      <input type="text" name="tall" class="form-control" id="tall" />
    </div>
    <div class="form-group">
      <label for="weightweight">Weight</label>
      <input type="text" name="weight" class="form-control" id="weight" />
    </div>
    <div class="form-group">
      <label for="speed">Speed</label>
      <input type="text" name="speed" class="form-control" id="speed" />
    </div>
    <div class="form-group">
    	<label for="sport">Sport</label>
    	<select name="sport" id="sport" class="form-control">
	  		<option value="">......</option>
	  		<option value="football">Football</option>
	  		<option value="basketball">Basketball</option>
	 		<option value="handball">Handball</option>
	 		<option value="vollyball">Vollyball</option>
	 		<option value="tennis">Tennis</option>
	 		<option value="swimming">Swimming</option>
		</select>
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
ob_end_flush();

?>


