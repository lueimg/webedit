<?php

class PaissesController extends \BaseController {

	/**
	 * Display a listing of paisses
	 *
	 * @return Response
	 */
	public function index()
	{
		$paisses = Paiss::all();

		return View::make('paisses.index', compact('paisses'));
	}

	/**
	 * Show the form for creating a new paiss
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('paisses.create');
	}

	/**
	 * Store a newly created paiss in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Paiss::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Paiss::create($data);

		return Redirect::route('paisses.index');
	}

	/**
	 * Display the specified paiss.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$paiss = Paiss::findOrFail($id);

		return View::make('paisses.show', compact('paiss'));
	}

	/**
	 * Show the form for editing the specified paiss.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$paiss = Paiss::find($id);

		return View::make('paisses.edit', compact('paiss'));
	}

	/**
	 * Update the specified paiss in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$paiss = Paiss::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Paiss::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$paiss->update($data);

		return Redirect::route('paisses.index');
	}

	/**
	 * Remove the specified paiss from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Paiss::destroy($id);

		return Redirect::route('paisses.index');
	}

}
