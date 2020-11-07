
    <h3>{{$category->name}}</h3>
    @forelse ($category->posts as $post)
    <li>{{$post->title}}</li>
    @empty
    <li>No tiene</li>
    @endforelse

