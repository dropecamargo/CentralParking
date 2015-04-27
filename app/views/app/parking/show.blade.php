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
				            <a href="{{ route('parking.edit', $parking->parq_id) }}" class="btn btn-primary">Editar</a>                  
					        <a href="{{ route('parking.index') }}" class="btn btn-info">Lista de parqueaderos</a>
					    </div>
			  		</div>
				</div>
				<div class="panel-body">	
					<div class="row">
				        <div class="form-group col-md-8">
				            <label><b>Nombre</b></label>
				            <div>{{ $parking->parq_nombre }}</div>
				        </div>
				   	</div>
				    <div class="row">
				        <div class="form-group col-md-5">
				        	<label><b>Dirección</b></label>
				            <div>{{ $parking->parq_direccion }}</div>        
				        </div>
				        <div class="form-group col-md-4">
				            <label><b>Email</b></label>
				            <div>{{ $parking->parq_email }}</div>        
				        </div> 
				        <div class="form-group col-md-3">        	
				            <label><b>Teléfono</b></label>
				            <div>{{ $parking->parq_telefono }}</div>        
				        </div>
				    </div>
				    <div class="row">
				        <div class="form-group col-md-5">
				        	<label><b>Horario</b></label>
				            <div>{{ $parking->parq_horario }}</div>        
				        </div>
				        <div class="form-group col-md-4">        	
				            <label><b>Tarifas</b></label>
				            <div>{{ $parking->parq_tarifas }}</div>        
				        </div>      
				    </div>
				    <div class="row">
				        <div class="form-group col-md-3">
				        	<label><b>Capacidad</b></label>
				            <div>{{ $parking->parq_cupost }}</div>       
				        </div>
				        <div class="form-group col-md-3">        	
				            <label><b>Cupos disponible</b></label>
				            <div>{{ $parking->parq_cuposd }}</div>        
				        </div>
				        <div class="form-group col-md-3">
				            <label><b>Convenio</b></label>
    						<div>{{ $parking->parq_convenio == 1 ? 'SI' : 'NO' }}</div>
				        </div>
				        <div class="form-group col-md-3">
				            <label><b>Mensualidades</b></label>
    						<div>{{ $parking->parq_mensualidades == 1 ? 'SI' : 'NO' }}</div>
				        </div>        
				    </div>
				    <div class="row">
				        <div class="form-group col-md-3">
				        	<label><b>Latitud</b></label>
				            <span class="glyphicon glyphicon-user" id="customer-glyphicon"></span>            
				            <div>{{ $parking->parq_latitud }}</div>        
				        </div> 
				        <div class="form-group col-md-3">
				        	<label><b>Longitud</b></label>
				            <span class="glyphicon glyphicon-user" id="customer-glyphicon"></span>            
				            <div>{{ $parking->parq_longitud }}</div>        
				        </div>        
				    </div>
				    <div class="row">
				        <div class="form-group col-md-4" >
				        	<label><b>Imagen</b></label>            
				        	@if($parking->parq_imagen)
				            	<div><img src="{{ $parking->parq_imagen }}" class="img-responsive" width="200" height="auto"></div>        
				        	@endif
				        </div>         
				    </div>
				</div>	
			</div>
		</div>
	</div>
@endsection
