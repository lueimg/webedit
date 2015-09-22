<?php

class ClientesController extends \BaseController {

	/**
	 * Display a listing of clientes
	 *
	 * @return Response
	 */
	public function index()
	{
		$clientes = Cliente::all();

		return View::make('clientes.index', compact('clientes'));
	}

	/**
	 * Show the form for creating a new cliente
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('clientes.create');
	}

	/**
	 * Store a newly created cliente in storage.
	 *
	 * @return Response
	 */
	public function store()
	{	
		$cliente = new Cliente;
		$cliente->codCliente = Cliente::guid();
		$cliente->razonSocial = Input::get('razonSocial');
		$cliente->representante = Input::get('representante');
		$cliente->dniRepresentante = Input::get('dniRepresentante');
		$cliente->direccion = Input::get('direccion');
		$cliente->ruc = Input::get('ruc');
		$cliente->telefono = Input::get('telefono');

		$cliente->save();
		Session::put('mensaje',"Cliente fue creada con éxito");
		return Redirect::to('cliente');
	}

	/**
	 * Display the specified cliente.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$cliente = Cliente::findOrFail($id);

		return View::make('clientes.show', compact('cliente'));
	}

	/**
	 * Show the form for editing the specified cliente.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$cliente = Cliente::find($id);

		return View::make('clientes.edit', compact('cliente'));
	}

	/**
	 * Update the specified cliente in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$cliente = Cliente::findOrFail($id);
		$cliente->razonSocial = Input::get('razonSocial');
		$cliente->representante = Input::get('representante');
		$cliente->dniRepresentante = Input::get('dniRepresentante');
		$cliente->direccion = Input::get('direccion');
		$cliente->ruc = Input::get('ruc');
		$cliente->telefono = Input::get('telefono');

		$cliente->save();
		Session::put('mensaje',"Cliente fue editado con éxito");
		return Redirect::to('cliente');
	}

	/**
	 * Remove the specified cliente from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Cliente::destroy($id);
		Session::put('mensaje',"Cliente fue eliminado con éxito");
		return Redirect::to('cliente');
	}

}
