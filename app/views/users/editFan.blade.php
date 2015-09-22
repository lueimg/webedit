@extends('layouts.webLayout')
@section('styles')

<style>
  dd{
    margin-bottom: 5px;
  }
</style>
@show

@section('content')
      <!-- Example row of columns -->
      <div class="row">
          <!-- Temas -->
          <div class="col-sm-12 pad-fix">
            <div class="dark-container">
              <div class="wrapper">
                  <div class="titulo">
                    Actualizar Perfil
                  </div>
                  <br>
                  <form action="perfil/editar" method="post" enctype="multipart/form-data">
                  <dl class="dl-horizontal">
                    <dt>Usuario:</dt>
                    <dd><input type="text" name="username" value="{{$user[0]->username}}"></dd>
                    <dt>Contraseña:</dt>  
                    <dd><input type="password" name="password" value="{{$user[0]->password}}"></dd>

                    <dt>Nombre</dt>
                    <dd><input type="text" name="nombre" value="{{$user[0]->nombre}}"></dd>

                    <dt>Apellido Paterno</dt>
                    <dd><input type="text" name="apellidoP" value="{{$user[0]->apellidoP}}"></dd>

                    <dt>Apellido Materno</dt>             
                    <dd><input type="text" name="apellidoM" value="{{$user[0]->apellidoM}}"></dd>

                    <dt>Sexo:</dt>
                    <dd>   
                      <select name="sexo">
                        <option value="f">F</option>
                        <option value="m">M</option>
                      </select>
                    </dd>
                    
                  <dt>Fecha de Nacimiento:</dt>
                    <dd>
                  <input type="text" name="fechaNacimiento"  value="{{$user[0]->fechaNacimiento}}"></dd>

                  <dt>Email:</dt>
                  <dd>
                  <input type="text" name="email" value="{{$user[0]->email}}"></dd>
                  
                  <dt>Telefono:</dt>
                  <dd>
                  <input type="text" name="telefono" maxlength="9" value="{{$user[0]->telefono}}"></dd>

                  <dt>Dirección:</dt>
                  <dd>
                  <input type="text" name="direccion" value="{{$user[0]->direccion}}"></dd>

                  <dt>N° Doc de Identidad:</dt>
                  <dd>
                  <input type="text" name="docIdentidad" maxlength="9" value="{{$user[0]->docIdentidad}}"></dd>
                  
                  @if ($user[0]->Imagen)
                    <dt>Avatar:</dt>
                    <dd><img style="max-width: 200px;" class="img-thumbnail" src="uploads/{{$user[0]->Imagen->imagen_archivo}}" alt=""></dd>
                    <dt></dt><dd><input type="file" name="file">  </dd> 
                  @else
                  <dt>Avatar:</dt>
                  <dd>
                  <input type="file" name="file"></dd>
                  @endif
                  <br>
                  <dt></dt>
                  <dd><button class="btn btn-success btn-lg">Actualizar</button></dd>
                  </dl>
                  </form>
              </div>
            </div>
          </div><!-- ./Temas -->
      </div>
@stop
@section('scripts')
  <!-- IMAGE UPLOADER -->
  <script src="{{ asset('js/dropzone.min.js') }}" type="text/javascript"></script>
  <script>
  $(document).ready(function() {
      Dropzone.options.myAwesomeDropzone = {
       headers: {'tipoimagen': tipo} // The name that will be used to transfer the file
      };
  });
  </script>
@stop
