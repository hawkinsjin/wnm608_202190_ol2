<?php
include "../notes/functions.php";

$users = file_get_json("../data/users.json");

function showUserPage($users) {

$classes = implode(", ", $users->classes);


     echo <<<HDFSFH
     <nav class="nav nav-crumbs">
     <ul>
     <li><a href="../admin/users.php">Back</a></li>
     </ul>
     </nav>
<div>
   <h2>$users->name</h2>
   <div>
   <form>
    <label class="form-label">Type</label>
    <input type="text" placeholder="$users->type" class="form-input">
    </form>
   </div>
   <div>
   <form>
    <label class="form-label">Email</label>
    <input type="text" placeholder="$users->email" class="form-input">
    </form>
   </div>
   <div>
   <form>
    <label class="form-label">Classes</label>
    <input type="text" placeholder="$classes" class="form-input">
    </form>
   </div>
   <div class="form-control">
      <input type="button" class="form-button" value="Update">
    </div>
</div>
HDFSFH;

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User admin page</title>
  <?php include"../notes/parts/meta.php";?>
</head>
<body>
  <header class="navbar">
    <div class="container display-flex">
      <div class="flex-none">
        <h1>User Admin</h1>
      </div>
      <div class="flex-stretch"></div>
      <nav class="nav nav-flex flex-none">
          <ul>
            <li><a href="../admin/users.php">User List</a></li>
          </ul>
      </nav>
    </div>
  </header>

    <div class="container">
      <div class="card soft">

        <?php

        if(isset($_GET['id'])){
          showUserPage($users[$_GET['id']]);

        }else{

        ?>

      <h2>Users List</h2>
      <nav class="nav">
      <ul>

      <?php

      for($i=0;$i<count($users);$i++){
        echo "<li>
        <a href='../admin/users.php?id=$i'>{$users[$i]->name}</a>
        </li>";
      }

      ?>

    </ul>
  </nav>
         <?php }?>


      </div>
    </div>
</body>
</html>