@extends('layouts.app')
@section('content')
<style type="text/css">
      svg{width:20px}
    </style>

<a href="{{route('cliente.create')}}">Nuevo</a>
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
              Cliente
            </td>
            <td>

            </td>
        </tr>
        @foreach($lista as $item)
        <tr>
            <td>
                {{$item->nombre}}
            </td>
            <td>
                <a href="{{route('cliente.show',[$item])}}">🔎</a>
                <a href="{{route('cliente.edit',[$item])}}">✎</a>
                <form action="{{route('cliente.destroy',[$item])}}"
                
                method="post">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('esta seguro de borrar')" type="submit">❌</a>
                </form>
                
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