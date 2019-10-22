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

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


    $id_libro = $_POST['id'];
    $departure_date = $_POST['departure_date'];
    $entry_date = $_POST['entry_date'];
    $quantity = $_POST['quantity'];
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

//     $query1 = "CREATE TRIGGER `Restar` AFTER INSERT ON `Prestamos` FOR EACH ROW 
// BEGIN 
//     UPDATE Libros SET Libros.uantity = Libros.uantity - '$quantity'
//     WHERE Libros.id='$id_libro';
// END;";

//     mysqli_query($conn, $query1) or die('Error en la consulta: ' . mysqli_error($conn));

    $query = "INSERT INTO Prestamos (id, name , last_name, address, phone, departure_date, entry_date, time)
VALUES ('$id_libro', '$name', '$last_name', '$address', '$phone', '$departure_date', '$entry_date', CURRENT_TIME())";



    if (mysqli_query($conn, $query)) {
        echo "<div class='alert alert-success mt-4' role='alert'><h3>Se agrego correctamente el prestamo.</h3>
    <a class='btn btn-outline-primary' href='../views/prestamo.php' role='button'>Regresar</a></div>";
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