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
                    
                    <input id="username" type="text" placeholder="Usuario" class="form-control" name="username" value="{{ Input::old('username') }}" required autofocus>
                    <div class="labelSpace"></div>
                    <input id="password" type="password" placeholder="Contraseña" class="form-control" name="password" required>
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
@endsection