
<!DOCTYPE HTML>  
<html>
<head>     
    <title>registering</title>
    <?php include 'register_proc.php';?>

	<link type="text/css" rel="stylesheet" href="registersty.css">
	<link type="text/css" rel="stylesheet" href="navsty.css">
  <style >
    .error {color: #FF0000; font-size: 20px;text-align: right;}
    .radio{font-size: 20px ;padding: 2px ;margin:2px ;float:left; }
  </style>
</head>

<body>
		<header>
     <nav>
    <ul>
      <li><a href="#">Home</a></li>
       <li><a href="login.php">LOGIN</a></li>
      <li><a href="register.php">REGISTRATION</a></li>
    </ul>
  </nav>
</header>

<div class="wrap">
  REGISTERATION
  <br><br>

    
    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
	    <span class="error"> <?php echo $DB_error; ?></span>
			<input placeholder="Email   ex:{mohamed123@mail.com}" name="Email" value="<?php echo $Email; ?>" type="text"    />
		<span class="error"> <?php echo $Email_error;?></span>
	
		<input placeholder="Phone" name="Phone" value="<?php echo $Phone ;?>" type="text"    />
		<span class="error"> <?php echo $Phone_error;?></span>

		<input placeholder="Password" name="Password"  type="password"  />
			
		<span class="error"> <?php echo $password_error; ?> </span>

        <input placeholder="RePassword" name="Repassword"  type="password"    />
        <span class="error"> <?php echo $Repassword_error; ?> </span>

  <button type="submit" data-submit="...Sending"> REGISTER </button>
</form>
  
</div>
	</body>
</html>
