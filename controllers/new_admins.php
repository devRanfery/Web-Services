<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Libros - Admin</title>
	<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	<link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body>

	<?php
	include '../db/conexion.php';

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$checkEmail = "SELECT * FROM Admin WHERE email = '$_POST[email]' ";

	$result = $conn->query($checkEmail);

	$count = mysqli_num_rows($result);


	// Si count == 1 eso significa que el correo electrónico ya está en la base de datos
	if ($count == 1) {
		echo "<div class='alert alert-warning mt-4' role='alert'>
					<p>Este correo ya se encuentra registrado</p>
					<p><a href='../index.php'>Por favor inicie sesión aquí</a></p>
				</div>";
	} else {

		$name = $_POST['user'];
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$phone = $_POST['phone'];

		
		$passHash = password_hash($pass, PASSWORD_DEFAULT);

		$query = "INSERT INTO Admin (user, email, password, phone) VALUES ('$name', '$email', '$passHash', $phone)";

		if (mysqli_query($conn, $query)) {
			echo "<div class='alert alert-success mt-4' role='alert'><h3>Tu cuenta a sido creada correctamente</h3>
		<a class='btn btn-outline-primary' href='../index.php' role='button'>Iniciar Sesion</a></div>";
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}
	}
	mysqli_close($conn);
	?>


	<!-- Bootstrap core JavaScript-->
	<script src="../vendor/jquery/jquery.min.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>