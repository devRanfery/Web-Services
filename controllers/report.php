<?
/////// CONEXIÓN A LA BASE DE DATOS /////////

include '../db/conexion.php';

if ($conn -> connect_errno)
{
	die("Fallo la conexion:(".$conn -> mysqli_connect_errno().")".$conn-> mysqli_connect_error());
}

//////////////// VALORES INICIALES ///////////////////////

$tabla="";
// $query="SELECT Libros.name, Prestamos.name, Prestamos.author, Prestamos.editorial FROM Libros INNER JOIN Prestamos ON Libros.id=Prestamos.id";
$query="SELECT Libros.title, Libros.author, Libros.editorial, Prestamos.id, Prestamos.name, Prestamos.last_name, Prestamos.entry_date FROM Libros INNER JOIN Prestamos ON Libros.id=Prestamos.id";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['Prestamos']))
{
	$q=$conn->real_escape_string($_POST['Prestamos']);
    $query="SELECT Libros.title, Libros.author, Libros.editorial, Prestamos.id, Prestamos.name, Prestamos.last_name, Prestamos.entry_date  FROM Libros INNER JOIN Prestamos ON Libros.id=Prestamos.id WHERE Prestamos.name '%".$q."%'";
}

$buscarAlumnos=$conn->query($query);
if ($buscarAlumnos->num_rows > 0)
{
	$tabla.= 
	'<table class="table table-hover">
		<tr class="table-active">
			<td>Titulo</td>
			<td>Autor</td>
            <td>Editorial</td>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Fecha entrega</td>
            <td></td>
		</tr>';

	while($filaAlumnos= $buscarAlumnos->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td>'.$filaAlumnos['title'].'</td>
			<td>'.$filaAlumnos['author'].'</td>
            <td>'.$filaAlumnos['editorial'].'</td>
			<td>'.$filaAlumnos['name'].'</td>
			<td>'.$filaAlumnos['last_name'].'</td>
			<td>'.$filaAlumnos['entry_date'].'</td>
		    <td><a href="../controllers/eliminar_libro.php?id='.$filaAlumnos['id'].'""><button type="button" class="btn btn-success">Entregado</button></a> </td>
		    
		 </tr>';
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;
?>

