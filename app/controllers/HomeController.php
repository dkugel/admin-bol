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

	public function showWelcome()
	{
		return View::make('hello');
	}
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
}
