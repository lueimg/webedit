<?php

class ContratoxsinglesController extends \BaseController {

	/**
	 * Display a listing of contratoxsingles
	 *
	 * @return Response
	 */
	public function index()
	{
		$contratoxsingles = Contratoxsingle::all();

		return View::make('contratoxsingles.index', compact('contratoxsingles'));
	}

	/**
	 * Show the form for creating a new contratoxsingle
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('contratoxsingles.create');
	}

	/**
	 * Store a newly created contratoxsingle in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Contratoxsingle::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Contratoxsingle::create($data);

		return Redirect::route('contratoxsingles.index');
	}

	/**
	 * Display the specified contratoxsingle.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$contratoxsingle = Contratoxsingle::findOrFail($id);

		return View::make('contratoxsingles.show', compact('contratoxsingle'));
	}

	/**
	 * Show the form for editing the specified contratoxsingle.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$contratoxsingle = Contratoxsingle::find($id);

		return View::make('contratoxsingles.edit', compact('contratoxsingle'));
	}

	/**
	 * Update the specified contratoxsingle in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$contratoxsingle = Contratoxsingle::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Contratoxsingle::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$contratoxsingle->update($data);

		return Redirect::route('contratoxsingles.index');
	}

	/**
	 * Remove the specified contratoxsingle from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Contratoxsingle::destroy($id);

		return Redirect::route('contratoxsingles.index');
	}

}
