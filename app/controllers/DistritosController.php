<?php

class DistritosController extends \BaseController {

	/**
	 * Display a listing of distritos
	 *
	 * @return Response
	 */
	public function index()
	{
		$distritos = Distrito::all();

		return View::make('distritos.index', compact('distritos'));
	}

	/**
	 * Show the form for creating a new distrito
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('distritos.create');
	}

	/**
	 * Store a newly created distrito in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Distrito::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Distrito::create($data);

		return Redirect::route('distritos.index');
	}

	/**
	 * Display the specified distrito.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$distrito = Distrito::findOrFail($id);

		return View::make('distritos.show', compact('distrito'));
	}

	/**
	 * Show the form for editing the specified distrito.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$distrito = Distrito::find($id);

		return View::make('distritos.edit', compact('distrito'));
	}

	/**
	 * Update the specified distrito in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$distrito = Distrito::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Distrito::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$distrito->update($data);

		return Redirect::route('distritos.index');
	}

	/**
	 * Remove the specified distrito from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Distrito::destroy($id);

		return Redirect::route('distritos.index');
	}

}
