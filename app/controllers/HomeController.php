<?php

use Illuminate\Support\Facades\DB;

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	
	public function getData()
	{
		//$data = DB::table('directorio_general')->get();
		//$data = Modules::get();
		//return View::make('hello',['directorio_general'=>$data->nombres]);
		//var_dump($data);
		
		
		//foreach ($data as $datos)
		//{
		//	$data = var_dump($datos);
		//}
		//return View::make('hello')->with(array('data'=>$data));
		//

		$data = DB::table('directorio_general')->paginate(15);
		return View::make('hello')->with('data',$data);
	}
	public function Excel()
	{
		$datos = Modules::select()->get();
		Excel::create('Directorio', function($excel) use($datos) {
			$excel->sheet('Directorio General', function($sheet) use($datos) 
			{
				$sheet->fromArray($datos);
			});
		})->export('xls');
	}
	
	public function UpdateRecord()
	{
		$updaterecord = array(
			'id'			 => Input::get('gid'),
            'tipoid'         => Input::get('tipoid'),
			'identificacion' => Input::get('identificacion'),
			'nombre'         => Input::get('nombre'),
			'departamento'   => Input::get('departamento'),
			'ciudad'         => Input::get('ciudad'),
			'servicio'       => Input::get('servicio'),
			'especialidad'   => Input::get('especialidad'),
			'direccion'      => Input::get('direcciones'),
			'telefono'       => Input::get('telefono'),
			'aliado'         => Input::get('aliado')
		); 	
		//$updaterecord = Input::get('aliado');

		DB::table('directorio_general')
            ->where('id', $updaterecord['id'] )
			->update(array(			
			'tipo_id'		=>	$updaterecord['tipoid'],
			'num_id' 		=>	$updaterecord['identificacion'],
			'nombres'		=>	$updaterecord['nombre'],
			'ciudad'		=> 	$updaterecord['ciudad'],
			'departamento'	=>	$updaterecord['departamento'],
			'especialidad' 	=>	$updaterecord['especialidad'],
			'agrupador' 	=>	$updaterecord['servicio'],
			'direccion'		=> 	$updaterecord['direccion'],
			'telefono'		=>	$updaterecord['telefono'],
			'aliado'		=>	$updaterecord['aliado']					
		));
		$data = DB::table('directorio_general')->paginate(15);
		return View::make('hello')->with('data',$data);			
		//return var_dump($updaterecord);
		//return Input::all();
	}
	public function InsertRecord()
	{
		$insertrecord = array(
			'tipoid'         => Input::get('tipoid'),
			'identificacion' => Input::get('identificacion'),
			'nombre'         => Input::get('nombre'),
			'departamento'   => Input::get('departamento'),
			'ciudad'         => Input::get('ciudad'),
			'servicio'       => Input::get('servicio'),
			'especialidad'   => Input::get('especialidad'),
			'direccion'      => Input::get('direcciones'),
			'telefono'       => Input::get('telefono'),
			'aliado'         => Input::get('aliado')
		); 	
		//$updaterecord = Input::get('aliado');

		DB::table('directorio_general')->insert(array(
			'tipo_id'		=>	$insertrecord['tipoid'],
			'num_id' 		=>	$insertrecord['identificacion'],
			'nombres'		=>	$insertrecord['nombre'],
			'ciudad'		=> 	$insertrecord['ciudad'],
			'departamento'	=>	$insertrecord['departamento'],
			'especialidad' 	=>	$insertrecord['especialidad'],
			'agrupador' 	=>	$insertrecord['servicio'],
			'direccion'		=> 	$insertrecord['direccion'],
			'telefono'		=>	$insertrecord['telefono'],
			'aliado'		=>	$insertrecord['aliado']		
		));	
		$data = DB::table('directorio_general')->paginate(15);
		return View::make('hello')->with('data',$data);		
	}
	public function ShowRecord()
	{
		$data = DB::table('directorio_general')->paginate(15);
		return View::make('hello')->with('data',$data);	
	}
	public function DeleteRecord()
	{
		$deleteRecord = Input::get('gid');
		DB::table('directorio_general')->where('id', $deleteRecord)->delete();
		$data = DB::table('directorio_general')->paginate(15);
		return View::make('hello')->with('data',$data);	
		//return Input::all();	
	}
}
