$(obtener_registros());

function obtener_registros(Prestamos)
{
	$.ajax({
		url : '../controllers/report.php',
		type : 'POST',
		dataType : 'html',
		data : { Prestamos: Prestamos },
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
