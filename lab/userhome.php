<?php

    require_once('Database.php');
    $db = new Database();

  if(!isset($_COOKIE['loggedIn'])){
    header('location:signin.php?rid=5');
  }
  if(isset($_GET['rid'])){
      $id = $_GET['rid'];
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <div class="alert alert-success">
    <strong>Welcome!</strong> 
    <?php
      if($id == 1){
        print('Signin successfull');
      }

      elseif($id == 3){
        print('Signup successfull');
      }
    ?>
  </div>

  <div class="container">
    <div class="datatable">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>User Pass</th>
                    <th>Creation</th>
                </tr>
            </thead>
            <?php
                
                $st = $db->fetchAllUsers();
                foreach($st as $row){
                    print("<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><tr>");
                    print('</tr>');
                }
            ?>
            
        </table>
    </div>
  </div>
</div>

</body>
</html>