<?php include('Server_Influncer.php') ?>
<!DOCTYPE html>
<html >

<head>
<title>Registration system PHP and MySQL</title>
 
		<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="Register_Influncer.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Name</label>
  	  <input type="text" name="Username" value="<?php echo $Username; ?>">
  	</div>
      <div class="input-group">
  	  <label>Interest</label>
  	  <input type="text" name="Interest" >
  	</div>
      <div class="input-group">
  	  <label>Phone Number</label>
  	  <input type="text" name="Phone_Number" >
  	</div>
      
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="Email" value="<?php echo $Email; ?>">
  	</div>
      

  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
      <div class="input-group">
  	  <label>City</label>
  	  <input type="password" name="City">
  	</div>
      <div class="input-group">
  	  <label>Mailing Address</label>
  	  <input type="text"  name="Mailing_Address">
  	</div>
      <div class="input-group">
  	  <label>Instagram Account</label>
  	  <input type="text"  name="Instagram_Account">
  	</div>
      <div class="input-group">
  	  <label>Facebook Account</label>
  	  <input type="text"  name="Facebook_Account">
  	</div>
      <div class="input-group">
  	  <label>Twitter Account</label>
  	  <input type="text"  name="Twitter_Account">
  	</div>
      <div class="input-group">
  	  <label>Youtube Account</label>
  	  <input type="text"  name="Youtube_Account">
  	</div>
      

      
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>