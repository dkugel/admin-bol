@extends('layouts.layout')

@section('content')
      
    <div class="welcome">   
            <nav class="nav-container showNav">
                <ul class="nav-list">
                    <li class="list-item"><a href="/" class="home-link">Home</a></li>
                    <li class="list-item"><a href="descargar" class="down-link">Download</a></li>
                    <li class="list-item"><a href="/" class="up-link">Home</a></li>                    
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
                            <th></th>
                                <?php foreach ($data as $dato): ?>
                                <tr>
                                    <td class="centered"><?php echo $dato->tipo_id; ?></td>
                                    <td><?php echo $dato->num_id; ?></td>
                                    <td><?php echo $dato->nombres; ?></td>
                                    <td><?php echo $dato->departamento; ?></td>
                                    <td><?php echo $dato->ciudad; ?></td>
                                    <td><?php echo $dato->agrupador; ?></td>
                                    <td><?php echo $dato->especialidad; ?></td>
                                    <td></td>
                                </tr>
                                <?php endforeach; ?>
                        </table>
                    </div>
                    <?php echo $data->links(); ?>                
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
	
@endsection
