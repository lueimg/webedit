@extends('layouts.adminLayout')

@section('styles')
<!-- DATA TABLES -->
<link href="{{ asset('css/bootstrap-multiselect.css') }}" rel="stylesheet"/>
@stop

@section('content')
    <div class="mailbox row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        Envio de Emails
                    </h3>
                </div>
                <div class="box-body">
                    <form action="">
                         <?php 
                        $mails=[];
                        foreach($usuarios as $usuario){
                            $a = $usuario->email;
                            $mails[$a]=$a;
                        }
                            ?>
                        {{ Form::select('correos[]', $mails,null, array('multiple'=>true,'class'=>'multiselect')) }}
                        <br><br>
                        <input name="subject" type="text" class="form-control" placeholder="Asunto">
                        <br>
                        <textarea name="mensaje" id="descripcion" cols="30" rows="10" class="form-control"></textarea>
                        <br>
                        <button class="btn btn-success btn-lg"><i class="fa fa-envelope"></i> Enviar</button>
                    </form>
                </div>
            </div>
        </div><!-- /.col (MAIN) -->
    </div>
@stop

@section("scripts")
<script src="{{ asset('js/bootstrap-multiselect.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        CKEDITOR.replace('descripcion');
          $('.multiselect').multiselect({
            buttonWidth: '100%',
            includeSelectAllOption: true,
            enableFiltering: true
        })
    });
</script>
@stop