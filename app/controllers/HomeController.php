<?php

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

	public function Inicio()
	{	
		$noticias = Noticia::take(4)->orderBy('created_at','DESC')->get();
		$eventos = Evento::take(4)->orderBy('created_at','DESC')->get();
		$establecimientos = Establecimiento::all();
		$imagenes = Imagen::where('tipoimagen_id','=','4')->take(4)->orderBy('created_at','DESC')->get();
		$video = Video::take(1)->orderBy('fechaRegistro','DESC')->get();
		$canciones = Cancion::all();
		return View::make('home.index')->with('noticias',$noticias)->with('eventos',$eventos)->with('establecimientos',$establecimientos)->with('imagenes',$imagenes)->with('video',$video)->with('canciones',$canciones);
	}

}
