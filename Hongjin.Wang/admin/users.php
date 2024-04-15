<?php
include "../notes/functions.php";

$filename = "../data/users.json";
$users = file_get_json("$filename");

$empty_user = (object)[
  "name"=>"",
  "email"=>"",
  "classes"=>[]
];

//print_p([$_GET,$_POST]);

if(isset($_GET['action'])){
  switch ($_GET['action']) {
    case "update":
      $users[$_GET['id']]->name = $_POST['user-name'];
      $users[$_GET['id']]->email = $_POST['user-email'];
      $users[$_GET['id']]->classes = explode(",", $_POST['user-classes']);

      file_put_contents($filename, json_encode($users));
      header("location:{$_SERVER['PHP_SELF']}?id={$_GET['id']}");
      break;

      case "create":
      $empty_user->name = $_POST['user-name'];
      $empty_user->email = $_POST['user-email'];
      $empty_user->classes = explode(",", $_POST['user-classes']);

      $id = count($users);

      $users[] = $empty_user;

      file_put_contents($filename, json_encode($users));
      header("location:{$_SERVER['PHP_SELF']}?id=$id");
      break;

      case "delete":
      array_splice($users,$_GET['id'],1);
      file_put_contents($filename, json_encode($users));
      header("location:{$_SERVER['PHP_SELF']}");
      break;
  }
}




function showUserPage($users) {

$id = $_GET['id'];
$addorredit = $id == "new" ? "Add" : "Edit";
$createorupdate = $id == "new" ? "create" : "update";
$classes = implode(", ", $users->classes);

$display = <<<HTML
<div>
<h2>Name: $users->name</h2>
<div>
<strong>Email:</strong>
<span>$users->email</span>
</div>
<div>
<strong>Classes:</strong>
<span>$classes</span>
</div>
</div>
HTML;

$form = <<<HDFSFH
<form method="post" action="{$_SERVER['PHP_SELF']}?id=$id&action=$createorupdate">
<h2>$addorredit User</h2>
   <div class="form-control">
    <label class="form-label" for="user-name">Name</label>
    <input class="form-input" name="user-name" id="user-name"type="text" value="$users->name"placeholder="Enter the User name">
   </div>
    <div class="form-control" >
    <label class="form-label" for="user-email">E-mail</label>
    <input class="form-input" name="user-email" id="user-email"type="text" value="$users->email"placeholder="Enter the User Email">
   </div>
    <div class="form-control" >
    <label class="form-label" for="user-classes">Classes</label>
    <input class="form-input" name="user-classes" id="user-classes"type="text" value="$classes" placeholder="Enter the User Classes">
    </div>
    <div class="form-control">
      <input type="submit" class="form-button" value="Update">
    </div>
    </form>
HDFSFH;

$output = $id == "new" ? $form :
"<div class='grid gap'>
 <div class='col-xs-12 col-md-5'>$display</div>
 <div class='col-xs-12 col-md-7'>$form</div>
 </div>
";

$delete = $id == "new" ? "" : "<a href = '{$_SERVER['PHP_SELF']}?id=$id&action=delete'>Delete</a>";

echo <<<HTML
<nav class="display-flex">
    <div class="flex-stretch">
    <a href="{$_SERVER['PHP_SELF']}">Back</a>
    </div>
    <div class="flex-none">$delete</div>
</nav>
$output 

HTML;
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
            <li><a href="<?= $_SERVER['PHP_SELF']?>">User List</a></li>
             <li><a href="<?= $_SERVER['PHP_SELF']?>?id=new">Add List</a></li>
          
          </ul>
      </nav>
    </div>
  </header>

    <div class="container">
      <div class="card soft">

        <?php

        if(isset($_GET['id'])){
          showUserPage($_GET['id']=="new"? $empty_user : $users[$_GET['id']]);

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