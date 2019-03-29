@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="bol-container">
                <div class="seleccionador">  
                    <div class="titulo">
                        administrador
                    </div>
                    <div class="separador"></div>
                    <div class="sub-titulo">
                        Directorio Salud integral y Su Médico de Confianza
                    </div>                                                                                                                                                                                                                
                </div> 
                {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
                @if(Session::has('mensaje_error'))
                    {{ Session::get('mensaje_error') }}
                @endif
                {{ Form::open(array('url' => 'login')) }}
                    <div class="form-group float-label">
                        <label for="username">Usuario</label>
                        <input id="username" type="text" placeholder="Usuario" class="form-control" name="username" value="{{ Input::old('username') }}" required autofocus>
                    </div>
                    <div class="form-group float-label">
                        <label for="password">Password</label>
                        <input id="password" type="password" placeholder="Contraseña" class="form-control" name="password" required>
                    </div>
                    {{--{{ Form::password('password'); }}
                    {{ Form::label('lblRememberme', 'Recordar contraseña') }}
                    {{ Form::checkbox('rememberme', true) }} --}}               
                    <div class="labelSpace"></div>
                    <div class="labelSpace"></div>
                    <div class="row">
                            <div class="labelSpace"></div>
                        <div class="col-md-12 col-md-offset-4" style="padding-top: 20px;">
                            <button type="submit" class="btn btn-bol">
                                Ingresar
                            </button>                    
                        </div>
                    </div>                                        
                {{ Form::close() }}
                <div class="form-group">
                    <div class="col-md-12">
                        <p style="font-style:italic; text-align:center">A este sitio solo puede ingresar personal autorizado, si usted requiere más información puede comunicarse al correo <span style="color: #016D38;text-decoration:underline">xxxxxx@xxxxxx.com</span></p>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer id="login">
    <div class="container">                                 
        <div class="row">
            <div class="col-12">                    
                <ul class="social-media">
                    <li>
                        <a title="Facebook" target="_blank" href="https://www.facebook.com/pages/Seguros-Bol%C3%ADvar/143296635757515">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a title="Twitter" target="_blank" href="https://twitter.com/segurosbolivar">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a title="YouTube" target="_blank" href="https://www.youtube.com/segurosbolivar">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                </ul>
                <div class="copyright desktop">
                    © 2019 - <a title="Seguros Bolivar" target="_blank" href="http://www.segurosbolivar.co">Seguros Bolivar</a> - Todos los derechos reservados
                </div>
                
            </div>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/bootstrap-float-label.js"></script>
<script>
    $.bootstrapFloatLabel();
</script>
@endsection