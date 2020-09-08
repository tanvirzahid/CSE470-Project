<?php
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
$username = "";
$email    = "";
$errors = array();
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');


// REGISTER USER
if (isset($_POST['patient_add'])) {
    // receive all input values from the form
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $address= mysqli_real_escape_string($db, $_POST['address']);
	$phone = mysqli_real_escape_string($db, $_POST['phone']);
     $email = mysqli_real_escape_string($db, $_POST['email']);
    
    $age = mysqli_real_escape_string($db, $_POST['age']);
    $query = "INSERT INTO `patient`(`id`, `name`, `address`, `phone`, `email`, `age`) VALUES ('{$id}','{$name}','{$address}','{$phone}','{$email}','{$age}')";
    $status = "";

    if (mysqli_query($db, $query)) {
        $status = "success";
    } else {
        $status = "Error description: " . mysqli_error($db);

    }
}



if (isset($_POST['sub_mit'])) {
    // receive all input values from the form
    $dID = mysqli_real_escape_string($db, $_POST['dID']);
   $dname=mysqli_real_escape_string($db, $_POST['dname']);
   $dtype=mysqli_real_escape_string($db, $_POST['dtype']);
   $pID=mysqli_real_escape_string($db, $_POST['pID']);
   $pname=mysqli_real_escape_string($db, $_POST['pname']);
   $age=mysqli_real_escape_string($db, $_POST['age']);
	$time = mysqli_real_escape_string($db, $_POST['time']);
     $date = mysqli_real_escape_string($db, $_POST['date']);
	 $problem = mysqli_real_escape_string($db, $_POST['problem']);
    
    
    $query = "INSERT INTO `prescription`(`dID`, `dname`, `dtype`, `pID`, `pname`, `age`, `time`, `date`, `problem`) VALUES ('{$dID}','{$dname}','{$dtype}','{$pID}','{$pname}','{$age}','{$time}','{$date}','{$problem}')";
    $status = "";

    if (mysqli_query($db, $query)) {
        $status = "success";
    } else {
        $status = "Error description: " . mysqli_error($db);

    }
}














///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// UPDATE USER
if (isset($_POST['patient_update'])) {
    // receive all input values from the form
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $age = mysqli_real_escape_string($db, $_POST['age']);
    $query = "UPDATE `patient` SET `name`='{$name}',`address`='{$address}',`phone`='{$phone}',`email`='{$email}',`age`='{$age}' WHERE `id` ='{$id}'";
    $status = "";

    if (mysqli_query($db, $query)) {
        $status = "success";
    } else {
        $status = "Error description: " . mysqli_error($db);

    }
}

if (isset($_POST['doctor_update'])) {
    // receive all input values from the form
   
    $id = mysqli_real_escape_string($db, $_POST['id']);
	$name = mysqli_real_escape_string($db, $_POST['name']);
    $doctype = mysqli_real_escape_string($db, $_POST['doctype']);
	$phone = mysqli_real_escape_string($db, $_POST['phone']);
    $email = mysqli_real_escape_string($db, $_POST['email']);

    $query = "UPDATE `doctor` SET `name`='{$name}',`doctype`='{$doctype}',`phone`='{$phone}',`email`='{$email}' WHERE `id` ='{$id}'";
    $status = "";

    if (mysqli_query($db, $query)) {
        $status = "success";
    } else {
        $status = "Error description: " . mysqli_error($db);

    }
}


if (isset($_POST['psub_mit'])) {
    // receive all input values from the form
   
    $id = ($_SESSION['id']);
	
	$pid = mysqli_real_escape_string($db, $_POST['pid']);
    $prescribe = mysqli_real_escape_string($db, $_POST['prescribe']);

    $query = "UPDATE `prescription` SET `prescription`='{$prescribe}' WHERE `dID` ='{$id}' AND `pID`={$pid}";
    $status = "";

    if (mysqli_query($db, $query)) {
        $status = "success";
    } else {
        $status = "Error description: " . mysqli_error($db);

    }
}












/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// DELETE USER

if (isset($_POST['patient_delete'])) {

    $id = mysqli_real_escape_string($db, $_POST['id']);

    $query="DELETE FROM `patient` WHERE  `id`='{$id}';";
    $status = "";
    if (mysqli_query($db, $query)) {
        $status = "success";
    } else {
        $status = "Error description: " . mysqli_error($db);

    }

}





if (isset($_POST['doctor_delete'])) {

    $id = mysqli_real_escape_string($db, $_POST['id']);

    $query = "DELETE FROM `doctor` WHERE `id`='{$id}';";
    $status = "";
    if (mysqli_query($db, $query)) {
        $status = "success";
    } else {
        $status = "Error description: " . mysqli_error($db);

    }
}

//////////////////////////////////////////////
//UPDATE PASSWORD

if (isset($_POST['ForgetPat'])) {
// receive all input values from the form
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $oldpassword = mysqli_real_escape_string($db, $_POST['oldpassword']);

    $newpassword = mysqli_real_escape_string($db, $_POST['newpassword']);
	$re="SELECT password from";
	
    $newspassword = md5($newpassword);
	$oldspassword = md5($oldpassword);
    $query = "UPDATE `patient` SET `password`='{$newspassword}'  WHERE `id`='{$id}' AND `password`='{$oldspassword}';";
    $status = "";
    if (mysqli_query($db, $query)) {
        $status = "success";
    } else {
        $status = "Error description: " . mysqli_error($db);

    }
}



if (isset($_POST['ForgetDoc'])) {
// receive all input values from the form
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $oldpassword = mysqli_real_escape_string($db, $_POST['oldpassword']);

    $newpassword = mysqli_real_escape_string($db, $_POST['newpassword']);
	$re="SELECT password from";
	
    $newspassword = md5($newpassword);
	$oldspassword = md5($oldpassword);
    $query = "UPDATE `doctor` SET `password`='{$newspassword}'  WHERE `id`='{$id}' AND `password`='{$oldspassword}';";
    $status = "";
    if (mysqli_query($db, $query)) {
        $status = "success";
    } else {
        $status = "Error description: " . mysqli_error($db);

    }
}

















mysqli_close($db);


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
                <p>Welcome <strong><?php echo $_SESSION['id']; ?></strong></p>
                <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
            <?php endif ?>

        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">
    <h1 class="mt-4">Admin area </h1>
    <p>

        <?php
        echo $status;
        ?>



    </p>
</div>
<!-- /.container -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>