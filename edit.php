<?php

    $host ="localhost";
    $username ="root";
    $password = "";
    $database ="CRUD";

   $conn = mysqli_connect($host, $username, $password, $database) or die("cannot connect lahh..");

    $id = $_GET['id'];

    $sql = "SELECT * from register where id = '$id'";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    // print_r($row);
    // exit;

        if($_POST){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $sql = "UPDATE `Register` SET `fname`='$fname',`lname`='$lname',`email`='$email',`password`='$password' WHERE id = '$id'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);

            header("Location: read.php");
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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

<div class="container-fluid">
<div class="row">

    <div class="col-xs-6 col-xs-offset-3 col-md-4 col-md-offset-4">
<!-- Default form register -->
<form class="text-center border border-light p-5" action="" method="POST">
<h1>EDIT</h1>
    <p class="h4 mb-4">Sign up</p>

    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input type="text" name="fname" id="fname" value=<?php echo $row['fname'] ?> class="form-control" placeholder="First name">
        </div>
        <div class="col">
            <!-- Last name -->
            <input type="text" name="lname" id="lname" value=<?php echo $row['lname'] ?> class="form-control" placeholder="Last name">
        </div>
    </div>

    <!-- E-mail -->
    <input type="email" name="email" id="email" value=<?php echo $row['email'] ?> class="form-control mb-4" placeholder="E-mail">

    <!-- Password -->
    <input type="password" name="password" id="Password" value=<?php echo $row['password'] ?> class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
        At least 8 characters and 1 digit
    </small>

    <!-- Phone number -->
    <input type="Repeat-Password" id="repeat-password" class="form-control" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">
    <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
        Optional - for two step authentication
    </small>

    <!-- Newsletter -->
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter">
        <label class="custom-control-label" for="defaultRegisterFormNewsletter">Subscribe to our newsletter</label>
    </div>

    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" name="submit" type="submit">Edit</button>

    <!-- Social register -->
    <p>or sign up with:</p>

    <a type="button" class="light-blue-text mx-2">
        <i class="fab fa-facebook-f"></i>
    </a>
    <a type="button" class="light-blue-text mx-2">
        <i class="fab fa-twitter"></i>
    </a>
    <a type="button" class="light-blue-text mx-2">
        <i class="fab fa-linkedin-in"></i>
    </a>
    
    </a>

    <hr>

    <!-- Terms of service -->
    <p>By clicking
        <em>Sign up</em> you agree to our
        <a href="" target="_blank">terms of service</a>

</form>
<!-- Default form register -->
</div>
</div>
</div>

</body>
</html>