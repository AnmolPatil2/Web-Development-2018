<?php include('Server_Brand.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="Register_Brand.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Brand_Name</label>
  	  <input type="text" name="Brand_Name" value="<?php echo $Brand_Name; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Brand_Exective_Name</label>
  	  <input type="text" name="Brand_Exective_Name" value="<?php echo $Brand_Exective_Name; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
      </div>
      <div class="input-group">
  	  <label>Brand_Exective_Phone</label>
  	  <input type="text"  name="Brand_Exective_Phone">
  	</div>
      <div class="input-group">
  	  <label>Address</label>
  	  <input type="text"  name="Address">
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