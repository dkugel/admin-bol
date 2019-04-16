var txt_tipo;
var txt_numero;
var txt_nombre;
var txt_departamento;
var txt_ciudad;
var txt_agrupador;
var txt_especialidad;
var txt_direccion;
var txt_telefono;
var txt_aliado;
var query;

var total;
$(document).ready(function(){        
    //fetch_customer_data();    
    function fetch_customer_data(query)
    {
        $.ajax({
            url: 'action/'+query,
            method:'POST',  
            data:{query:query}, 
            dataType:'json',                 
            success:function(data)
            {                                                
                $('table').html("<table class='tabla-bol'> </table>");
                $(".tabla-bol").append("<thead>"+
                    +'<tr>'
                    +'<th id="tip_id" class="centered" style="padding: 10px;">Tipo de identificación</th>'
                    +'<th># de identificación</th>'
                    +'<th>Nombres</th>'
                    +'<th>Departamento</th>'
                    +'<th>Ciudad</th>'
                    +'<th>Servicio</th>'
                    +'<th>Especialidad</th>'
                    +'<th><a href="#" class="more-info">más</a></th>'
                    +'</tr>'
                    +'</thead>'
                );
                $('#total_records').text(data.total_data);
                //txt = JSON.parse(data.Tipo_identificacion);
                console.log(data);
                txt_tipo         = data.Tipo_identificacion.split(", ");
                txt_numero       = data.Numero_identificacion.split(", ");
                txt_nombre       = data.Nombre.split(", ");
                txt_departamento = data.Departamento.split(", ");
                txt_ciudad       = data.Ciudad.split(", ");
                txt_agrupador    = data.Agrupador.split(", ");
                txt_especialidad = data.Especialidad.split(", ");
                txt_direccion    = data.Direccion.split(", ");
                txt_telefono     = data.Telefono.split(", ");
                txt_aliado       = data.Aliado.split(", ");
                txt_id           = data.Id.split(", ");

                total = data.total_data;
                //txt= JSON.stringify(data.Agrupador);
                //console.log(txt);
                for (i = 0; i<data.total_data; i++){
                    //$("#live-box").append("<tr>");
                    $(".tabla-bol").append("<tr><td>"+txt_tipo[i]+"</td>"+"<td>"+txt_numero[i]+"</td>"+"<td>"+txt_nombre[i]+"</td>"+"<td>"+txt_departamento[i]+"</td>"+"<td>"+txt_ciudad[i]+"</td>"+"<td>"+txt_agrupador[i]+"</td>"+"<td>"+txt_especialidad[i]+"</td>"+'<td><a href="#" class="more-info" data-toggle="modal" data-target="#myModal'+txt_id[i]+'">más</a></td></tr>');                                       
                    $(".modal-jquery").append('<div class="modal fade" id="myModal'+txt_id[i]+'" role="dialog">'
                    +'<div class="modal-dialog">'                                        
                    +'<div class="modal-content">'
                    +    '<div class="modal-header">'
                    +    '<button type="button" class="close" data-dismiss="modal">&times;</button>'                       
                    +    '</div>'
                    +    '<div class="modal-body">'
                    +    '<p><span>Tipo de identificación: </span>'+txt_tipo[i]+'</p>'
                    +    '<p><span># de identificación: </span>'+txt_numero[i]+'</p>'
                    +    '<p><span>Nombres: </span>'+txt_nombre[i]+'</p>'
                    +    '<p><span>Departamento: </span>'+txt_departamento[i]+'</p>'
                    +    '<p><span>Ciudad: </span>'+txt_ciudad[i]+'</p>'
                    +    '<p><span>Servicio: </span>'+txt_agrupador[i]+'</p>'
                    +    '<p><span>Especialidad: </span>'+txt_especialidad[i]+'</p>'
                    +    '<p><span>Direcciones: </span>'+txt_direccion[i]+'</p>'
                    +    '<p><span>Teléfono o Celular: </span>'+txt_telefono[i]+'</p>'
                    +    '<p><span>Médico de confianza: </span>'+txt_aliado[i]+'</p>'                        
                    +    '</div>'
                    +    '<div class="modal-footer">'
                    +        '<button type="button" class="btn btn-edit" data-toggle="modal" data-target="#myModalUpdatesub'+txt_id[i]+'"  data-dismiss="modal">Editar</button>'
                    +        '<button type="button" class="btn btn-delete" data-toggle="modal" data-target="#myModalDeletesub'+txt_id[i]+'"  data-dismiss="modal">Eliminar</button>'                            
                    +   '</div>'
                    +'</div>'
                    
                    +'</div>'
                    +'</div>')

                    $(".modal-update").append('<div class="modal fade" id="myModalUpdatesub'+txt_id[i]+'" role="dialog">'
                    +'<div class="modal-dialog">'                                        
                    +'<div class="modal-content">'
                    +   '<div class="modal-header">'
                    +       '<button type="button" class="close" data-dismiss="modal">&times;</button>'
                    + '</div>' 
                    + '<form class=editForm method="POST" action="/" acceps-charset="UTF-8">'
                    + '<div class="form-group label">'
                    +    '<label for="tipoid">Tipo de identificación:</label>'
                    +       '<input id="tipoid" type="text" value="'+txt_tipo[i]+'" class="form-control" name="tipoid" required style="width: 80%;" >'
                    +  '</div>'
                    + '<div class="form-group label">'
                    +    '<label for="identificacion"># de identificación</label>'
                    +    '<input id="identificacion" type="text" value="'+txt_numero[i]+'" class="form-control" name="identificacion" required style="width: 80%;">'
                    +  '</div>'
                    + '<div class="form-group label">'
                    +    '<label for="nombre">Nombres:</label>'
                    +    '<input id="nombre" type="text" value="'+txt_nombre[i]+'" class="form-control" name="nombre" required style="width: 80%;">'
                    + '</div>'
                    + '<div class="form-group label">'
                    +   '<label for="departamento">Departamento:</label>'
                    +    '<input id="departamento" type="text" value="'+txt_departamento[i]+'" class="form-control" name="departamento" required style="width: 80%;">'
                    + '</div>'
                    + '<div class="form-group label">'
                    +    '<label for="ciudad">Ciudad:</label>'
                    +    '<input id="ciudad" type="text" value="'+txt_ciudad[i]+'" class="form-control" name="ciudad" required style="width: 80%;">'
                    + '</div>'
                    + '<div class="form-group label">'
                    +    '<label for="servicio">Servicio:</label>'
                    +    '<input id="servicio" type="text" value="'+txt_agrupador[i]+'" class="form-control" name="servicio" required style="width: 80%;">'
                    + '</div>'
                    + '<div class="form-group label">'
                    +    '<label for="especialidad">Especialidad:</label>'
                    +    '<input id="especialidad" type="text" value="'+txt_especialidad[i]+'" class="form-control" name="especialidad" required style="width: 80%;">'
                    + '</div>'
                    + '<div class="form-group label">'
                    +    '<label for="direcciones">Direcciones:</label>'
                    +    '<input id="direcciones" type="text" value="'+txt_direccion[i]+'" class="form-control" name="direcciones" required style="width: 80%;">'
                    + '</div>'
                    + '<div class="form-group label">'
                    +    '<label for="telefono">Teléfono o celular</label>'
                    +    '<input id="telefono" type="text" value="'+txt_telefono[i]+'" class="form-control" name="telefono" required style="width: 80%;">'
                    + '</div>'
                    + '<div class="form-group label">'
                    +    '<label for="aliado">Médico de confianza</label>'
                    +    '<input id="aliado" type="text" value="'+txt_aliado[i]+'" class="form-control" name="aliado" required style="width: 80%;">'
                    + '</div>'
                    + '<div class="form-group label" style="display: none">'
                    +    '<input id="gid" type="text" value="'+txt_id[i]+'" class="form-control" name="gid" >'
                    + '</div>'
                    + '<div class="labelSpace"></div>'
                    + '<div class="labelSpace"></div>'
                    + '<div class="row">'
                    +    '<div class="labelSpace"></div>'
                    +    '<div class="col-md-12 col-md-offset-4" style="padding-top: 20px;">'
                    +        '<button type="submit" class="btn btn-bol" value="submit">'
                    +            'GUARDAR'
                    +        '</button>                                               '
                    +    '</div>'
                    +    '<div class="col-md-12 col-md-offset-4" style="padding-top: 10px;">  '
                    +        '<a class="link-nr" href="#" data-dismiss="modal">Cancelar</a> '
                    +    '</div>'
                    + '</div>' 
                    + '</form>'                   
                    +'</div>'                    
                    +'</div>'
                    +'</div>')

                    $(".modal-delete").append('<div class="modal fade delete" id="myModalDeletesub'+txt_id[i]+'" role="dialog">'
                    +    '<div class="modal-dialog">'
                    +    '<div class="modal-content">'
                    + '<form method="POST" action="delete" acceps-charset="UTF-8">'
                    +       '<div class="advertencia">'
                    +            '<img src="images/warning.svg"><br>'
                    +            '¿Esta seguro que desea eliminar este dato de la base?'
                    +        '</div>                    '
                    +        '<div class="modal-footer">'
                    +                '<input id="gid" type="text" value="<?php echo $dato->id; ?>" class="form-control" name="gid" style="display: none"> '
                    +                '<button type="submit" class="btn btn-bol" >Si, eliminar</a>'
                    +                '<button type="button" class="btn btn-bol" data-dismiss="modal" >No eliminar</button>'
                    +        '</div>'
                    +'</form>'
                    +    '</div>'                    
                    +    '</div>'
                    + '</div>'                                                                                                                                            
                    )
                }
                
            }
        })
    }

    $(document).on('keyup', '#search', function(){
        query = $(this).val();
        if((query !='') & (query.length > 5)){
            fetch_customer_data(query);
        }            
        if(query == '')
            window.location.replace("/");
    });
});