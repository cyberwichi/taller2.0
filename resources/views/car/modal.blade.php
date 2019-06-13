<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
    id="modal-delete-{{$car->idcar}}">
    {{Form::Open(array('action'=>array('CarController@destroy', $car->idcar), 'method'=>'delete'))}}
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
                <h3 class="modal-title">Eliminar Vehiculo</h3>

            </div>
            <div class="modal-body">
                <p>¿REALMENTE DESEA ELIMINAR ESTE VEHICULO DE LA BASE DE DATOS?</p>
                <p>ESTA ACCION SOLO SERA POSIBLE REALIZARLA SI EL VEHICULO EN CUESTION NO TIENE REPARACIONES ALMACENADAS EN NUESTRA BASE DE DATOS.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Si Borrar</button>

            </div>
        </div>
    </div>
    {{Form::Close()}}

</div>
