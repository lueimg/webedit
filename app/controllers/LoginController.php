<?php 

class LoginController extends BaseController{

	public function loginAdmin(){
		return View::make('login.index');
	}

	public function user()
	{
		$userdata = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);

		if(Auth::attempt($userdata))
		{
			$user = User::where('username','=',Input::get('username'))->get();
			Session::put('usuario',Input::get('username'));
			Session::put('codUsuario',$user[0]->id);
			Session::put('codPerfil',$user[0]->codPerfil);
			//para el contrato
			Session::put('nombre',$user[0]->nombre);
			Session::put('apellidoP',$user[0]->apellidoP);
			Session::put('apellidoM',$user[0]->apellidoM);
			return View::make('admin.video');
		}
		else
		{
			// return var_dump($userdata);
			return Redirect::to('administrador')->with('login_errors',true);
		}
	}
	public function userFan()
	{
		$userdata = array(
			'username' => $_POST['username'],
			'password' => $_POST['password']
		);
		if(Auth::attempt($userdata))
		{
			$user = User::where('username','=',$_POST['username'])->get();
			Session::put('usuario',$_POST['username']);
			Session::put('codUsuario',$user[0]->id);
			// return $user;
			return 'true';
		}
		else
		{
			return 'false';
		}
	}
	public function exist()
	{
		$user = User::where('username','=',$_GET['username'])->get();
		if(count($user)==1){
			return 'true';
		}else{
			return 'false';
		}
	}
}
 ?>