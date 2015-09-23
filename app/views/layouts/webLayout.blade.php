<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="" rel="stylesheet">
        <!-- font Awesome -->
        <link href="{{ asset( 'css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="{{ asset('css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        <link href="{{ asset('assets/css/skitter.styles.css') }}" type="text/css" media="all" rel="stylesheet" />

        @section('styles')
            
        @show
        <style>
        .modal-footer {
         border-top: 0px; }
         .link{
          color: #507ADE
         }
         .link:hover{
          text-decoration: underline;
          cursor: pointer;
         }
        </style>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <?php $url=explode("/",$_SERVER['PHP_SELF']);
    ?>
    <body>
        <header class="container ">
      <div class="row pad-fix">
        <div class="dark-container header">
          <div class="col-sm-4 col-md-4 col-lg-4">
            <a href="" class="logo">
              <img src="{{ asset('assets/img/logoDL.png') }}" class="logo" alt="Daniel Lazo">
            </a>  
          </div>
          <div class="col-sm-8 col-md-8 col-lg-8">
            <div class="navegador">
               <ul>
                 <li><a href="#">NOTICIAS</a></li>
                 <li><a href="http://localhost/<?php echo $url[1]; ?>/public/foro">FORO</a></li>
                 <li><a href="http://localhost/<?php echo $url[1]; ?>/public/videos">VIDEOS</a></li>
                 <li><a href="http://localhost/<?php echo $url[1]; ?>/public/galerias">IMAGENES</a></li>
                 <li><a href="http://localhost/<?php echo $url[1]; ?>/public/tienda">TIENDA</a></li>
                  @if(Session::has('usuario'))
                  <li style="position: absolute;right: 0;top: 0;text-align: right;">
                    <span style="color:#fff">
                      Bienvenido, {{Session::get('usuario')}}
                      <p class="link" onclick="cerrarsesion()">Cerrar Sesión</p>
                    </span>
                    
                  </li>
                  <li><a href="perfil/{{Session::get('usuario')}}">PERFIL</a></li>
                  @else
                  <li><a id="ingresa" href="#" data-toggle="modal" data-target="#loginModal">INGRESA</a></li>
                  @endif
               </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div style="width:100%;height:10px;"></div>
    <section class="container">
        @yield('content')
    </section>
   
<div id="loginModal" class="modal fade bs-example-modal-lg"  tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <div class="modal-content" style="border-radius: 0;">
      <div class="modal-header" style="border:none;">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >×</button>
          <h1 class="text-center" style="font-family: Bebas;">ÚNETE AL FAN CLUB</h1>
      </div>

      <div class="modal-body" style="height: 290px;">
        <div class="form col-md-12 center-block">
          
          <form action="http://localhost/<?php echo $url[1]; ?>/public/registrar" method="post" id="registro">
            <p>Registrate y podrás subir imagenes, compartirlas, comentarlas, escuchar lo ultimo y más...</p>
            <div class="form-group">
              <input type="email" id="em" name="username" class="form-control input-lg" style="border-radius: 0;" placeholder="Email" name="email" required onblur="exist(this)"><p style="color:red" class="hidden">Este nombre de usuario ya existe.</p>
            </div>
            <div class="form-group">
              <input type="email" id="em2" class="form-control input-lg" style="border-radius: 0;" placeholder="Confirma Email" onkeyup="verifica(this)" required>
            </div>
            <div class="form-group">
              <input type="password" id="pass" class="form-control input-lg" style="border-radius: 0;" placeholder="Password" name="password" required><p class="has-error"></p>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" onclick="chekear(this)"> Si he leído y acepto los <a href="#">T&eacute;rminos y Condiciones</a>.
                </label>
              </div>
            </div>
            <div class="form-group">
              <button id="registrarse" class="btn btn-primary btn-lg btn-block" style="font-family: Bebas;border-radius: 0;" disabled>REGISTRARSE</button>
            </div>
          </form>
            <center>- ¿Ya tienes una cuenta? -</center><br>
            <div class="form-group">
              <a style="font-family: Bebas;border-radius: 0;" class="btn btn-primary btn-lg btn-block" href="#" data-toggle="modal" data-target="#registerModal" data-dismiss="modal" aria-hidden="true">INGRESAR</a>
            </div>
        </div>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
            <button class="btn" style="font-family: Bebas;border-radius: 0;" data-dismiss="modal" aria-hidden="true" >Cancelar</button>
          </div>  
      </div>
  </div>
  </div>
</div>
<div id="registerModal" class="modal fade bs-example-modal-lg"  tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <div class="modal-content" style="border-radius: 0;">
      <div class="modal-header" style="border:none;">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"  onclick="cerrarLogin()">×</button>
          <h1 class="text-center" style="font-family: Bebas;">IDENTIFICARME</h1>
      </div>

      <div class="modal-body" style="height: 210px;">
          <div class="form col-md-12 center-block">
            <div class="form-group">
              <input type="text" class="form-control input-lg" style="border-radius: 0;" placeholder="Email" id="userlogin">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" style="border-radius: 0;" placeholder="Password" id="passlogin">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block" style="font-family: Bebas;border-radius: 0;" onclick="login()">INGRESAR</button>
            </div>
          </div>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
            <button class="btn" style="font-family: Bebas;border-radius: 0;" data-dismiss="modal" aria-hidden="true" onclick="cerrarLogin()">Cancelar</button>
          </div>  
      </div>
  </div>
  </div>
</div>

<!--     SCM Music Player http://scmplayer.net >
<script type="text/javascript" src="http://scmplayer.net/script.js" 
data-config="{'skin':'skins/black/skin.css','volume':90,'autoplay':true,'shuffle':false,'repeat':1,'placement':'bottom','showplaylist':false,'playlist':[{'title':'Mix - Daniel Lazo','url':'https://www.youtube.com/watch?v=st8C4xFFnEE'}]}" ></script>
< SCM Music Player script end -->

    <footer class="container">
      <p>&copy; Company 2014</p>
    </footer>
           

    


        <!-- jQuery 2.0.2 -->
        // <script src="{{ asset('js/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('js/plugins/bootstrap.min.js') }}" type="text/javascript"></script>

        <script type="text/javascript" language="javascript" src="{{ asset('assets/js/vendor/jquery.easing.1.3.js') }}"></script>
        <script type="text/javascript" language="javascript" src="{{ asset('assets/js/vendor/jquery.skitter.min.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <!-- Init Skitter -->
        <script type="text/javascript" language="javascript">
          function exist(obj){
            $.ajax({
              url: 'http://localhost/<?php echo $url[1]; ?>/public/exist',
              type: 'get',
              data: {username: obj.value},
            })
            .done(function(data) {
              if(data=='false'){
                obj.nextSibling.className= "hidden";
              }else{
                obj.nextSibling.className= "show";
              }
            })
            .fail(function() {
            })
            .always(function() {
            });
          }
          function chekear(obj){
            if(obj.checked){document.getElementById('registrarse').disabled=false;}
            else{document.getElementById('registrarse').disabled=true;}
          }
          function verifica(obj){
            var em = document.getElementById('em');
            if (em.value != obj.value) {obj.parentNode.className="form-group has-error"}
            else {obj.parentNode.className="form-group has-success"}
          }
          function cerrarsesion(){
            document.location = "http://localhost/<?php echo $url[1]; ?>/public/cerrarsesion";
          }
          function login(){
            var a = document.getElementById('userlogin').value,
            b = document.getElementById('passlogin').value;
            $.ajax({
              url: 'http://localhost/<?php echo $url[1]; ?>/public/loginfan',
              type: 'post',
              data: {username: a,password: b},
            })
            .done(function(data) {
              if(data=='true'){
                document.location="http://localhost/<?php echo $url[1]; ?>/public/";
              }else{
                alert("El usuario o contraseña es incorrecto");
              }
            })
            .fail(function() {
            })
            .always(function() {
            });
          }

          $(document).ready(function() {
            $('#registro').on('submit', function(e){
              e.preventDefault();
                var em = document.getElementById('em')
                em1 = document.getElementById('em2');
                if (em.value == em1.value) {
                  if($('#pass').val().length > 5){
                    return this.submit();
                  }else{
                    $('#pass').next().html("La contraseña debe tener almenos 6 caracteres.")
                  }
                }else{
                  $('#em2').focus();
                }
            });

            $('.box_skitter_large').skitter({
              theme: 'Default',
              numbers_align: 'left',
              progressbar: false, 
              dots: false, 
              preview: false
            });
          });

        </script>
        @section("scripts")

        @show
    </body>
</html>
