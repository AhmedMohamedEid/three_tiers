<?php
session_start();
if (isset($_SESSION['admin_login'])) {
    $pageTitle = 'Home ';
    include 'init.php';

$x=simplexml_load_file("xml/m.xml");
include("xmlru.php");
if(isset($_POST['search'])){
    include("xmlru.php");
    foreach ($x->children() as $child) { 
        $tallf=explode('-',$child->tall);
        $tallf=range($tallf[0], $tallf[1]);
        $weightf=explode('-',$child->weight);
        $weightf=range($weightf[0], $weightf[1]);
        $speedf=explode('-',$child->speed);
        $speedf=range($speedf[0], $speedf[1]);
        $sportf=$child->sport;
      
        if (in_array($_POST['tall'],$tallf) && in_array($_POST['weight'], $weightf) && 
            in_array($_POST['speed'], $speedf))
        {
               $sportf;
            
        }  
        
    }

}

$stmt=$con->prepare("SELECT user_info.*, members.* FROM user_info
join members on members.memberid=user_info.userid");
$stmt->execute();
$users=$stmt->fetchAll();

?>


<div class="show-rule container">
  <div class="title">
    <h1 class="text-center ">All Members</h1>
  </div>
  <table class="table table-bordered table-striped">
  <thead  class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Tall</th>
      <th scope="col">Weight</th>
      <th scope="col">Speed</th>
      <th scope="col">Sport</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($stmt) {
      $j = 0;
      foreach ($users as $user) {
       
        $j+=1;
     ?>
        <tr>
          <th scope="row"><?=$j ?></th>
          <td><?=$user['username'] ?></td>
          <td><?=$user['address'] ?></td>
          <td><?=$user['phone'] ?></td>
          <td><?=$user['tall'] ?> CM</td>
          <td><?=$user['weight'] ?> Kg</td>
          <td><?=$user['speed'] ?> Km/h</td>
          <td><?php 
            foreach ($x->children() as $child) { 
                $tallf=explode('-',$child->tall);
                $tallf=range($tallf[0], $tallf[1]);
                $weightf=explode('-',$child->weight);
                $weightf=range($weightf[0], $weightf[1]);
                $speedf=explode('-',$child->speed);
                $speedf=range($speedf[0], $speedf[1]);
                $sportf=$child->sport;
              
                if (in_array($user['tall'],$tallf) && in_array($user['weight'], $weightf) && 
                    in_array($user['speed'], $speedf))
                {
                      echo $sportf . " ";
                    
                }  
                
            }
            ?>
          </td>
          <td>
            <a class="btn btn-success" href='edit.php?userid=<?=$user['userid'] ?>'>Edit</a>
            <a class="btn btn-danger" href='delete.php?userid=<?=$user['userid'] ?>'>Delete</a>
          </td>
        </tr>
    <?php }
    }else{
      echo "Find Error";
    } ?>
  </tbody>
 </table>
</div>


<div class="row">
  <div class="col-md-9">
    <div class="widget_form ">
      <h1 class="text-center ">Recommend Your Sport</h1>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="form-group">
          <label for="tall">Tall</label>
          <input type="text"  name="tall" class="form-control" id="tall" />
        </div>
        <div class="form-group">
          <label for="weightweight">Weight</label>
          <input type="text" name="weight" class="form-control" id="weight" />
        </div>
        <div class="form-group">
          <label for="speed">Speed</label>
          <input type="text" name="speed" class="form-control" id="speed" />
        </div>
        <input type="submit" class="btn btn-default" name="search" value="Recomend">
      </form>
    </div>  
  </div>
  <div class="col-md-3">
    <div class="recomend">
      <div class="alert alert-primary">
        <?php 
          if (isset($sportf)) {
            echo $sportf;
          }
         ?>
      </div>
    </div>
  </div>
</div>

<?php
    include 'footer.php';

}else{
        header('Location:login.php');
        exit();
    }
