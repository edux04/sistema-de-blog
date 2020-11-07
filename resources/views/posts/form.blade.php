<div class="form-group">
    <label for="inputName">Titulo</label>
    <input type="text" class="form-control" name="title" placeholder="Encabezado del articulo" autocomplete="off"
        value="{{ old('title') ?? ($articulo->title ?? '') }}">
    @if ($errors->has('title'))
        <p class="alert alert-danger" role="alert">{{ $errors->first('title') }}</p>
    @endif
</div>
<div class="form-group">
    <label for="body">Contenido</label>
    <textarea class="form-control" name="body" rows="3">{{ old('body') ?? ($articulo->body ?? '') }}</textarea>
    @if ($errors->has('body'))
        <p class="alert alert-danger" role="alert">{{ $errors->first('body') }}</p>
    @endif
</div>
<div class="form-group">
    <label for="category_id"></label>
    <select class="form-control" name="category_id">
        @forelse ($categorias as $categoria)
            <option @if ($categoria->id == old('category_id') ?? ($articulo->category_id ?? ''))
                {{ 'selected="selected"' }}
                @endif
                value="{{ $categoria->id }}">{{ $categoria->name }}
            </option>
        @empty
            <option>N/a</option>
        @endforelse
    </select>
    @if ($errors->has('category_id'))
        <p class="alert alert-danger" role="alert">{{ $errors->first('category_id') }}</p>
    @endif
</div>

<div class="form-group">
    <label for="posted_at">Fecha de publicación</label>
    <input type="date" name="posted_at" class="form-control">
    <small id="helpId" class="text-muted">Programa la fecha en la que se publicara el articulo</small>
    @if ($errors->has('posted_at'))
        <p class="alert alert-danger" role="alert">{{ $errors->first('category_id') }}</p>
    @endif
</div>
<div class="form-group">
    <label for="posted_at">Hora de publicación</label>
    <input type="time" name="posted_at_hour" class="form-control">
    <small id="helpId" class="text-muted">Programa la hora en la que se publicara el articulo</small>
    @if ($errors->has('posted_at_hour'))
        <p class="alert alert-danger" role="alert">{{ $errors->first('category_id') }}</p>
    @endif
</div>

<div class="form-group">
    <label for="image">Imagen del articulo</label>
    <input type="file" name="image" class="form-control">
    <small id="helpId" class="text-muted">Opcional</small>
    @if ($errors->has('image'))
        <p class="alert alert-danger" role="alert">{{ $errors->first('category_id') }}</p>
    @endif
</div>

@csrf
