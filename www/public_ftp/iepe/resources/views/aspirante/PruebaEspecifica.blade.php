@extends('layouts.aspirante-layout')

<script type="text/javascript">
	function asignar_segunda() {
		alert("Aqui se genera y muestra la constancia de asignacion. También se le manda un correo con el PDF")
		btn_verConstancia.disabled=false;
		btn_asignar.disabled=true;

	}
</script>
@section('content')	
	<h1>Prueba especifica</h1>
	<div class="container">
        <h2>Aplicaciones</h2>

		@foreach($aplicaciones as $aplicacion)
			<div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" href="#colapse{{$aplicacion->id}}">{{$aplicacion->nombre}}</a>
							- <strong>No asignada</strong>
						</h4>
					</div>
					<div id="colapse{{$aplicacion->id}}" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="col-sm-3">
								<div class="row">
									<div class="col-xs-4"><strong>Fecha:</strong> </div>
									<div class="col-xs-5"> {{$aplicacion->fecha_aplicacion}} </div>
								</div>
								<div class="row">
									<div class="col-sm-4"><strong>Horario: </strong></div>
									<div class="col-sm-4"> sin asignar* </div>
								</div>
								<div class="row">
									<div class="col-sm-4"><strong>Salon:</strong> </div>
									<div class="col-sm-4"> sin asignar* </div>
								</div>
								<div class="row">
									<div class="col-sm-4"><strong>Resultado:</strong> </div>
									<div class="col-sm-4"> sin calificar* </div>
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<button class="btn btn-xs btn-primary" id="btn_asignar"onClick="asignar_segunda();">
								Asignar oportunidad
							</button>
							<button class="btn btn-xs btn-primary" id="btn_verConstancia" disabled="disabled">Ver constancia de asignación</button>
						</div>
					</div>
				</div>
			</div>
		@endforeach

    </div>
@stop