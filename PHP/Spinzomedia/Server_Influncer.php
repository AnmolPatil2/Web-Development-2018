<?php
  
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database

DEFINE('DB_USERNAME', 'root');          // Enter the admin user name
DEFINE('DB_PASSWORD', 'root');          //Enter the passord
DEFINE('DB_HOST', 'localhost');         //Enter the Host
DEFINE('DB_DATABASE', 'registration');  //The database  you want to use

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
  // Will pop Error if DataBase connection fails
if (mysqli_connect_error()) {
  die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
}



// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $Username =  $_POST['Username'];
  $Email =  $_POST['Email'];
  $password_1 = $_POST['password_1'];
  $password_2 =$_POST['password_2'];
  $Phone_Number=$_POST['Phone_Number'];
  $Interest=$_POST['Interest'];
  $City=$_POST['City'];
  $Mailing_Address=$_POST['Mailing_Address'];
  $Instagram_Account=$_POST['Instagram_Account'];
  $Facebook_Account=$_POST['Facebook_Account'];
  $Twitter_Account=$_POST['Twitter_Account'];
  $Youtube_Account=$_POST['Youtube_Account'];
  //echo $Password=$_POST['password_1'];


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array

  if (empty($Username)) { array_push($errors, "Username is required"); }
  if (empty($Email)) { array_push($errors, "Email is required"); }
  if (empty($Phone_Number)) { array_push($errors, "Phone_Number is required"); }
  if (empty($Interest)) { array_push($errors, "Interest is required"); }
  if (empty($Mailing_Address)) { array_push($errors, "Mailing_Address is required"); }
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
  $user_check_query = "SELECT * FROM Influncer WHERE Username='$Username' OR Email='$Email' LIMIT 1";
  $result = mysqli_query($mysqli, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['Username'] === $Username) {
      
      array_push($errors, "Username already exists");
    }

    if ($user['Email'] === $Email) {
      
      array_push($errors, "Email already exists");
      
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
      $password = md5($password_1);//encrypt the password before saving in the database
      //$Phone_Number=md5($Phone_Number);
      //$City=md5($City);
      $Email=md5($Email);
      
      $query = "INSERT INTO Influncer (Username,  Email ,Instagram_Account,Mailing_Address,Facebook_Account,Youtube_Account,City,Phone_Number,Interest,Twitter_Account)  
      VALUES('$Username', '$Email','$Instagram_Account','$Mailing_Address','$Facebook_Account','$Youtube_Account','$City','$Phone_Number','$Interest','$Twitter_Account')";
                
                if (mysqli_query($mysqli, $query)) {
                    echo "New record created successfully";
              
                }
     /* $query = "INSERT INTO users (username)
      VALUES('$Username')";
if (mysqli_query($mysqli, $query)) {
echo "New record created successfully";*/

}


                
  	//$_SESSION['Username'] = $Username;
  	//$_SESSION['success'] = "You are now logged in";
  	//header('location: index.php');
  }


// ... 

