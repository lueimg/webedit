<?php

class EstablecimientosController extends \BaseController {

	/**
	 * Display a listing of establecimientos
	 *
	 * @return Response
	 */
	public function index()
	{
		$establecimientos = Establecimiento::all();
		$distritos = Distrito::all();

		return View::make('establecimientos.index', compact('establecimientos'))->with('distritos',$distritos);
	}

	/**
	 * Show the form for creating a new establecimiento
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('establecimientos.create');
	}

	/**
	 * Store a newly created establecimiento in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$esta = new Establecimiento;
		$esta->codEstablecimiento = Establecimiento::guid();
		$esta->nombEstablecimiento = Input::get('nombEstablecimiento');
		$esta->descripcion = Input::get('descripcion');
		$esta->capacidadAsistencia = Input::get('capacidadAsistencia');
		$esta->direccion = Input::get('direccion');
		$esta->codDistrito = Input::get('codDistrito');
		$esta->latitud = Input::get('latitud');
		$esta->longitud = Input::get('longitud');
		$esta->save();
		Session::put('mensaje',"Establecimiento fue creada con éxito");
		return Redirect::to('establecimiento');
	}

	/**
	 * Display the specified establecimiento.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$establecimiento = Establecimiento::findOrFail($id);

		return View::make('establecimientos.show', compact('establecimiento'));
	}

	/**
	 * Show the form for editing the specified establecimiento.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$establecimiento = Establecimiento::find($id);
		$distritos = Distrito::all();
		return View::make('establecimientos.edit', compact('establecimiento'))->with('distritos',$distritos);
	}

	/**
	 * Update the specified establecimiento in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$esta = Establecimiento::findOrFail($id);
		$esta->nombEstablecimiento = Input::get('nombEstablecimiento');
		$esta->descripcion = Input::get('descripcion');
		$esta->capacidadAsistencia = Input::get('capacidadAsistencia');
		$esta->direccion = Input::get('direccion');
		$esta->codDistrito = Input::get('codDistrito');
		$esta->latitud = Input::get('latitud');
		$esta->longitud = Input::get('longitud');
		$esta->save();
		Session::put('mensaje',"Establecimiento fue editado con éxito");
		return Redirect::to('establecimiento');
	}

	/**
	 * Remove the specified establecimiento from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try{
			Establecimiento::destroy($id);
		}
		catch(Exception $e){
			Session::put('mensaje', 'NO PUDO SER BORRADO DEBIDO A QUE ESTE ESTABLECIMIENTO FIGURA EN UN EVENTO');	
			return Redirect::to('establecimiento');
		}
		Session::put('mensaje',"Establecimiento fue eliminado con éxito");
		return Redirect::to('establecimiento');


	}

}
