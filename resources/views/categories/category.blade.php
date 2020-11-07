     @extends('partials.template')

    @section('title',$categoria->name)


    @section('content')
    <h3>{{$categoria->name}}</h3>
    @forelse ($categoria->posts as $post)
    <li>{{$post->title}}</li>
    @empty
    <li>No tiene</li>
    @endforelse


    @endsection
