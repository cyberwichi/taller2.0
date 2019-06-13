@extends('layouts.admin')
@section ('content')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h2>Editar Vehiculo: {{$car->idcar}} </h2>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>



                @foreach ($errors->all() as $error )

                <li>
                    {{ $error}}

                </li>

                @endforeach


            </ul>
        </div>
        @endif
        {!! Form::model($car, ['method'=>'PATCH','route'=>['car.update', $car->idcar]])!!}
        {{Form::token()}}
        <div class="form-group">
                <label for="idclientForm">Matricula</label>
                <select name="idclientForm" class="form-control">
                    @foreach ($clientes as $cliente )
                    @if($cliente->idclient==$car->idcar)
                    <option selected value="{{$cliente->idclient}}">{{$cliente->nombre}} </option>
                    @else
                    <option  value="{{$cliente->idclient}}">{{$cliente->nombre}} </option>
                    @endif
                    @endforeach

                </select>
            </div>
        <div class="form-group">
            <label for="matriculaForm">Matricula</label>
            <input type="text" name="matriculaForm" class="form-control" value="{{$car->matricula}}">
        </div>
        <div class="form-group">
            <label for="modeloForm">Modelo</label>
            <input type="text" name="modeloForm" class="form-control" value="{{$car->modelo}}">
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{url('car')}} "><button class="btn btn-danger" type="button" >Cancelar</button>
            </a>


        </div>
        {!! Form::close()!!}

    </div>
</div>
@endsection
