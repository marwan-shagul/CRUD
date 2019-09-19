<?php

    $host ="localhost";
    $username ="root";
    $password = "";
    $database ="CRUD";

   $conn = mysqli_connect($host, $username, $password, $database) or die("cannot connect lahh..");

   $sql = "SELECT * from Register";

   $result = mysqli_query($conn, $sql);
   
//    print_r($row);
//    exit;
 
// $x = 75; 
// $y = 25;
 
// function multiply() { 
//     $GLOBALS['z'] = $GLOBALS['x'] * $GLOBALS['y']; 
// }
 
// multiply(); 
// echo $z; 

    if(@$_POST["delete"]){
        $id = $_POST["delete"];
        $sql = "DELETE from Register where id = '$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: read.php");
    }
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <title>insert delete in form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head> 

<body>

<div class="container">
  <h2>Data from CRUD:Register</h2>
  <p>my table</p>            
    
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Password</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php 
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    ?>
      <tr>
        
        <td><?php echo $row["fname"]?></td>
        <td><?php echo $row["lname"]?></td>
        <td><?php echo $row["email"]?></td>
        <td><?php echo $row["password"]?></td>
        <form method="post">
        <td>
        <button type="submit" class="btn btn-danger" value="<?php echo $row['id']  ?>">DELETE</button>
        <input type="hidden" name="delete" class="btn btn-danger" id="submit" value="<?php echo $row['id'] ?>" >
        <a href="edit.php?id=<?php echo $row['id']?>" target="_blank"><button type="button" class="btn btn-warning"> EDIT</button></a>
        </td>
        </form>    
      </tr>
      
      <?php } ?>
    </tbody>
  </table>
    
</div>

</body>
</html>