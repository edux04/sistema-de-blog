<div class="form-group">
    <label for="inputName">Nombre</label>
    <input type="text" class="form-control" name="name" placeholder="Nombre de la categoria" autocomplete="off" value="{{ old('name') ??  $categoria->name ?? ''}}">
    @if ($errors->has('name'))
    <p  class="alert alert-danger" role="alert">{{ $errors->first('name') }}</p>
    @endif
</div>

@csrf

