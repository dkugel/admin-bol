<?php


use Illuminate\Support\Facades\DB;

 class LiveSearchController extends BaseController
 { 
        function index()
        { 
            return Redirect::to('/');
        } 

        public function action($request) 
        { 
            
            $output = ''; 
            $tipoiden = '';
            $numiden ='';
            $nombres ='';
            $ciudad ='';
            $departamento ='';
            $especialidad ='';
            $agrupador ='';
            $direccion ='';
            $telefono ='';
            $aliado ='';
            $id ='';

            $query = $request; 
            if($query != '') 
                { 
                    $data = DB::table('directorio_general') ->where('tipo_id', 'like', '%'.$query.'%')
                                                            ->orWhere('num_id', 'like', '%'.$query.'%')
                                                            ->orWhere('nombres', 'like', '%'.$query.'%')
                                                            ->orWhere('ciudad', 'like', '%'.$query.'%')
                                                            ->orWhere('departamento', 'like', '%'.$query.'%')
                                                            ->orWhere('especialidad', 'like', '%'.$query.'%')
                                                            ->orWhere('agrupador', 'like', '%'.$query.'%')
                                                            ->orWhere('direccion', 'like', '%'.$query.'%')
                                                            ->orWhere('telefono', 'like', '%'.$query.'%')
                                                            ->orWhere('aliado', 'like', '%'.$query.'%')
                                                            ->orderBy('id', 'desc')->get(); 
                    $datacount = DB::table('directorio_general') ->where('tipo_id', 'like', '%'.$query.'%')
                                                            ->orWhere('num_id', 'like', '%'.$query.'%')
                                                            ->orWhere('nombres', 'like', '%'.$query.'%')
                                                            ->orWhere('ciudad', 'like', '%'.$query.'%')
                                                            ->orWhere('departamento', 'like', '%'.$query.'%')
                                                            ->orWhere('especialidad', 'like', '%'.$query.'%')
                                                            ->orWhere('agrupador', 'like', '%'.$query.'%')
                                                            ->orWhere('direccion', 'like', '%'.$query.'%')
                                                            ->orWhere('telefono', 'like', '%'.$query.'%')
                                                            ->orWhere('aliado', 'like', '%'.$query.'%')
                                                            ->orderBy('id', 'desc');
                    $total_row = $datacount->count();
                }else{ 
                    $data = DB::table('directorio_general')->paginate(15);
		            return View::make('hello')->with('data',$data);
                } 
                        
                        //if($total_row > 0) 
                        //{ 
                foreach($data as $row) 
                {                 
                    $tipoiden       .= $row->tipo_id .", ";
                    $numiden        .= $row->num_id .", "; 
                    $nombres        .= $row->nombres .", ";
                    $ciudad         .= $row->ciudad .", ";
                    $departamento   .= $row->departamento. ", ";
                    $especialidad   .= $row->especialidad. ", ";
                    $agrupador      .= $row->agrupador .", ";
                    $direccion      .= $row->direccion .", ";
                    $telefono       .= $row->telefono. ", ";
                    $aliado         .= $row->aliado.", ";
                    $id             .= $row->id.", ";     
                    //$output .= ' '.$row->tipo_id.' '.$row->num_id.' '.$row->nombres.' '.$row->ciudad.' '.$row->departamento.' ';                                           
                } 
                    //            } 
                        //  else 
                        //    { 
                            //      $output = 'No hay datos';
                            //     } 
                 $data = array( 
                    'Tipo_identificacion'   => $tipoiden,
                    'Numero_identificacion' => $numiden,
                    'Nombre'                => $nombres,
                    'Ciudad'                => $ciudad,
                    'Departamento'          => $departamento,
                    'Especialidad'          => $especialidad,
                    'Agrupador'             => $agrupador,
                    'Direccion'             => $direccion,
                    'Telefono'              => $telefono,
                    'Aliado'                => $aliado,
                    'Id'                    => $id,
                    'total_data' => $total_row );  
                //$data = array( 'table_data' => $output, 'total_data' => $total_row ); 
                echo json_encode($data); 
                                    
        } 
} 
