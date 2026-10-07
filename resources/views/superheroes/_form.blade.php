<div class="form"><label for="real_name">Nombre real</label><input id="real_name" name="real_name" value="{{ old('real_name',$hero->real_name) }}" required maxlength="255">
<label for="hero_name">Nombre del superhéroe</label><input id="hero_name" name="hero_name" value="{{ old('hero_name',$hero->hero_name) }}" required maxlength="255">
<label for="photo">Fotografía</label><input id="photo" name="photo" type="file" accept="image/jpeg,image/png,image/webp" {{ $hero->exists ? '' : 'required' }}><small>JPG, PNG o WebP; máximo 4 MB. Al editar puedes conservar la fotografía actual.</small>
<label for="information">Información adicional</label><textarea id="information" name="information" required maxlength="5000">{{ old('information',$hero->information) }}</textarea>
<div class="actions"><button>Guardar superhéroe</button><a href="{{ route('superheroes.index') }}">Cancelar</a></div></div>
