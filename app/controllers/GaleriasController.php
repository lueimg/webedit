<?php

class GaleriasController extends \BaseController {

	/**
	 * Display a listing of galerias
	 *
	 * @return Response
	 */
	public function index()
	{
		$galerias = Galeria::all();
		$imagenes = Imagen::all();			
		return View::make('galerias.index', compact('galerias'))->with('imagenes',$imagenes);
	}
	public function galeria()
	{
		$galerias = Galeria::all();
		return View::make('galerias.galeria', compact('galerias'));
	}
	public function fecha($fecha)
	{
		$galerias = Galeria::all();
		$gale = Galeria::where('fecha','like',$fecha.'%')->get();
		return View::make('galerias.galeria', compact('galerias'))->with('gale',$gale);
	}
	public function gal($c)
	{
		$galeria = Galeria::find($c);
		$galerias = Galeria::all();
		return View::make('galerias.show', compact('galeria'))->with('galerias',$galerias);
	}
	/**
	 * Show the form for creating a new galeria
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('galerias.create');
	}

	/**
	 * Store a newly created galeria in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$galeria = new Galeria;
		$id = Galeria::Guid();

		$galeria->codGaleria = $id;

		$galeria->nombGaleria = Input::get('nombGaleria');
		$galeria->descripcion = Input::get('descripcion');
		$galeria->fecha = date("Y-m-d", strtotime(Input::get('fecha')));
		$galeria->save();

		$imgs = Input::get('imagenes');
		// return var_dump($imgs);
		$art = Galeria::find($id);
			for ($i=0; $i <count($imgs) ; $i++) { 
				$imagen = Imagen::find($imgs[$i]);
				$art->imagen()->save($imagen);
			}

		Session::put('mensaje',"La galería fue creada con éxito.");
		return Redirect::to('galeria');
	}

	/**
	 * Display the specified galeria.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$galeria = Galeria::findOrFail($id);

		return View::make('galerias.show', compact('galeria'));
	}

	/**
	 * Show the form for editing the specified galeria.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$galeria = Galeria::find($id);

		return View::make('galerias.edit', compact('galeria'));
	}

	/**
	 * Update the specified galeria in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$galeria = Galeria::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Galeria::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$galeria->update($data);

		return Redirect::route('galerias.index');
	}

	/**
	 * Remove the specified galeria from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Galeria::destroy($id);
		Session::put('mensaje',"La Galería fue eliminada con éxito.");
		return Redirect::to('galeria');
	}

}
