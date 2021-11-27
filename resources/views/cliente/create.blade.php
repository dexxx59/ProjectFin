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
<form action="{{route('cliente.store')}}" method="post">
    @csrf
    <input placeholder="Nombre" type="text" value="{{old('cliente')}}" name="nombre" id="">
    <input placeholder="CI" type="text" value="{{old('cliente')}}" name="ci" id="">
    <input type="submit" value="Enviar">

</form>
@endsection