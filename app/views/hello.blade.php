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
                            <button type="button" class="btn btn-bol" data-toggle="modal" data-target="#myModalDelete<?php echo $dato->id; ?>" data-id="{{ $dato->id }}" data-dismiss="modal">Eliminar</button>
                            <button type="button" class="btn btn-bol" data-toggle="modal" data-target="#myModalDelete<?php echo $dato->id; ?>" data-id="{{ $dato->id }}" >Editar</button>
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
