<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset="UTF-8" /> 
    <title>
        Login
    </title>
    <link rel="stylesheet" type="text/css" href="{{ asset( 'css/login.css') }}" />
    <style>
      input{
        color: #fff;
      }
    </style>
</head>
<body>


<form action="http://localhost:8080/TAP/tap/public/administrador" method="post">
  <h1>Log in</h1>
  <div class="inset">
  <p>
    <label for="email">Usuario</label>
    <input type="text" name="username" id="username">
  </p>
  <p>
    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password">
  </p>
  @if(Session::has('login_errors'))
<p style="color:#FB1D1D">El usuario o contraseña no son correctos.</p>
{{Session::get('login_errors')}}
@else
<!-- <p style="color:#666">Introduzca usuario y contraseña para continuar.</p> -->
@endif
  </div>
  <p class="p-container">
    <!-- <span>Forgot password ?</span> -->
    <input type="submit" name="go" id="go" value="Log in">
  </p>
</form>

</body>
</html>