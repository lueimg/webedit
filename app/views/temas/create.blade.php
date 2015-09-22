@extends('layouts.webLayout')
@section('styles')
<style>
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
                    Crear Nuevo Tema
                  </div>
                  <br>
                  <form action="http://localhost:8080/TAP/tap/public/temanuevo" method="post">
                    <h3>Titulo:</h3>
                    <input type="text" class="form-control" name="titulo">
                    <br>
                    <textarea name="descripcion" id="descripcion" rows="10" cols="80"></textarea>
                    <br>
                    <button class="btn btn-primary btn-lg">Enviar</button>
                  </form>
              </div>
            </div>
          </div><!-- ./Temas -->
      </div>
 
@stop
@section('scripts')
       <script src="{{ asset('js/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
        <script>
           CKEDITOR.replace('descripcion');
        </script>
@stop