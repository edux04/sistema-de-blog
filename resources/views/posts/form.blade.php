<div class="form-group">
    <label for="inputName">Titulo</label>
    <input type="text" class="form-control" name="title" placeholder="Encabezado del articulo" autocomplete="off" value="{{ old('title') ??  $post->title ?? ''}}">
    @if ($errors->has('title'))
    <p  class="alert alert-danger" role="alert">{{ $errors->first('title') }}</p>
    @endif
</div>
<div class="form-group">
  <label for="body">Contenido</label>
  <textarea class="form-control" name="body"  rows="3">{{old('body') ?? $post->body ?? ''}}</textarea>
  @if ($errors->has('body'))
    <p class="alert alert-danger" role="alert" >{{ $errors->first('body') }}</p>
  @endif
</div>
<div class="form-group">
  <label for="category_id"></label>
  <select class="form-control" name="category_id">
    @forelse ($categories as $category)
    <option @if ($category->id==old('category_id') ?? $post->category_id?? '')
       {{ 'selected="selected"' }}
    @endif
    value="{{$category->id}}">{{$category->name}}</option>
    @empty
    <option>N/a</option>
    @endforelse
  </select>
  @if ($errors->has('category_id'))
  <p class="alert alert-danger" role="alert" >{{ $errors->first('category_id') }}</p>
@endif
</div>
@csrf

