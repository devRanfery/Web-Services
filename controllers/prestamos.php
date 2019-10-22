<?
session_start();

include '../db/conexion.php';

if ($conn -> connect_errno)
{
	die("Fallo la conexion:(".$conn -> mysqli_connect_errno().")".$conn-> mysqli_connect_error());
}

$tabla="";
$query="SELECT * FROM Libros ORDER BY id DESC LIMIT 1";

if(isset($_POST['Libros']))
{
	$q=$conn->real_escape_string($_POST['Libros']);
	$query="SELECT * FROM Libros WHERE 
		id LIKE '%".$q."%' OR
		title LIKE '%".$q."%' OR
		author LIKE '%".$q."%' OR
		editorial LIKE '%".$q."%' OR
		gender LIKE '%".$q."%' OR
		hall LIKE '%".$q."' OR
		uantity LIKE '%".$q."' ORDER BY id DESC LIMIT 1";
}

$buscarAlumnos=$conn->query($query);
if ($buscarAlumnos->num_rows > 0)
{
	$tabla.= 
	'<table class="table table-hover">
		<tr class="table-active">
			<td>ID</td>
			<td>Titulo</td>
			<td>Autor</td>
			<td>Editorial</td>
			<td>Genero</td>
			<td>Pasillo</td>
            <td>Cantidad</td>
		</tr>';

	while($filaAlumnos= $buscarAlumnos->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td>'.$filaAlumnos['id'].'</td>
			<td>'.$filaAlumnos['title'].'</td>
			<td>'.$filaAlumnos['author'].'</td>
			<td>'.$filaAlumnos['editorial'].'</td>
			<td>'.$filaAlumnos['gender'].'</td>
			<td>'.$filaAlumnos['hall'].'</td>
            <td>'.$filaAlumnos['uantity'].'</td>
		 </tr>
		';
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;





?>
