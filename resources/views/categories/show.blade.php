@extends('partials.template')

@section('title',$category->title)



@section('content')
<h1>{{$category->name}} <a class='btn btn-primary' href="/categorias/{{$category->id}}/editar">Editar</a> </h1>
<form action="/categorias/{{$category->id}}" method="POST">
    @method('DELETE')
    @csrf
<button class='btn btn-danger' >Eliminar</button>
</form>


</section>
@endsection

