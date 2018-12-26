<?php

session_start();
if (isset($_SESSION['admin_login'])) {
    $pageTitle = 'Edit Rule';
  include 'init.php';


$x=simplexml_load_file("xml/m.xml");

// $xml->book[0]->titl
 include("xmlru.php");
$sport=$_GET['sport'];


foreach ($x->children() as $child) {
	if($_GET['sport']==$child->sport){
		 $sportf=$child->sport;
	     $tallf=$child->tall;
	     $weightf=$child->weight;
	     $speedf=$child->speed;

	}
	
}

?>


<div class="widget_form">
  <h1 class="text-center ">Edit Rule</h1>
  <form action="updatxml.php" method="POST">
    <div class="form-group">
      <label for="tall">Tall</label>
      <input type="text" name="tall" class="form-control" id="tall"  value="<?php echo $tallf ?>"/>
    </div>
    <div class="form-group">
      <label for="weightweight">Weight</label>
      <input type="text" name="weight" class="form-control" id="weight"  value="<?php echo $weightf ?>"/>
    </div>
    <div class="form-group">
      <label for="speed">Speed</label>
      <input type="text" name="speed" class="form-control" id="speed"  value="<?php echo $speedf ?>"/>
    </div>
    <div class="form-group">
    	<label for="sport">Sport</label>
    	<select name="sport" id="sport" class="form-control">
	  		<option value="">......</option>
	  		<option value="football" <?php if($sportf=='football'){echo "selected";} ?> >Football</option>
	  		<option value="basketball" <?php if($sportf=='basketball'){echo "selected";} ?>>Basketball</option>
	 		<option value="handball" <?php if($sportf=='handball'){echo "selected";} ?>>Handball</option>
	 		<option value="vollyball" <?php if($sportf=='vollyball'){echo "selected";} ?>>Vollyball</option>
	 		<option value="tennis" <?php if($sportf=='tennis'){echo "selected";} ?>>Tennis</option>
	 		<option value="swimming" <?php if($sportf=='swimming'){echo "selected";} ?>>Swimming</option>
		</select>
    </div>
    
    <input type="submit" class="btn btn-default" name="submit" value="Update">
    <a href="showxmlrules.php" class="btn btn-default"> Back</a>
  </form>
</div>
 
 



<?php
   include 'footer.php';

}else{
        header('Location:login.php');
        exit();
    }
