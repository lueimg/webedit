<?php

class NoticiaController extends \BaseController {

	public function getNoticia($id){
		$noticia = Noticia::find($id);
		$noticias = Noticia::all();
		$video = Video::take(1)->orderBy('fechaRegistro','DESC')->get();
		return View::make('noticia.index',compact('noticia'))->with('noticias',$noticias)->with('video',$video);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$items = Noticia::all();
		$itemss = Imagen::where('tipoimagen_id','=',2)->get();

		if(isset($items)){
			return View::make('Admin.noticia')->with('items',$items)->with('imagenes',$itemss);
		}else{
			$items = [];
			return View::make('Admin.noticia')->with('items',$items)->with('imagenes',$itemss);
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
		$noticia = new Noticia;
		$imagen = new Imagen;

        $currentNoticia = Noticia::Guid();
		$noticia->codNoticia = $currentNoticia;
		$noticia->titulo = Input::get('titulo');
		$noticia->breveDescripcion = Input::get('breveDescripcion');
		$noticia->descripcion = Input::get('descripcion');
		$noticia->fecha = date("Y-m-d", strtotime(Input::get('fecha')));
		$noticia->save();

		$imgs = Input::get('imagenes');
		// return var_dump($imgs);
		$art = Noticia::find($currentNoticia);

			for ($i=0; $i <count($imgs) ; $i++) { 
				$imagen = Imagen::find($imgs[$i]);
				$art->imagen()->save($imagen);
			}
        
        
		Session::put('mensaje',"Noticia fue creada con éxito");
		return Redirect::to('noticia');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($codNoticia)
	{
		$noticias = Noticia::find($codNoticia);
		
		return View::make('Admin.noticiaDetalle',compact('noticias'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($codNoticia)
	{
		$noticias = Noticia::find($codNoticia);
		$itemss = $noticias->Imagen;
		return View::make('Admin.noticiaEdit',compact('noticias'))->with('imagen',$itemss);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($codNoticia)
	{
		$noticia = Noticia::find($codNoticia);
		$imagen = $noticia->Imagen;

		$currentNoticia = $noticia->codNoticia;

		$noticia->titulo = Input::get('titulo');
		$noticia->breveDescripcion = Input::get('breveDescripcion');
		$noticia->descripcion = Input::get('descripcion');
		$noticia->fecha =  date("Y-m-d", strtotime(Input::get('fecha')));
		$noticia->save();

		$imgs = Input::get('imagenes');
		// return var_dump($imgs);
		$art = Noticia::find($currentNoticia);

			for ($i=0; $i <count($imgs) ; $i++) { 
				$imagen = Imagen::find($imgs[$i]);
				$art->imagen()->save($imagen);
			}
        
        
		Session::put('mensaje',"Noticia fue creada con éxito");
		return Redirect::to('noticia');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($codNoticia)
	{
		$noticia = Noticia::find($codNoticia);
		$noticia->delete();

		// redirect
		Session::put('mensaje', 'Se eliminó correctamente la Noticia!');
		return Redirect::to('noticia');
	}


}
