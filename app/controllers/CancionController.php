<?php

class CancionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$items = Cancion::all();
		$albums = Album::all();

		if(isset($items)){
			return View::make('Admin.cancion')->with('items',$items)->with('albums',$albums);
		}else{
			$items = [];
			return View::make('Admin.cancion')->with('items',$items)->with('albums',$albums);
		}
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$cancion = new Cancion;
		$cancionId = Cancion::Guid();
		$cancion->codCancion = $cancionId;
		$cancion->nombCancion = Input::get('nombCancion');
		$cancion->fecha = date("Y-m-d", strtotime(Input::get('fecha')));
		$cancion->descripcion = Input::get('descripcion');
		$cancion->activo = Input::get('activo');
		$file = Input::file('file');
		$destinoPath = public_path().'/musica/';
		$url_imagen = $file->getClientOriginalName();
        $subir = $file->move($destinoPath,$file->getClientOriginalName());
        if($subir){
        	$cancion->cancion_archivo = "/TAP/tap/public/musica/".$url_imagen;
        }
		$cancion->save();


		Session::put('mensaje',"Canción fue creada con éxito.");
		return Redirect::to('cancion');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($codCancion)
	{
		$canciones = Cancion::find($codCancion);
		return View::make('Admin.cancionEdit',compact('canciones'));
	}

	public function activarCancion()
	{
		try {
			$cancion = Cancion::find($_POST['id']);
			$cancion->activo = $_POST['activo'];
			$cancion->save();
		} catch (Exception $e) {
			return 0;
		}
		return 1;
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$cancion = Cancion::find($id);
		$cancion->nombCancion = Input::get('nombCancion');
		$cancion->fecha =Input::get('fecha');
		$cancion->descripcion = Input::get('descripcion');
		$cancion->activo = Input::get('activo');
		if (Input::file('file')!=null) {
			$file = Input::file('file');
			$destinoPath = public_path().'/musica/';
			$url_imagen = $file->getClientOriginalName();
	        $subir = $file->move($destinoPath,$file->getClientOriginalName());
	        if($subir){
	        	$cancion->cancion_archivo = "/TAP/tap/public/musica/".$url_imagen;
	        }
		}
		$cancion->save();


		Session::put('mensaje',"Canción fue editada con éxito.");
		return Redirect::to('cancion');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($codCancion)
	{
		try{
			$cancion = Cancion::find($codCancion);
			$cancion->delete();
		}
		catch(Exception $e){
			Session::put('mensaje', 'NO PUDO SER BORRADO DEBIDO A QUE ESTA CANCIÓN FIGURA EN UN CONTRATO');	
			return Redirect::to('cancion');
		}

		Session::put('mensaje', 'Se eliminó correctamente el Canción!');
		return Redirect::to('cancion');
	}


}
