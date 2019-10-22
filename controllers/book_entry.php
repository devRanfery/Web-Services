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
	

$title = $_POST['title'];
$author = $_POST['author'];
$editorial = $_POST['editorial'];
$gender = $_POST['gender'];
$hall = $_POST['hall'];
$quantity = $_POST['quantity'];


$query = "INSERT INTO Libros (title, author, editorial, gender, hall, uantity) VALUES ('$title', '$author', '$editorial', '$gender', '$hall', '$quantity')";


if (mysqli_query($conn, $query)) {
    echo "<div class='alert alert-success mt-4' role='alert'><h3>El libros agrego correctamente.</h3>
    <a class='btn btn-outline-primary' href='../views/alta.php' role='button'>Regresar</a></div>";		
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }	

mysqli_close($conn);
?>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>