@extends('layouts.admin')
@section ('content')

<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h2>Listado de Clientes <a href="client/create"><button class="btn btn-primary">Añadir
                    Cliente</button></a></h2>


    </div>
</div>
<div class="row container m-3">
    <div class="col-10">
        <div class="table-responsive">
            <table class="table table-striped table-bordered  table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>C.I.F.</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Editar / Borrar</th>
                </thead>

                @foreach ($clientes as $cli)
                @include('client.modal')
                <tr>
                    <td>{{$cli->idclient}} </td>
                    <td>{{$cli->nombre}} </td>
                    <td>{{$cli->cif}} </td>
                    <td>{{$cli->direccion}} </td>
                    <td>{{$cli->telefono}} </td>

                    <td>
                        <a href="/client/{{$cli->idclient}}/edit"><button
                                class="btn btn-info">Editar</button></a>
                        <a ><button data-target="#modal-delete-{{$cli->idclient}}" data-toggle="modal"
                                class="btn btn-danger">Borrar</button></a>

                    </td>

                </tr>

                @endforeach


            </table>
        </div>
        {{$clientes->render()}}


    </div>

</div>
@include('client.search')

@endsection
