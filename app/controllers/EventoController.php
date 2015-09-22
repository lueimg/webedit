<?php

class EventoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$items = Evento::all();
		$tipoevento = TipoEvento::all();
		$items2 = Establecimiento::all();
		if(isset($items)){
			return View::make('Admin.evento')->with('items',$items)->with('items2',$items2)->with('tipoevento',$tipoevento);
		}else{
			$items = [];
			return View::make('Admin.evento')->with('items',$items)->with('items2',$items2)->with('tipoevento',$tipoevento);
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
	public function activarEvento()
	{
		try {
			$cancion = Evento::find($_POST['id']);
			$cancion->activo = $_POST['activo'];
			$cancion->save();
		} catch (Exception $e) {
			return 0;
		}
		return 1;
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$evento = new Evento;
	
		$evento->codEvento = Evento::Guid();
		$evento->nombEvento = Input::get('nombEvento');
		$evento->fechaEvento =  date("Y-m-d", strtotime(Input::get('fechaEvento')));
		$evento->descripcion = Input::get('descripcion');
		$evento->horaEvento = Input::get('horaEvento');
		$evento->tipoevento_id = Input::get('idTipoEvento');
		$evento->activo = Input::get('activo');
		$evento->establecimiento_id = Input::get('codEstablecimiento');

		$evento->save();

		Session::put('mensaje',"Fue creado con éxito =)");
		return Redirect::to('evento');
	}
	public function guardar()
	{
		$evento = new Evento;
	
		$evento->codEvento = Evento::Guid();
		$evento->nombEvento = $_POST['title'];
		$evento->fechaEvento =  $_POST['start'];
		$evento->tipoevento_id = 2;
		$evento->activo = 1;
		$evento->establecimiento_id = 1;
		$evento->save();

		return "true";
	}
	public function getEvento(){
		return Evento::find($_GET['id']);	
	}



	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($codEvento)
	{
		$eventos = Evento::find($codEvento);
		return View::make('Admin.eventoDetalle',compact('eventos'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($codVideo)
	{
		$eventos = Evento::find($codVideo);
		$items2 = Establecimiento::all();
		$tipoevento = TipoEvento::all();
		return View::make('Admin.eventoEdit',compact('eventos'))->with('items2',$items2)->with('tipoevento',$tipoevento);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($codEvento)
	{
		$evento = Evento::find($codEvento);

		$evento->fechaEvento = date("Y-m-d", strtotime(Input::get('fechaEvento')));
		$evento->descripcion = Input::get('descripcion');
		$evento->horaEvento = Input::get('horaEvento');
		$evento->tipoevento_id = Input::get('idTipoEvento');
		$evento->establecimiento_id = Input::get('codEstablecimiento');

		$evento->save();
		Session::put('mensaje', " fue actualizado con éxito =)");
		return Redirect::to('evento');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($codEvento)
	{
		$evento = Evento::find($codEvento);
		$evento->delete();

		// redirect
		Session::put('mensaje', 'Se eliminó correctamente del evento!');
		return Redirect::to('evento');
	}


}
