@extends('partials.template')

@section('title',$categoria->title)



@section('content')
<h1>Categoria </h1>
<div class="d-flex p-2 justify-content-around" >
    <h2>{{$categoria->name}}  <a href="/{{$categoria->name}}" title="Cantidad de articulos relacionados">({{count($categoria->posts)}})</span></h2>
    <div class="d-flex">
        <a class='btn btn-primary mr-5' href="/categorias/{{$categoria->name}}/editar">Editar</a>
    <form action="/categorias/{{$categoria->name}}" method="POST">
        @method('DELETE')
        @csrf
    <button class='btn btn-danger' >Eliminar</button>
    </form>
    </div>
</div>



</section>
@endsection

