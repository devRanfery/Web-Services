$(obtener_registros());

function obtener_registros(Libros)
{
	$.ajax({
		url : '../controllers/prestamos.php',
		type : 'POST',
		dataType : 'html',
		data : { Libros: Libros },
		})

	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
	})
}

$(document).on('keyup', '#busqueda', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}
});
