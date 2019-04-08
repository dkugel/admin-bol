@extends('layouts.layout')

@section('content')
      
    <div class="welcome">   
            <nav class="nav-container showNav">
                <ul class="nav-list">
                    <li class="list-item"><a href="/" class="home-link">Home</a></li>
                    <li class="list-item"><a href="descargar" class="down-link">Download</a></li>                                  
                </ul>
            </nav> 
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-md-offset-12">
                    <div class="sesion">                        
                        <a href="logout">Cerrar sesión</a>
                        <img src="/images/cerrar-sesion.png">
                    </div>
                </div>
            </div>            
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-md-offset-9" style="text-align: center;">
                    <a href="new" class="btn btn-new" data-toggle="modal" data-target="#myModalUpdateRecord" >Crear nuevo dato</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="bol-content">
                        <table  class="tabla-bol">
                            <th id="tip_id" class="centered">Tipo de identificación</th>
                            <th># de identificación</th>
                            <th>Nombres</th>
                            <th>Departamento</th>
                            <th>Ciudad</th>
                            <th>Servicio</th>
                            <th>Especialidad</th>
                            <th><a href="#" class="more-info">más</a></th>
                                <?php foreach ($data as $dato): ?>
                                <tr>
                                    <td class="centered"><?php echo $dato->tipo_id; ?></td>
                                    <td><?php echo $dato->num_id; ?></td>
                                    <td><?php echo $dato->nombres; ?></td>
                                    <td><?php echo $dato->departamento; ?></td>
                                    <td><?php echo $dato->ciudad; ?></td>
                                    <td><?php echo $dato->agrupador; ?></td>
                                    <td><?php echo $dato->especialidad; ?></td>
                                    <td><a href="#" class="more-info" data-toggle="modal" data-target="#myModal<?php echo $dato->id; ?>" data-id="{{ $dato->id }}">más</a></td>
                                </tr>
                                <?php endforeach; ?>
                        </table>
                    </div>
                    <?php echo $data->links(); ?>                
                </div>                                    
            </div>

            <div class="container">                                      
                <!-- Modal -->
                <?php foreach ($data as $dato): ?>
                <div class="modal fade" id="myModal<?php echo $dato->id; ?>" role="dialog">
                    <div class="modal-dialog">
                    
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>                        
                        </div>
                        <div class="modal-body">
                        <p><span>Tipo de identificación: </span><?php echo $dato->tipo_id; ?></p>
                        <p><span># de identificación: </span><?php echo $dato->num_id; ?></p>
                        <p><span>Nombres: </span><?php echo $dato->nombres; ?></p>
                        <p><span>Departamento: </span><?php echo $dato->departamento; ?></p>
                        <p><span>Ciudad: </span><?php echo $dato->ciudad; ?></p>
                        <p><span>Servicio: </span><?php echo $dato->agrupador; ?></p>
                        <p><span>Especialidad: </span><?php echo $dato->especialidad; ?></p>
                        <p><span>Direcciones: </span><?php echo $dato->direccion; ?></p>
                        <p><span>Teléfono o Celular: </span><?php echo $dato->telefono; ?></p>
                        <p><span>Médico de confianza: </span><?php echo $dato->aliado; ?></p>                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-edit" data-toggle="modal" data-target="#myModalUpdate<?php echo $dato->id; ?>" data-id="{{ $dato->id }}" data-dismiss="modal">Editar</button>
                            <button type="button" class="btn btn-delete" data-toggle="modal" data-target="#myModalDelete<?php echo $dato->id; ?>" data-id="{{ $dato->id }}" data-dismiss="modal">Eliminar</button>                            
                        </div>
                    </div>
                    
                    </div>
                </div>
                <?php endforeach; ?>

                <?php foreach ($data as $dato): ?>
                <div class="modal fade" id="myModalDelete<?php echo $dato->id; ?>" role="dialog">
                    <div class="modal-dialog">                        
                    <!-- Modal content-->
                    <div class="modal-content">    
                        <div class="advertencia">                            
                            <img src="/images/warning.svg"><br>
                            ¿Esta seguro que desea eliminar este dato de la base?                                                        
                        </div>                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-bol" data-toggle="modal" data-target="#myModalDelete<?php echo $dato->id; ?>" data-id="{{ $dato->id }}" >Si, eliminar</button>
                            <button type="button" class="btn btn-bol" data-toggle="modal" data-target="#myModalDelete<?php echo $dato->id; ?>" data-id="{{ $dato->id }}" >No eliminar</button>
                        </div>
                    </div>
                    
                    </div>
                </div>
                <?php endforeach; ?>

                <?php foreach ($data as $dato): ?>

                <div class="modal fade" id="myModalUpdate<?php echo $dato->id; ?>" role="dialog">
                    <div class="modal-dialog">                        
                    <!-- Modal content-->
                    <div class="modal-content">   
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>                        
                        </div>     
                        {{ Form::open(array('url' => '/', 'method' => 'post','class' =>'editForm')) }}                                            
                            <div class="form-group label">
                                <label for="tipoid">Tipo de identificación:</label>
                                <input id="tipoid" type="text" value="<?php echo $dato->tipo_id; ?>" class="form-control" name="tipoid" required >
                            </div>
                            <div class="form-group label">
                                <label for="identificacion"># de identificación</label>
                                <input id="identificacion" type="text" value="<?php echo $dato->num_id; ?>" class="form-control" name="identificacion" required>
                            </div>
                            <div class="form-group label">
                                <label for="nombre">Nombres:</label>
                                <input id="nombre" type="text" value="<?php echo $dato->nombres; ?>" class="form-control" name="nombre" required>
                            </div>
                            <div class="form-group label">
                                <label for="departamento">Departamento:</label>
                                <input id="departamento" type="text" value="<?php echo $dato->departamento; ?>" class="form-control" name="departamento" required>
                            </div>
                            <div class="form-group label">
                                <label for="ciudad">Ciudad:</label>
                                <input id="ciudad" type="text" value="<?php echo $dato->ciudad; ?>" class="form-control" name="ciudad" required>
                            </div>
                            <div class="form-group label">
                                <label for="servicio">Servicio:</label>
                                <input id="servicio" type="text" value="<?php echo $dato->agrupador; ?>" class="form-control" name="servicio" required>
                            </div>
                            <div class="form-group label">
                                <label for="especialidad">Especialidad:</label>
                                <input id="especialidad" type="text" value="<?php echo $dato->especialidad; ?>" class="form-control" name="especialidad" required>
                            </div>
                            <div class="form-group label">
                                <label for="direcciones">Direcciones:</label>
                                <input id="direcciones" type="text" value="<?php echo $dato->direccion; ?>" class="form-control" name="direcciones" required>
                            </div>
                            <div class="form-group label">
                                <label for="telefono">Teléfono o celular</label>
                                <input id="telefono" type="text" value="<?php echo $dato->telefono; ?>" class="form-control" name="telefono" required>
                            </div>
                            <div class="form-group label">
                                <label for="aliado">Médico de confianza</label>
                                <input id="aliado" type="text" value="<?php echo $dato->aliado; ?>" class="form-control" name="aliado" required>
                            </div>
                            <div class="form-group label" style="display: none">                                
                                <input id="gid" type="text" value="<?php echo $dato->id; ?>" class="form-control" name="gid" >
                            </div>
                            
                            <div class="labelSpace"></div>
                            <div class="labelSpace"></div>
                            <div class="row">
                                <div class="labelSpace"></div>
                                <div class="col-md-12 col-md-offset-4" style="padding-top: 20px;">
                                    <button type="submit" class="btn btn-bol" value="submit">
                                        GUARDAR
                                    </button>                                               
                                </div>
                                <div class="col-md-12 col-md-offset-4" style="padding-top: 10px;">                                        
                                    <a class="link-nr" href="#" data-dismiss="modal">Cancelar</a>                  
                                </div>
                            </div>                                        
                        {{ Form::close() }}                                            
                    </div>
                    
                    </div>
                </div>

                <?php endforeach; ?>

                <div class="modal fade" id="myModalUpdateRecord" role="dialog">
                        <div class="modal-dialog">                        
                        <!-- Modal content-->
                        <div class="modal-content">   
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>                        
                            </div>     
                            {{ Form::open(array('url' => 'insert', 'method' => 'post','class' =>'editForm')) }}                                            
                                <div class="form-group label">
                                    <label for="tipoid">Tipo de identificación:</label>
                                    <input id="tipoid" type="text" value="" class="form-control" name="tipoid" required >
                                </div>
                                <div class="form-group label">
                                    <label for="identificacion"># de identificación</label>
                                    <input id="identificacion" type="text" value="" class="form-control" name="identificacion" required>
                                </div>
                                <div class="form-group label">
                                    <label for="nombre">Nombres:</label>
                                    <input id="nombre" type="text" value="" class="form-control" name="nombre" required>
                                </div>
                                <div class="form-group label">
                                    <label for="departamento">Departamento:</label>
                                    <input id="departamento" type="text" value="" class="form-control" name="departamento" required>
                                </div>
                                <div class="form-group label">
                                    <label for="ciudad">Ciudad:</label>
                                    <input id="ciudad" type="text" value="" class="form-control" name="ciudad" required>
                                </div>
                                <div class="form-group label">
                                    <label for="servicio">Servicio:</label>
                                    <input id="servicio" type="text" value="" class="form-control" name="servicio" required>
                                </div>
                                <div class="form-group label">
                                    <label for="especialidad">Especialidad:</label>
                                    <input id="especialidad" type="text" value="" class="form-control" name="especialidad" required>
                                </div>
                                <div class="form-group label">
                                    <label for="direcciones">Direcciones:</label>
                                    <input id="direcciones" type="text" value="" class="form-control" name="direcciones" required>
                                </div>
                                <div class="form-group label">
                                    <label for="telefono">Teléfono o celular</label>
                                    <input id="telefono" type="text" value="" class="form-control" name="telefono" required>
                                </div>
                                <div class="form-group label">
                                    <label for="aliado">Médico de confianza</label>
                                    <input id="aliado" type="text" value="" class="form-control" name="aliado" required>
                                </div>
                                <div class="form-group label" style="display: none">                                
                                    <input id="gid" type="text" value="" class="form-control" name="gid" >
                                </div>
                                
                                <div class="labelSpace"></div>
                                <div class="labelSpace"></div>
                                <div class="row">
                                    <div class="labelSpace"></div>
                                    <div class="col-md-12 col-md-offset-4" style="padding-top: 20px;">
                                        <button type="submit" class="btn btn-bol" value="submit">
                                            GUARDAR
                                        </button>                                               
                                    </div>
                                    <div class="col-md-12 col-md-offset-4" style="padding-top: 10px;">                                        
                                        <a class="link-nr" href="#" data-dismiss="modal">Cancelar</a>                  
                                    </div>
                                </div>                                        
                            {{ Form::close() }}                                            
                        </div>
                        
                        </div>
                    </div>
                
            </div>


            <div class="row">
                <div class="col-md-2 col-md-offset-10">
                    <img src="/images/velez-caicedo.svg" style="max-width: 150px;">
                </div>
            </div>
        </div>
    </div>
    
    <footer>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
@endsection
