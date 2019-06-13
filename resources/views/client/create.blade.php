@extends('layouts.admin')
@section ('content')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h2>Nuevo Vehiculo </h2>
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
        {!! Form::open(array('url'=>'car', 'method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        <div class="form-group">
            <label for="idclientForm">Cliente</label>
            <input type="text" name="idclientForm" class="form-control" placeholder="Cliente">
        </div>
        <div class="form-group">
            <label for="matriculaForm">Matricula</label>
            <input type="text" name="matriculaForm" class="form-control" placeholder="Matricula">
        </div>
        <div class="form-group">
            <label for="modeloForm">Modelo</label>
            <input type="text" name="modeloForm" class="form-control" placeholder="Modelo">
        </div>

        <div class="form-group">
                <button class="btn btn-primary" type="submit" >Guardar</button>
                <a href="{{url('client')}} "><button class="btn btn-danger" type="button" >Cancelar</button>
                </a>

            </div>
        {!! Form::close()!!}

    </div>
</div>
@endsection
