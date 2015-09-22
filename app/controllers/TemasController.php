<?php

class TemasController extends \BaseController {

	/**
	 * Display a listing of temas
	 *
	 * @return Response
	 */
	public function index()
	{
		$temas = Tema::all();

		return View::make('temas.index', compact('temas'));
	}
	public function temas()
	{
		$temas = Tema::all();

		return View::make('temas.index', compact('temas'));
	}
	public function reply()
	{
		$tema = new Tema;
		$tema->codTema = Tema::Guid();
		$tema->descripcion = Input::get('descripcion');
		$tema->tema_id = Input::get('codTema');
		$tema->user_id = Session::get('codUsuario');
		$tema->save();
		return Redirect::back();
	}
	public function formtema(){
		return View::make('temas.create');
	}
	public function temanuevo()
	{
		$tema = new Tema;
		$tema->codTema = Tema::Guid();
		$tema->titulo = Input::get('titulo');
		$tema->descripcion = Input::get('descripcion');
		$tema->user_id = Session::get('codUsuario');
		$tema->save();
		return Redirect::to('foro');
	}

	/**
	 * Show the form for creating a new tema
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('temas.create');
	}

	/**
	 * Store a newly created tema in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Tema::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Tema::create($data);

		return Redirect::route('temas.index');
	}

	/**
	 * Display the specified tema.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tema = Tema::findOrFail($id);

		return View::make('temas.show', compact('tema'));
	}

	/**
	 * Show the form for editing the specified tema.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tema = Tema::find($id);

		return View::make('temas.edit', compact('tema'));
	}

	/**
	 * Update the specified tema in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$tema = Tema::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Tema::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$tema->update($data);

		return Redirect::route('temas.index');
	}

	/**
	 * Remove the specified tema from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Tema::destroy($id);

		return Redirect::route('temas.index');
	}

}
