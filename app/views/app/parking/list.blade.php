<div align="center">
	{{ $parking->links() }}
</div>
<table id="table-search-customers" class="table table-striped">
	<thead>
		<tr>
			<th>&nbsp;</th>
			<th>Parqueadero</th>
			<th>Dirección</th>
			<th>Teléfono</th>
			<th>Capacidad</th>
			<th>Cupos disponibles</th>		
		</tr>	
	</thead>     	    	
	<tbody>
		@foreach ($parking as $object)
			<tr>
				<td nowrap="nowrap">					
					<a href="{{ route('parking.show', $object->parq_id) }}" class="btn btn-info">Ver</a>
					<a href="{{ route('parking.edit', $object->parq_id) }}" class="btn btn-primary">Editar</a>	
				</td>
				<td>{{ $object->parq_nombre }}</td>
				<td>{{ $object->parq_direccion }}</td>
				<td>{{ $object->parq_telefono }}</td>
				<td>{{ $object->parq_cupost }}</td>
				<td>{{ $object->parq_cuposd }}</td>
			</tr>	
		@endforeach	
	</tbody>
</table>
<script type="text/javascript">
	$(document).ready(function() {	
		$(".pagination a").click(function()
		{
			var url = $(this).attr('href');						
			$.ajax({
				url: url,
				type: "GET",
				data: $('#form-search-parking').serialize(),
				datatype: "html"
			})
			.done(function(data) {				
				$("#parking-list").empty().html(data.html);
			})
			.fail(function(jqXHR, ajaxOptions, thrownError)
			{
				$('#error-app').modal('show');
				$("#error-app-label").empty().html("No hay respuesta del servidor - Consulte al administrador.");				
			})
			return false;
		});
	});
</script>