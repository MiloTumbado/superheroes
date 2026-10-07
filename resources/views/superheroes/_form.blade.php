<div class="form"><label for="real_name">Nombre real</label><input id="real_name" name="real_name" value="{{ old('real_name',$hero->real_name) }}" required maxlength="255">
<label for="hero_name">Nombre del superhéroe</label><input id="hero_name" name="hero_name" value="{{ old('hero_name',$hero->hero_name) }}" required maxlength="255">
<label for="photo_url">URL de la fotografía</label><input id="photo_url" name="photo_url" type="url" required value="{{ old('photo_url',$hero->photo_url) }}" maxlength="2048">
<label for="information">Información adicional</label><textarea id="information" name="information" required maxlength="5000">{{ old('information',$hero->information) }}</textarea>
<div class="actions"><button>Guardar superhéroe</button><a href="{{ route('superheroes.index') }}">Cancelar</a></div></div>
