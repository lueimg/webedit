<?php

class TipoEventosController extends \BaseController {

	/**
	 * Display a listing of tipoeventos
	 *
	 * @return Response
	 */
	public function index()
	{
		$tipoeventos = Tipoevento::all();

		return View::make('tipoeventos.index', compact('tipoeventos'));
	}

	/**
	 * Show the form for creating a new tipoevento
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('tipoeventos.create');
	}

	/**
	 * Store a newly created tipoevento in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Tipoevento::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Tipoevento::create($data);

		return Redirect::route('tipoeventos.index');
	}

	/**
	 * Display the specified tipoevento.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tipoevento = Tipoevento::findOrFail($id);

		return View::make('tipoeventos.show', compact('tipoevento'));
	}

	/**
	 * Show the form for editing the specified tipoevento.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tipoevento = Tipoevento::find($id);

		return View::make('tipoeventos.edit', compact('tipoevento'));
	}

	/**
	 * Update the specified tipoevento in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$tipoevento = Tipoevento::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Tipoevento::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$tipoevento->update($data);

		return Redirect::route('tipoeventos.index');
	}

	/**
	 * Remove the specified tipoevento from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Tipoevento::destroy($id);

		return Redirect::route('tipoeventos.index');
	}

}
