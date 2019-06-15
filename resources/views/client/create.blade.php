@extends('layouts.admin')
@section ('content')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h2>Nuevo Cliente</h2>
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
        {!! Form::open(array('url'=>'client', 'method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        <div class="form-group">
            <label for="nombreForm">Nombre</label>
            <input type="text" name="nombreForm" class="form-control" value="{{old('nombreForm')}}">
        </div>
        <div class="form-group">
            <label for="cifForm">C.I.F.</label>
            <input type="text" name="cifForm" class="form-control" value="{{old('cifForm')}}">
        </div>
        <div class="form-group">
            <label for="direccionForm">Direccion</label>
            <input type="text" name="direccionForm" class="form-control" value="{{old('direccionForm')}}">
        </div>
        <div class="form-group">
                <label for="telefonoForm">Telefono</label>
                <input type="text" name="telefonoForm" class="form-control" value="{{old('telefonoForm')}}">
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
