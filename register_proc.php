<?php 

// define variables and set to empty values
 $Email_error = $Phone_error  = $password_error = $Repassword_error =  $DB_error = "";
 $Email = $Phone =   $password = $Repassword = "";

$conn = new mysqli('localhost','root','','messaging system');

	if($conn->connect_error) {

	$DB_error ="database connection error!";
} else{

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Email validation

  if (empty($_POST["Email"])) {
    $Email_error = "Email is required";
  } else {
    $Email = test_input($_POST["Email"]);
    
    
	if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      $Email_error = "Invalid email format"; 
    }else {
    	
    	$result= $conn->query("SELECT * FROM user WHERE Email = '$Email' ");
		 if( $result->num_rows > 0 ){
		 $Email_error = "This Email is already reserved";
		 }
  }
  }
  
  
  if (empty($_POST["Phone"])) {
    $Phone_error = "Phone is required";
  } else {
    $Phone = test_input($_POST["Phone"]);
    // check if e-mail address is well-formed
    if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$Phone)) {
      $Phone_error = "Invalid phone number"; 
    }
  }

  
  
 
  
  
  if (empty($_POST["Password"])) {
    $password_error = "you must enter a password ! ";
  } else {
    $password= test_input($_POST["Password"]);
    
   }
  
  if (empty($_POST["Repassword"])) {
    $Repassword_error = "you must enter a password !";
  } else {
    $Repassword = test_input($_POST["Repassword"]);
  }
  
  //matching passwords !
  if($Repassword_error == "" && $password_error == "" ) {
  if($_POST['Password'] != $_POST['Repassword']){
		$password_error = "passwords do not match !!";
	}

 }
	
 
	if($Repassword_error == "" && $password_error == ""  && $Email_error == "" && $Phone_error == "" ) {
	
	

		$Email = test_input($_POST["Email"]);
		$Phone = test_input($_POST["Phone"]);
		$password= test_input($_POST["Password"]);

		
		
		$sql = "INSERT INTO user ( email,password,Phone) VALUES (?,?,?)" ;
		
		$stmt = mysqli_stmt_init($conn);
		
	

		 if(mysqli_stmt_prepare($stmt,$sql)){
			
    		$DB_error ="New record created successfully";
    		mysqli_stmt_bind_param($stmt,"sss",$Email,$password,$Phone);
    		mysqli_stmt_execute($stmt);
    		header( "Refresh:3; url=login.php" );
			} else {
    							
    		$DB_error ="something wents wrong !!!! ";
    		
    		} 
    		
    		
	
	}
 
  }
}




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
} 

?>