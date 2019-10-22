<?php
include '../db/conexion.php';
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];

$q = "DELETE FROM Prestamos WHERE id = '$id' ";
mysqli_query($conn, $q) or die('Error en la consulta: ' . mysqli_error($conn));

?>

<script type="text/javascript">
	alert("Libro entregado exitosamente");
	window.location.href = '../views/informe.php';
</script>