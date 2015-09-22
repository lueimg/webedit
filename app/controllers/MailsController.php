<?php

class MailsController extends \BaseController {

	/**
	 * Display a listing of mails
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuarios = User::where('codPerfil','=',2)->get();

		return View::make('mails.index',compact('usuarios'));
	}
	public function mail()
	{
		$a = Input::get('correos');
		$subject = Input::get('subject');
		$mensaje = Input::get('mensaje');

		for ($i=0; $i < count($a); $i++) { 
			$msj = array(
				'mensaje' => $mensaje
			);
			Mail::send('mails.template', $msj, function($message)
			{
		    	$message->to($a[$i],'Daniel Lazo Oficial')->subject($subject);
			});
		}
		return Redirect::to('mailing');
	}
	/**
	 * Show the form for creating a new mail
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('mails.create');
	}

	/**
	 * Store a newly created mail in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Mail::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Mail::create($data);

		return Redirect::route('mails.index');
	}

	/**
	 * Display the specified mail.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$mail = Mail::findOrFail($id);

		return View::make('mails.show', compact('mail'));
	}

	/**
	 * Show the form for editing the specified mail.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$mail = Mail::find($id);

		return View::make('mails.edit', compact('mail'));
	}

	/**
	 * Update the specified mail in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$mail = Mail::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Mail::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$mail->update($data);

		return Redirect::route('mails.index');
	}

	/**
	 * Remove the specified mail from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Mail::destroy($id);

		return Redirect::route('mails.index');
	}

}
