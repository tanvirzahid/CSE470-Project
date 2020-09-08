<?php
session_start();

// initializing variables
$id = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	//$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    
    $age = mysqli_real_escape_string($db, $_POST['age']);


    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($id)) { array_push($errors, "Username is required"); }
   // if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    /* if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    } */

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM patient WHERE id='$id' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['id'] === $id) {
            array_push($errors, "Username already exists");
        }
	}

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO `patient`(`id`, `name`, `password`, `address`, `phone`, `email`, `age`) VALUES ('{$id}','{$name}','{$password}','{$address}','{$phone}','{$email}','{$age}')";
        mysqli_query($db, $query);
        $_SESSION['id'] = $id;
        $_SESSION['success'] = "You are now logged in";
        header('location: PATIENT-INTERFACE.php');
		}

}




if (isset($_POST['dreg_user'])) {
    
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
	$doctype = mysqli_real_escape_string($db, $_POST['doctype']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	//$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
   
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $email = mysqli_real_escape_string($db, $_POST['email']);



    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($id)) { array_push($errors, "Username is required"); }
   // if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    /* if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    } */

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM doctor WHERE id='$id' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['id'] === $id) {
            array_push($errors, "Username already exists");
        }
	}

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO `doctor`(`id`, `name`,`doctype`, `password`, `phone`, `email`) VALUES ('{$id}','{$name}','{$doctype}','{$password}','{$phone}','{$email}')";
        mysqli_query($db, $query);
        $_SESSION['id'] = $id;
        $_SESSION['success'] = "You are now logged in";
        header('location: DOCTOR-INTERFACE.php');
		}

}





////////////////////////////LOGIN

if (isset($_POST['login_user'])) {
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($id)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM `patient`  WHERE `id`='{$id}' AND `password`='{$password}'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['id'] = $id;
            $_SESSION['success'] = "You are now logged in";
            header('location: PATIENT-INTERFACE.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

if (isset($_POST['Dlogin_user'])) {
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($id)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM `doctor`  WHERE `id`='{$id}' AND `password`='{$password}'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['id'] = $id;
            $_SESSION['success'] = "You are now logged in";
			//edit
            header('location: DOCTOR-INTERFACE.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}


if (isset($_POST['login_admin'])) {
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($id)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM `admin` WHERE `id`='{$id}' AND `password`='{$password}'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['id'] = $id;
            $_SESSION['success'] = "You are now logged in";
            header('location: adminArea.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}


?>