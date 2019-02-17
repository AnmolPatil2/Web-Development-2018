<?php
  include('errors.php');
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database

DEFINE('DB_USERNAME', 'root');   // Enter the admin user name
DEFINE('DB_PASSWORD', 'root');   //Enter the passord
DEFINE('DB_HOST', 'localhost');  //Enter the Host
DEFINE('DB_DATABASE', 'registration');  //The database  you want to use

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
// Will pop Error if DataBase connection fails
if (mysqli_connect_error()) {
  die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
}



// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
   $Brand_Name=$_POST['Brand_Name'];
   $Brand_Exective_Name=$_POST['Brand_Exective_Name'];
   $Brand_Exective_Phone=$_POST['Brand_Exective_Phone'];
   $Address=$_POST['Address'];
   $Instagram_Account=$_POST['Instagram_Account'];
   $Facebook_Account=$_POST['Facebook_Account'];
   $Twitter_Account=$_POST['Twitter_Account'];
   $Youtube_Account=$_POST['Youtube_Account'];
  

  							


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array

  
  if (empty($Brand_Name)) { array_push($errors, "Brand_Name is required"); }
  if (empty($Brand_Exective_Name)) { array_push($errors, "Brand_Exective_Name is required"); }
  if (empty($Brand_Exective_Phone)) { array_push($errors, "Brand_Exective_Phone is required"); }
  if (empty($Address)) { array_push($errors, "Address is required"); }
  if (empty($Instagram_Account)) { array_push($errors, "Instagram_Account is required"); }
  if (empty($Facebook_Account)) { array_push($errors, "Facebook_Account is required"); }
  if (empty($Twitter_Account)) { array_push($errors, "Twitter_Account is required"); }
  if (empty($Youtube_Account)) { array_push($errors, "Youtube_Account is required"); }

  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM Brand WHERE Brand_Name='$Brand_Name' OR Brand_Exective_Name='$Brand_Exective_Name' LIMIT 1";
  $result = mysqli_query($mysqli, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['Brand_Name'] === $Brand_Name) {
      
      array_push($errors, "Brand_Name already exists");
    }
    // Optinal 
    //if ($user['Brand_Exective_Name'] === $Brand_Exective_Name) {
     
      //array_push($errors, "email already exists");
    //} 
    }
  

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO Brand (Brand_Name,  Brand_Exective_Name, Brand_Exective_Phone, Address, Instagram_Account, Facebook_Account,Twitter_Account, Youtube_Account)  
VALUES('$Brand_Name','$Brand_Exective_Name', '$Brand_Exective_Phone', '$Address','$Instagram_Account','$Facebook_Account','$Twitter_Account','$Youtube_Account')";
          
          if (mysqli_query($mysqli, $query)) {
              echo "New record created successfully";
        
          }
              
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: --Index.php');
  }
}

// ... 

