<?php

class ImagenController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$imagenes = Imagen::all();
		$tipoimagen = Tipoimagen::all();
		return View::make('imagen.index',compact('imagenes'))->with('tipoimagen',$tipoimagen);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function subir()
	{
		$imagen = new Imagen;
		$file = Input::file('file');
		$tipoimagen = Input::get('tipoimagen');
		$destinationPath = 'uploads';
		// If the uploads fail due to file system, you can try doing public_path().'/uploads' 
		$filename = str_random(15);
		// $filename = $filename.$file->getClientOriginalName();
		$filename =$filename.'.'.$file->getClientOriginalExtension(); 
		$upload_success = Input::file('file')->move($destinationPath, $filename);

		if( $upload_success ) {

			$imagen->codImagen = Imagen::Guid();
        	$imagen->imagen_archivo = $filename;
        	$imagen->tipoimagen_id = $tipoimagen;
        	//"/TAP/tap/public/uploads/".
        	$imagen->save();


		   return Response::json('success', 200);
		} else {
		   return Response::json('error', 400);
		}

	}

	public function subirfan()
	{
		$imagen = new Imagen;
		$file = Input::file('file');
		$galeria = Galeria::find(Input::get('codGaleria'));
		$destinationPath = 'uploads';
		// If the uploads fail due to file system, you can try doing public_path().'/uploads' 
		$filename = str_random(15);
		// $filename = $filename.$file->getClientOriginalName();
		$filename =$filename.'.'.$file->getClientOriginalExtension(); 
		$upload_success = Input::file('file')->move($destinationPath, $filename);

		if( $upload_success ) {
			$codigo = Imagen::Guid();
			$imagen->codImagen = $codigo;
        	$imagen->imagen_archivo = $filename;
        	$imagen->tipoimagen_id = 6;
        	//"/TAP/tap/public/uploads/".
        	$imagen->save();
        	$imagen = Imagen::find($codigo);
        	$galeria->imagen()->save($imagen);
		    return Response::json('success', 200);
		} else {
		   return Response::json('error', 400);
		}

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($codImagen)
	{
		$imagen = Imagen::find($codImagen);
		
		File::delete(public_path().'/uploads/'.$imagen->imagen_archivo);
		//

		$imagen->delete();

		// redirect
		Session::put('mensaje', 'Se eliminó correctamente la Imagen!');
		return Redirect::to('imagen');
	}


}
