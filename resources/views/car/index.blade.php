@extends('layouts.admin')
@section ('content')

<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h2>Listado de Vehiculos <a href="car/create"><button class="btn btn-primary">Añadir
                    Vehiculo</button></a></h2>


    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered  table-condensed table-hover">
                <thead>

                    <th>Idcar</th>
                    <th>Cliente</th>
                    <th>Matricula</th>
                    <th>Modelo</th>
                    <th>Editar / Borrar</th>
                </thead>

                @foreach ($cars as $car)
                @include('car.modal')
                <tr>
                    <td>{{$car->idcar}} </td>
                    <td>{{$car->nombre}} </td>
                    <td>{{$car->matricula}} </td>
                    <td>{{$car->modelo}} </td>

                    <td>
                        <a href="/car/{{$car->idcar }}/edit"><button
                                class="btn btn-info">Editar</button></a>
                        <a ><button data-target="#modal-delete-{{$car->idcar}}" data-toggle="modal"
                                class="btn btn-danger">Borrar</button></a>

                    </td>

                </tr>

                @endforeach


            </table>
        </div>
        {{$cars->render()}}


    </div>

</div>
@include('car.search')

@endsection
