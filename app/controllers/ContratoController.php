<?php

class ContratoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$items = Contrato::all();
		$itemss = Evento::all();
		$clientes = Cliente::all();
		$canciones = Cancion::all();
		if(isset($items)){
			return View::make('Admin.contrato')->with('items',$items)->with('itemss',$itemss)->with('clientes',$clientes)->with('canciones',$canciones);
		}else{
			$items = [];
			return View::make('Admin.contrato')->with('items',$items)->with('itemss',$itemss)->with('clientes',$clientes)->with('canciones',$canciones);
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

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$contrato = new Contrato;
		
		$current = Contrato::Guid();
		$contrato->codContrato = $current;
		$contrato->cliente_id = Input::get('codCliente');
		$contrato->evento_id = Input::get('codEvento');

		$contrato->fechaPresentacion = date("Y-m-d", strtotime(Input::get('fechaPresentacion')));
		$contrato->cantidadHoras = Input::get('cantidadHoras');
		$contrato->horaPresentacion = Input::get('horaPresentacion');
		$contrato->descripcion = Input::get('descripcion');
		$contrato->monto = Input::get('monto');
		$contrato->cantDias = Input::get('cantDias');

		$contrato->save();

		$a = Input::get('codCancion');
		for ($i=0; $i <count($a); $i++) { 
			$contratoxcancion = new Contratoxsingle;
			$contratoxcancion->codContrato = $current;
			$contratoxcancion->codCancion = $a[$i];
			$contratoxcancion->fechaFirmaContrato = date("Y-m-d");
			$contratoxcancion->save();
		}


		Session::put('mensaje',"Nuevo Contrato Agregado con éxito!");
		return Redirect::to('contrato');
	
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($codContrato)
	{
		$contrato = Contrato::find($codContrato);
	
					
		    // $html = '<html><body>';
		    // $html.= '<p>';
		    // // foreach($contratos as $contrato) {
		    // // 
		    
		    // $html.= 'Descripcion: <br>';
		    // $html.= $contratos->descripcion;
		    // $html.= '<br>';
		    // $event = $contratos->Evento->nombEvento;

		    // $html.= 
		    // return var_dump($event);
		    // }
		    // return var_dump($contratos);
		    // $html.= '</p>';
		    // $html.= '</body></html>';

		    // $pdf = new \Thujohn\Pdf\Pdf();
		    // $content = $pdf->load()->output(); ,compact('contratos')
		    
		$usuario= User::find(Auth::user()->id);



		    $html = View::make('layouts.documento',compact('contrato','usuario'));

		     // 
		    return PDF::load($html, 'A4', 'portrait')->show();
		    //
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($codContrato)
	{
		$contratos = Contrato::find($codContrato);
		$itemss = Evento::all();
		$clientes = Cliente::all();
		$canciones = Cancion::all();
		$contratoxcancion = Contratoxsingle::where('codContrato', '=', $codContrato)->get();

		return View::make('Admin.contratoEdit',compact('contratos'))->with('itemss',$itemss)->with('clientes',$clientes)->with('canciones',$canciones)->with('cancionesx',$contratoxcancion);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($codContrato)
	{
		$contrato = Contrato::find($codContrato);
		$contrato->cliente_id = Input::get('codCliente');
		$contrato->evento_id = Input::get('codEvento');

		$contrato->fechaPresentacion = Input::get('fechaPresentacion');
		$contrato->cantidadHoras = Input::get('cantidadHoras');
		$contrato->horaPresentacion = Input::get('horaPresentacion');
		$contrato->descripcion = Input::get('descripcion');
		$contrato->monto = Input::get('monto');
		$contrato->cantDias = Input::get('cantDias');

		$contrato->save();

		$contratoxcancion = Contratoxsingle::where('codContrato', '=', $codContrato)->get();
			foreach ($contratoxcancion as $d) {
				$d->delete();
			}
		$a = Input::get('codCancion');
		for ($i=0; $i <count($a); $i++) { 
			$contratoxcancion = new Contratoxsingle;
			$contratoxcancion->codContrato = $codContrato;
			$contratoxcancion->codCancion = $a[$i];
			$contratoxcancion->fechaFirmaContrato = date("Y-m-d");
			$contratoxcancion->save();
		}


		Session::put('mensaje', "Contrato fue actualizado con éxito!");
		return Redirect::to('contrato');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($codContrato)
	{	
		try{
			$contrato = Contrato::find($codContrato);
			$contratoxcancion = Contratoxsingle::where('codContrato', '=', $codContrato)->get();
			foreach ($contratoxcancion as $a) {
				$a->delete();
			}
			$contrato->delete();
		}
		catch(Exception $e){
			Session::put('mensaje', 'NO PUDO SER BORRADO DEBIDO A:',$e->getMessage());	
			return Redirect::to('contrato');
		}
		// redirect
		Session::put('mensaje', 'Se eliminó correctamente el Contrato!');
		return Redirect::to('contrato');
	}


}
