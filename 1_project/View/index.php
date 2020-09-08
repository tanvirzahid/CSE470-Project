
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
            <h1 style="margin:0px 0px 10px 220px;"> Patient Management System for Doctors<h1>
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
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">
<img src="01.jpg" style='position:fixed;top:0px;left:0px;width:100%;height:100%;z-index:-1;' alt="">
    
	<h1 class="mt-4" style="margin:0px 0px 60px 320px; color:#FFFFFF;">Our Patients Are Our Practice</h1>
	
    
    <p>
<div class="row">
 <div class="col-sm-4" style="margin:0px 0px 0px 400px;">
        <a class="btn btn-primary btn-lg btn-block btn"     href="registration.php" role="button">New Patient ? SignUp here!</a>
		
		<a class="btn btn-primary btn-lg btn-block" href="DocReg.php" role="button">New Doctor ? SignUp here!</a>
		
        <a class="btn btn-primary btn-lg btn-block" href="login.php" role="button">Login for Patients </a>
		
		<a class="btn btn-primary btn-lg btn-block" href="Dlogin.php" role="button">Login for Doctors </a>

        <a class="btn btn-primary btn-lg btn-block" href="adminLogin.php" role="button">Admin access</a>

    </p>
	</div>
	</div>
</div>
<!-- /.container -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>