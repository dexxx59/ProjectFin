@extends('layouts.app')
@section('content')
<h2>Nuevo</h2>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $err)
            <li>{{$err}}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('personal.store')}}" method="post">
    @csrf
    <input placeholder="latitud" type="text" value="{{old('personal')}}" name="latitud" id="">
    <input placeholder="longitud" type="text" value="{{old('personal')}}" name="longitud" id="">
    <input placeholder="fecha" type="date" value="{{old('personal')}}" name="fecha" id="">
    <input placeholder="hora" type="text" value="{{old('personal')}}" name="hora" id="">
    <select name="cliente">
        @foreach($cliente as $cat)
        <option value="{{$cat->id}}">{{$cat->cliente}}</option>
        @endforeach
    </select>
    <input type="submit" value="Enviar">

</form>
@endsection