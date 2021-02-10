<div class="modal fade" tabindex="-1" role="dialog" id='modal-importar'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-download"></i> Importar Papeleta para la planilla</h4>
            </div>
            {{-- <form action="#" id="form" enctype="multipart/form-data"> --}}
            {!! Form::open(['url' => '#','files'=>'true','id'=>'form' ]) !!}
            <div class="modal-body">
                <div id="contenido">
                    {{ Form::label('archivo', 'Archivo digital:',['class'=>'form-label'])}}
                    <input type="hidden" value="{{ $planilla->id }}" id="planilla">
                    <input id="archivo" name="archivo" type="file">
                    <hr
                    <p class="help-block">
                        <strong>Nota:</strong> El tamaño max del archivo: 2MB <br>
                        El archivo digital puede ser en formato .csv, puedes bajarte la plantilla de importacion de la planilla dando clic <a href="{{ asset('planilla/planilla_papeleta.csv') }}">AQUI</a>
                    </p>   
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btn-submit" data-loading-text="CARGANDO..." class='btn btn-primary'>IMPORTAR DATOS</button> 
                <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
            </div>
            {!! Form::close() !!}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->