@extends('layouts.app')
@section('content')
<h2>Editando</h2>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $err)
            <li>{{$err}}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('cliente.update',[$dato])}}" method="post">
    @csrf
    @method('PUT')
    <input placeholder="Nombre" type="text" value="{{$dato->cliente}}" name="nombre" id="">
    <input type="submit" value="Enviar">

</form>
@endsection