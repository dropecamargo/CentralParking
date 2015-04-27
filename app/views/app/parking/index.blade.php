@extends('layout.app')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
					    <div class="col-md-8">
					        Parqueaderos
					    </div>
			  		
					    <div class="col-md-4" style="text-align: right;">
							<a href="{{ route('parking.create') }}" class="btn btn-info">Nuevo Parqueadero</a>			
					    </div>
			  		</div>
				</div>

				<div class="panel-body">
					{{  Form::open(array('route' => 'parking.index', 'method' => 'POST', 'id' => 'form-search-parking'), array('role' => 'form')) }}			
					<div class="row">
				        <div class="form-group col-md-12">        	
				            {{ Form::label('parq_nombre', 'Nombre') }}
				            {{ Form::text('parq_nombre', null, array('class' => 'form-control', 'placeholder' => 'Ingrese nombre')) }}        
				        </div>
				 	</div> 	
				 	<div class="row" align="center">
						<button type="submit" class="btn btn-primary">Buscar</button>
						{{ Form::button('Limpiar', array('class'=>'btn btn-primary', 'id' => 'button-clear-search-parking' )) }}
					</div>
					<br/>
				 	{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div id="parking-list" class="col-md-10 col-md-offset-1">
			@include('app.parking.list')
		</div>
	</div>
	<script type="text/javascript">		
		var root_url = "<?php echo Request::root(); ?>/";
		var parking = { 			
			search : function(){
				var url = root_url + 'parking';	
				$.ajax({	
					url: url,		
					type : 'get',
					data: $('#form-search-parking').serialize(),	
					datatype: "html"
				})
				.done(function(data) {		
					$('#parking-list').empty().html(data.html)
				})
				.fail(function(jqXHR, ajaxOptions, thrownError)
				{
					$('#error-app').modal('show');
					$("#error-app-label").empty().html("No hay respuesta del servidor - Consulte al administrador.");				
				});
			},
			clearSearch : function(){
				$('#parq_nombre').val('')
			}
		}
		
		$("#form-search-parking").submit(function( event ) {  
			event.preventDefault()
			parking.search()	
		})

		$("#button-clear-search-parking").click(function( event ) {  
			parking.clearSearch()
			parking.search()	
		})
	</script>
@endsection
