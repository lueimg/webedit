<?php

class ArticulosController extends \BaseController {

	/**
	 * Display a listing of articulos
	 *
	 * @return Response
	 */
	public function index()
	{
		$articulos = Articulo::all();
		$imagenes = Imagen::where('tipoimagen_id','=','3')->get();
		$tipoarticulos = Tipoarticulo::all();

		return View::make('articulos.index', compact('articulos'))->with('imagenes',$imagenes)->with('tipoarticulos',$tipoarticulos);
	}

	/**
	 * Show the form for creating a new articulo
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('articulos.create');
	}

	/**
	 * Store a newly created articulo in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$articulo = new Articulo;
		$id = Articulo::Guid();

		$articulo->codArticulo = $id;

		$articulo->nombArticulo = Input::get('nombArticulo');
		$articulo->descripcion = Input::get('descripcion');
		$articulo->tipoarticulo_id = Input::get('tipoarticulo_id');
		$articulo->precio = Input::get('precio');
		$articulo->igv_id = 1;
		$articulo->save();

		$imgs = Input::get('imagenes');
		// return var_dump($imgs);
		$art = Articulo::find($id);
			for ($i=0; $i <count($imgs) ; $i++) { 
				$imagen = Imagen::find($imgs[$i]);
				$art->imagen()->save($imagen);
			}

		Session::put('mensaje',"El Artículo fue creado con éxito.");
		return Redirect::to('merchandising');
	}

	/**
	 * Display the specified articulo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
	}

	public function tienda()
	{
		$tipoarticulos = Tipoarticulo::all();

		return View::make('articulos.show', compact('tipoarticulos'));
	}
	public function	categoria($id){
		$productos = Articulo::where('tipoarticulo_id','=',$id)->get();
		$tipoarticulos = Tipoarticulo::all();
		$categoria = Tipoarticulo::find($id);
		return View::make('articulos.categoria', compact('categoria'))->with('productos',$productos)->with('tipoarticulos',$tipoarticulos);	
	}
	public function	producto($id){
		$tipoarticulos = Tipoarticulo::all();
		$producto = Articulo::findOrFail($id);
		return View::make('articulos.producto', compact('tipoarticulos'))->with('producto',$producto);	
	}
	/**
	 * Show the form for editing the specified articulo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$articulo = Articulo::find($id);
		$imagenes = Imagen::where('tipoimagen_id','=','3')->get();
		$tipoarticulos = Tipoarticulo::all();

		return View::make('articulos.edit', compact('articulo'))->with('tipoarticulos',$tipoarticulos)->with('imagenes',$imagenes);
	}

	/**
	 * Update the specified articulo in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$articulo = Articulo::findOrFail($id);

		$articulo->nombArticulo = Input::get('nombArticulo');
		$articulo->descripcion = Input::get('descripcion');
		$articulo->tipoarticulo_id = Input::get('tipoarticulo_id');
		$articulo->precio = Input::get('precio');
		$articulo->igv_id = 1;
		$articulo->save();

		$imgs = Input::get('imagenes');

		$art = Articulo::find($id);
		$art->imagen()->detach();
			for ($i=0; $i <count($imgs) ; $i++) { 
				$imagen = Imagen::find($imgs[$i]);
				$art->imagen()->save($imagen);
			}

		Session::put('mensaje',"El Artículo fue editado con éxito.");
		return Redirect::to('merchandising');
	}

	/**
	 * Remove the specified articulo from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($codArticulo)
	{
		Articulo::destroy($codArticulo);
		Session::put('mensaje',"El Artículo fue eliminado con éxito.");
		return Redirect::to('merchandising');
	}

}