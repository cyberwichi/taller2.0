@extends('layouts.admin')
@section ('content')

<div class="row mb-3">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 text-center ">
        <h2>Listado de Reparaciones <a href="reparation/create"><button class="btn btn-primary">Añadir
                    Reparacion</button></a></h2>


    </div>

</div>
<div class="row">
    <div class="col-12 p-2 m-5">
        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                    <th>Id</th>
                    <th>Idcar</th>
                    <th>Desrepara</th>
                    <th>Fecha</th>
                    <th>Kilometros</th>
                    <th>Editar / Borrar</th>
                </thead>

                @foreach ($reparations as $reparation)
                @include('reparation.modal')
                <tr>
                    <td>{{$reparation->idreparation}} </td>
                    <td>{{$reparation->matricula}} </td>
                    <td>{{$reparation->desrepara}} </td>
                    <td>{{$reparation->fecha}} </td>
                    <td>{{$reparation->kilometros}} </td>
                    <td>
                        <a href="/reparation/{{$reparation->idreparation }}/edit"><button
                                class="btn btn-info">Editar</button></a>
                        <a ><button data-target="#modal-delete-{{$reparation->idreparation}}" data-toggle="modal"
                                class="btn btn-danger">Borrar</button></a>

                    </td>

                </tr>

                @endforeach


            </table>
        </div>
        {{$reparations->render()}}


    </div>


</div>
@include('reparation.search')

@endsection
