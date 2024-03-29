@extends('layouts.admin')
@section ('content')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h2>Editar Reparacion: {{$reparation->idreparation}} </h2>
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
        {!! Form::model($reparation, ['method'=>'PATCH','route'=>['reparation.update', $reparation->idreparation]])!!}
        {{Form::token()}}

        <div class="form-group">
                <label for="idcarForm">Matricula</label>
                <select name="idcarForm" class="form-control">
                    @foreach ($matriculas as $matricula )
                    @if($matricula->idcar==$reparation->idcar)
                    <option selected value="{{$matricula->idcar}}">{{$matricula->matricula}} </option>
                    @else
                    <option  value="{{$matricula->idcar}}">{{$matricula->matricula}} </option>
                    @endif
                    @endforeach

                </select>
            </div>
        <div class="form-group">
            <label for="desreparaForm">Desrepara</label>
            <input type="text" name="desreparaForm" class="form-control" value="{{$reparation->desrepara}}">
        </div>
        <div class="form-group">
            <label for="fechaForm">fecha</label>
            <input type="date" name="fechaForm" class="form-control" value="{{$reparation->fecha}}">
        </div>
        <div class="form-group">
            <label for="kilometrosForm">kilometros</label>
            <input type="text" name="kilometrosForm" class="form-control" value="{{$reparation->kilometros}}">
        </div>
        <div class="form-group">
                <button class="btn btn-primary" type="submit" >Guardar</button>
        <a href="{{url('reparation')}} "><button class="btn btn-danger" type="button" >Cancelar</button>
        </a>

            </div>






        {!! Form::close()!!}

    </div>
</div>
@endsection
