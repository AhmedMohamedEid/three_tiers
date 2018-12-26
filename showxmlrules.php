<?php

session_start();
if (isset($_SESSION['admin_login'])) {
    $pageTitle = 'Show Rule';
  include 'init.php';

$x=simplexml_load_file("xml/m.xml");
$i=-1;
?>
<div class="show-rule container">
  <div class="title">
    <h1 class="text-center ">All Rules</h1>
  </div>
  <table class="table table-bordered table-striped">
  <thead  class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Sport</th>
      <th scope="col">Tall</th>
      <th scope="col">Weight</th>
      <th scope="col">Speed</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $j = 0;
      foreach ($x->children() as $rule) {
        $i+=1;
        $j+=1;
     ?>
        <tr>
          <th scope="row"><?=$j ?></th>
          <td><?=$rule->sport ?></td>
          <td><?=$rule->tall ?></td>
          <td><?=$rule->weight ?></td>
          <td><?=$rule->speed ?></td>
          <td>
            <a class="btn btn-success" href='editxml.php?sport=<?=$rule->sport ?>'>Edit</a>
            <a class="btn btn-danger" href='deletexml.php?sport=<?=$rule->sport ?>'>Delete</a>
          </td>
        </tr>
    <?php } ?>
  </tbody>
 </table>
</div>


<?php
    include 'footer.php';

}else{
        header('Location:login.php');
        exit();
    }
