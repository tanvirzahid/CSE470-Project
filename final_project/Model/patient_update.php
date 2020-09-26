<?php
use PHPUnit\Framework\Constraint\IsEqual;

session_start();

if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: index.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    header("location: index.php");
}
    function updateP($id) {
     if ($id<200) {
return 'doctor';
     }
     else{
     return 'patient';
     }
     }
     
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Patient Management</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <!--            <img src="http://placehold.it/150x50?text=Logo" alt="">-->
            <h1> Patient Management System <h1>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <!--            <ul class="navbar-nav ml-auto">-->
            <!--                <li class="nav-item active">-->
            <!--                    <a class="nav-link" href="#">Home-->
            <!--                        <span class="sr-only">(current)</span>-->
            <!--                    </a>-->
            <!--                </li>-->
            <!--                <li class="nav-item">-->
            <!--                    <a class="nav-link" href="#">About</a>-->
            <!--                </li>-->
            <!--                <li class="nav-item">-->
            <!--                    <a class="nav-link" href="#">Services</a>-->
            <!--                </li>-->
            <!--                <li class="nav-item">-->
            <!--                    <a class="nav-link" href="#">Contact</a>-->
            <!--                </li>-->
            <!--            </ul>-->

            <?php if (isset($_SESSION['success'])) : ?>
                <div class="error success" >
                    <h3>
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>

            <!-- logged in user information -->
            <?php  if (isset($_SESSION['id'])) : ?>
                <p> <a href="index.php?logout='1'" style="margin:0px 0px 0px 40px; color: red; ">logout</a> </p>
            <?php endif ?>

        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">
    <h1 class="mt-4">Update Patient Information </h1>
    <p>


    <form method="post" action="validation.php">
        
        <div class="form-group">
            
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="ID" name="id">
        </div>
		
		<div class="form-group">
          
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Patient-Name" name="name">
        </div>
        <div class="form-group">
            
            <input type="text" class="form-control" id="formGroupExampleInput3" placeholder="Address" name="address">
        </div>
        
        <div class="form-group">
            
            <input type="text" class="form-control" id="formGroupExampleInput3" placeholder="Phone" name="phone">
        </div>

        <div class="form-group">
            
            <input type="text" class="form-control" id="formGroupExampleInput3" placeholder="Email" name="email">
        </div>
       <div class="form-group">
       
            <input type="text" class="form-control" id="formGroupExampleInput3" placeholder="Age" name="age">
        </div>


        <button type="submit" class="btn btn-primary" name="patient_update">Update Patient Info</button>
    </form>

    </p>
</div>
<!-- /.container -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>