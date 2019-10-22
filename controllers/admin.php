<?php
    // Connection info. file
	include '../db/conexion.php';	

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		}
			
	$email = $_POST['email']; 
	$password = $_POST['password'];
            
            
    $query = "SELECT * FROM Admin WHERE email = '$email'";

	$result = mysqli_query($conn, $query);
			
	$row = mysqli_fetch_assoc($result);
			
	$hash = $row['password'];
			

	if (password_verify($_POST['password'], $hash)) {		
		$_SESSION['loggedin'] = true;
		$_SESSION['name'] = $row['user'];
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (60 * 60) ;	
				
		include '../views/listaLibros.php';
			
		} else {
			echo "<div class='alert alert-danger mt-4' role='alert'>Email or Password are incorrects!
				<p><a href='index.php'><strong>Please try again!</strong></a></p></div>";			
		}	
?>
		
	