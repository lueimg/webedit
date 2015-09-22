<?php

class VideoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// if(Session::get('tipousuario')==1){
			$items = Video::all();
			if(isset($items)){
				return View::make('Admin.video')->with('items',$items);
			}else{
				$items = [];
				return View::make('Admin.video')->with('items',$items);
			}
		// }else{
		// 	return Redirect::back();
		// }
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
		$video = new Video;
	
		$video->nombVideo = Input::get('nombVideo');
		$video->codVideo = Video::Guid();
		$video->fecha = date("Y-m-d", strtotime(Input::get('fecha')));
		$video->link = Input::get('link');
		$video->descripcion = Input::get('descripcion');
		$video->save();

		Session::put('mensaje'," Video fue creado con éxito");
		return Redirect::to('video');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($codVideo)
	{
		$videos = Video::find($codVideo);
		return View::make('Admin.videoDetalle',compact('videos'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($codVideo)
	{
		$videos = Video::find($codVideo);
		return View::make('Admin.videoEdit',compact('videos'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($codVideo)
	{
		$video = Video::find($codVideo);

		$video->nombVideo = Input::get('nombVideo');
		$video->fecha = date("Y-m-d", strtotime(Input::get('fecha')));
		$video->link = Input::get('link');
		$video->descripcion = Input::get('descripcion');
		$video->fechaRegistro = date("Y-m-d H:i:s");

		$video->save();
		Session::put('mensaje', Input::get('nombVideo')." fue actualizado con éxito =)");
		return Redirect::to('video');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($codVideo)
	{
		// delete
		$video = Video::find($codVideo);
		$video->delete();

		// redirect
		Session::put('mensaje', 'Se eliminó correctamente del Video!');
		return Redirect::to('video');
	}

	public function videos(){
		$videos = Video::all();
		if(isset($videos)){
			return View::make('video.videos')->with('videos',$videos);
		}else{
			$videos = [];
			return View::make('Admin.videos')->with('videos',$videos);
		}
	}
}
