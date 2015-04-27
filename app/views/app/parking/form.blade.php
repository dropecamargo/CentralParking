@extends('layout.app')

@section('content')

	<?php
		// Data parking
	    if ($parking->exists):
	       	$form_data = array('route' => array('parking.update', $parking->parq_id), 'method' => 'PATCH');
	       	$action    = 'Editar';        
	    else:
	        $form_data = array('route' => 'parking.store', 'method' => 'POST');
	        $action = 'Crear';        
		endif;
	?>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
					    <div class="col-md-8">
					        Parqueaderos
					    </div>
			  		
					    <div class="col-md-4" style="text-align: right;">
					        <a href="{{ route('parking.index') }}" class="btn btn-info">Lista de parqueaderos</a>
					    </div>
			  		</div>
				</div>
				<div class="panel-body">	
					@include ('errors', array('errors' => $errors))			
					{{ Form::model($parking, $form_data, array('role' => 'form')) }}
						<div class="row">
					        <div class="form-group col-md-8">
					            {{ Form::label('parq_nombre', 'Nombre') }}
					            {{ Form::text('parq_nombre', null, array('placeholder' => 'Nombre', 'class' => 'form-control')) }}        
					        </div>
					    </div>
					    <div class="row">
					        <div class="form-group col-md-5">
					        	{{ Form::label('parq_direccion', 'Dirección') }}
					            {{ Form::text('parq_direccion', null, array('placeholder' => 'Dirección', 'class' => 'form-control')) }}        
					        </div>
					        <div class="form-group col-md-4">
					            {{ Form::label('parq_email', 'Email') }}
					            {{ Form::text('parq_email', null, array('placeholder' => 'Email', 'class' => 'form-control')) }}        
					        </div> 
					        <div class="form-group col-md-3">        	
					            {{ Form::label('parq_telefono', 'Teléfono') }}
					            {{ Form::text('parq_telefono', null, array('placeholder' => 'Dirección', 'class' => 'form-control')) }}        
					        </div>
					    </div>
					    <div class="row">
					        <div class="form-group col-md-5">
					        	{{ Form::label('parq_horario', 'Horario') }}
					            {{ Form::text('parq_horario', null, array('placeholder' => 'Horario', 'class' => 'form-control')) }}        
					        </div>
					        <div class="form-group col-md-4">        	
					            {{ Form::label('parq_tarifas', 'Tarifas') }}
					            {{ Form::text('parq_tarifas', null, array('placeholder' => 'Tarifas', 'class' => 'form-control')) }}        
					        </div>      
					    </div>
					    <div class="row">
					        <div class="form-group col-md-3">
					        	{{ Form::label('parq_cupost', 'Capacidad') }}
					            {{ Form::text('parq_cupost', null, array('placeholder' => 'Capacidad', 'class' => 'form-control')) }}        
					        </div>
					        <div class="form-group col-md-3">        	
					            {{ Form::label('parq_cuposd', 'Cupos disponibles') }}
					            {{ Form::text('parq_cuposd', null, array('placeholder' => 'Cupos disponibles', 'class' => 'form-control')) }}        
					        </div>
					        <div class="form-group col-md-3">
					            {{ Form::label('parq_convenio', 'Convenio') }}
        						{{ Form::select('parq_convenio', array('' => 'Seleccione', '0' => 'NO', '1' => 'SI'), null, array('class' => 'form-control')) }}
					        </div>
					        <div class="form-group col-md-3">
					            {{ Form::label('parq_mensualidades', 'Mensualidades') }}
        						{{ Form::select('parq_mensualidades', array('' => 'Seleccione', '0' => 'NO', '1' => 'SI'), null, array('class' => 'form-control')) }}
					        </div>        
					    </div>
					    <div class="row">
					        <div class="form-group col-md-3">
					        	{{ Form::label('parq_latitud', 'Latitud') }}
					            <span class="glyphicon glyphicon-user" id="customer-glyphicon"></span>            
					            {{ Form::text('parq_latitud', null, array('placeholder' => 'Latitud', 'class' => 'form-control')) }}        
					        </div> 
					        <div class="form-group col-md-3">
					        	{{ Form::label('parq_longitud', 'Longitud') }}
					            <span class="glyphicon glyphicon-user" id="customer-glyphicon"></span>            
					            {{ Form::text('parq_longitud', null, array('placeholder' => 'Longitud', 'class' => 'form-control')) }}        
					        </div>        
					    </div>
					    <div class="row" align="center">
					    	{{ Form::button($action . ' parqueadero', array('type' => 'submit','class' => 'btn btn-success')) }}        
						</div>	
				    {{ Form::close() }}
				</div>
				@if($parking->exists)
					{{ Form::open(array('route' => 'parking.file','files' => true)) }}
					<div class="panel-footer">
						<div class="row">
					        <div class="form-group col-md-4">
								{{ Form::hidden('parq_id', $parking->parq_id) }}
					        	{{ Form::label('parq_imagen', 'Imagen') }}
	        		            {{ Form::file('parq_imagen') }}
					        </div> 
					        <div class="form-group col-md-4">
					     		{{ Form::button('Actualizar imagen', array('type' => 'submit','class' => 'btn btn-success')) }}        
					        </div>        
					    </div>	
						<div class="row">
					        <div class="form-group col-md-4">
		            			<div><img src="{{ $parking->parq_imagen }}" class="img-responsive" width="200" height="auto"></div>        
							</div>        
					    </div>
					</div>
					{{ Form::close() }}
				@endif
			</div>
		</div>
	</div>
@endsection
