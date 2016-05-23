
@extends('aspirante.layout')

@section('content')
    @if (Session::has('mensaje_exito'))
        <div class="container">
            <div class="alert alert-success fade in" id="alert_message">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Hecho: </strong> {{ Session::get('mensaje_exito') }}
            </div>
        </div>

        <script>
            window.setTimeout(function () { // hide alert message
                $("#alert_message").alert('close');
            }, 7000);//milisegundos
        </script>
    @endif
    <h1>Configurar cuenta</h1>
    @if ($errors->has('password'))
        <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
    @endif
    <form class="form-horizontal" role="form" action="/configuracion/guardar" method="POST">
        <div class="well well-sm" style="padding-top: 30px">
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Correo electrónico:</label>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-sm-7">
                    <input type="email" class="form-control" name="email" id="email" value="{{Auth::user()->email}}">
                </div>
                <div class="col-sm-3" align="right">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalPass">Guardar cambio</button>
                </div>
                <div id="modalPass" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirmar actualización</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" >Contraseña:</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control"  name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Actualizar Correo</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
     <form class="form-horizontal" role="form" action="/configuracion/guardar" method="POST">
        <div class="well well-sm" style="padding-top: 30px">
            <div class="form-group">
                <label class="control-label col-sm-2" for="password">Contraseña:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pass" name="password">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="password">Contraseña nueva:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="newPassword">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="password">Repetir contraseña nueva:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password2" name="newPassword2">
                </div>
            </div>
            @if ($errors->has('newPassword'))
                <span class="help-block">
                    <strong>{{ $errors->first('newPassword') }}</strong>
                </span>
            @endif
            <div class="form-group" align="right">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-default">Guardar Cambio</button>
                </div>
            </div>
        </div>
    </form>
@stop
