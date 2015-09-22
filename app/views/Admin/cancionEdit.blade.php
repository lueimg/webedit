@extends('layouts.adminLayout')

@section('styles')
<!-- Bootstrap date picker -->
        <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet"/>
@stop

@section('content')

<div class="row">
    <div class="col-xs-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Editar Canción</h3>
            </div>
            <div class="box-body">
                {{ Form::open(array('method' => 'PATCH', 'route'=>['cancion.update', $canciones->codCancion], 'files' => true)) }}
                    <input type="text" name="nombCancion" class="form-control" value="{{$canciones->nombCancion}}"><br>
                    <input id="fechaPresentacion" type="text" name="fecha" class="form-control" value="{{$canciones->fecha}}"><br>
                    <select name="activo" id="activo" class="form-control">
                        @if($canciones->activo == 1)
                            <option value="1" selected>Activado</option>
                            <option value="0">Desactivado</option>
                        @else
                            <option value="1">Activado</option>
                            <option value="0" selected>Desactivado</option>
                        @endif
                    </select>
                     <br>
                    <input name="file" type="file" class="fileinput"><br>

                    <textarea name="descripcion" id="" rows="3" class="form-control" maxlength="50">{{$canciones->descripcion}}</textarea><br>
                    {{ Form::submit('Editar', array('class'=>'btn btn-success')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>

        
</div>
@stop
@section("scripts")
<script src="{{ asset('js/plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/input-mask/jquery.inputmask.date.extensions.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/input-mask/jquery.inputmask.extensions.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
<!-- BOOTSTRAP DATE PICKER -->
        <script src="{{ asset('js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script>
   $(".fileinput").fileinput({
        browseClass: "btn btn-primary",
        showCaption: true,
        showRemove: true,
        showUpload: false,
        browseClass: "btn btn-success",
        browseLabel: "",
        browseIcon: '<i class="fa fa-music"></i>',
        removeClass: "btn btn-danger",
        removeLabel: " Delete",
        removeIcon: '<i class="fa fa-trash-o"></i>',
        allowedFileTypes: ['audio'],
        msgInvalidFileType : "El formato del archivo no es el mp3",
        allowedFileExtensions : ['mp3'],
        initialPreview: "<div class='file-preview-text'>" + 
                        "<h2><i class='glyphicon glyphicon-file'></i></h2>" +
                        "{{$canciones->cancion_archivo}}" + "</div>"
        });

   $(document).ready(function() {
    CKEDITOR.replace('descripcion');
        $("#fechaPresentacion").datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        })
   });
</script>
@stop