<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
    id="modal-delete-{{$reparation->idreparation}}">
    {{Form::Open(array('action'=>array('ReparationController@destroy', $reparation->idreparation), 'method'=>'delete'))}}
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
                <h3 class="modal-title">Eliminar Reparacion</h3>

            </div>
            <div class="modal-body">
                <p>¿REALMENTE DESEA ELIMINAR ESTA REPARACION DE LA BASE DE DATOS?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Si Borrar</button>

            </div>
        </div>
    </div>
    {{Form::Close()}}

</div>
