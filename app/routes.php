<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



Route::get('/','HomeController@Inicio');

//LOGIN
Route::get('administrador', 'LoginController@loginAdmin');
Route::post('administrador', 'LoginController@user');
Route::get('exist', 'LoginController@exist');

//FANS                                             
Route::post('loginfan', 'LoginController@userFan');
Route::post('registrar', function()
{
	$user = new User;
	$cod = User::Guid();
	$user->id= $cod;
	$user->username = Input::get('username');
	$user->password = Hash::make(Input::get('password'));
	$user->email = Input::get("username");
	$user->codPerfil = 2;
	$user->codTipoDoc = 1;
	//GUARDAMOS
	$user->save();
	Session::put('usuario',Input::get('username'));
	Session::put('codUsuario',$cod);
	return Redirect::to('/');
});
Route::get('cerrarsesion', function(){
	Session::forget('usuario');
	Session::forget('codUsuario');
	return Redirect::to('/');
});
Route::get('perfil/{id}', function($id){
	if (Session::get('usuario') == $id ){
		$user = User::where('username','=',$id)->get();
		// return var_dump($user);
		return View::make('users.editFan',compact('user'));
	}else{
		return View::make('home.404');
	}
});
Route::post('perfil/editar', function(){
	$user = User::find(Session::get('codUsuario'));
	$imagen = new Imagen;
	$user->username = Input::get('username');
	$user->password = Input::get('password');
	$user->nombre = Input::get('nombre');
	$user->apellidoP = Input::get('apellidoP');
	$user->apellidoM = Input::get('apellidoM');
	$user->sexo = Input::get('sexo');
	$user->fechaNacimiento = Input::get('fechaNacimiento');
	$user->email = Input::get('email');
	$user->telefono = Input::get('telefono');
	$user->direccion = Input::get('direccion');
	$user->docIdentidad = Input::get('docIdentidad');

	$file = Input::file('file');
	if ($file != null) {
	$destinationPath = 'uploads';
	// If the uploads fail due to file system, you can try doing public_path().'/uploads' 
	$filename = str_random(15);
	// $filename = $filename.$file->getClientOriginalName();
	$filename =$filename.'.'.$file->getClientOriginalExtension(); 
	$upload_success = Input::file('file')->move($destinationPath, $filename);

		if( $upload_success ) {
			$cod = Imagen::Guid();
			$user->imagen_id = $cod;
			$imagen->codImagen = $cod;
	    	$imagen->imagen_archivo = $filename;
	    	$imagen->tipoimagen_id = 5;
	    	$imagen->save();
		} 
	}
	$user->save();

	return Redirect::back();
});



// USUARIO
Route::resource('usuario', 'UsersController');

// IMAGEN
Route::resource('imagen', 'ImagenController');
Route::post('imagen/subir', 'ImagenController@subir');
Route::post('imagen/subirfan', 'ImagenController@subirfan');
// Route::get('imagen', 'ImagenController@index');

// VIDEO
Route::resource('video', 'VideoController');
Route::get('videos', 'VideoController@videos');

// VIDEO
Route::get('bibliografia', function(){
	return View::make('bibliografia.bibliografia');
});

// EVENTO
Route::controller('eventoajax', 'EventoController');
Route::resource('evento', 'EventoController');
Route::post('activarevento','EventoController@activarEvento');

// CONTRATO
Route::resource('contrato', 'ContratoController');


// NOTICIA
Route::resource('noticia', 'NoticiaController');
Route::get('noticias/{id}', 'NoticiaController@getNoticia');

// CANCION
Route::resource('cancion', 'CancionController');
Route::post('activarcancion','CancionController@activarCancion');


//CALENDARIO
Route::get('agenda',function(){
	$eventos = Evento::all();
	$tipoevento = TipoEvento::all();
	$items2 = Establecimiento::all();
	return View::make('Admin.calendario')->with('eventos',$eventos)->with('items2',$items2)->with('tipoevento',$tipoevento);
});
Route::get('getEvento', 'EventoController@getEvento');

//MERCHANDISING
Route::resource('merchandising','ArticulosController');

Route::get('tienda','ArticulosController@tienda');
Route::get('tienda/categoria/{id}','ArticulosController@categoria');
Route::get('tienda/{id}','ArticulosController@producto');


//CLIENTES
Route::resource('cliente', 'ClientesController');

//ESTABLECIMIENTO
Route::resource('establecimiento', 'EstablecimientosController');

//ESTABLECIMIENTO
Route::resource('galeria', 'GaleriasController');
Route::get('galerias','GaleriasController@galeria');
Route::get('galerias/fecha/{fecha}','GaleriasController@fecha');
Route::get('galerias/{c}','GaleriasController@gal');


//FORO
Route::get('foro','TemasController@temas');
Route::get('foro/tema','TemasController@formtema');
Route::get('foro/{id}','TemasController@show');
Route::post('temanuevo','TemasController@temanuevo');
Route::post('reply','TemasController@reply');

//MAILING
Route::resource('mailing','MailsController');
