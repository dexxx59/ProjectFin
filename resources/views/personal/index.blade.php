@extends('layouts.app')
@section('content')
<style type="text/css">
      svg{width:20px}
    </style>

<a href="{{route('personal.create')}}">Nuevo</a>
@if(Session::get('msg'))
<div class="alert alert-success">
    {{Session::get('msg')}}
</div>
@endif
@if(Session::get('error'))
<div class="alert alert-danger">
    {{Session::get('error')}}
</div>
@endif
<div>
    <table>
        <tr>
            <td>
             Alarmas  
            </td>
            <td>

            </td>
        </tr>
        @foreach($lista as $item)
        <tr>
            <td>
               
                {{$item->latitud}}
                {{$item->longitud}}
                {{$item->fecha}}
                {{$item->hora}}

            </td>
            <td>
                <a href="{{route('personal.show',[$item])}}">🔎</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
<br>
<div>
    {{$lista->links()}}
</div>
@endsection