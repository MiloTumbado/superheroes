@extends('layouts.app')
@section('title', 'Superhéroes')
@section('nav')@endsection
@section('content')
<h1>Superhéroes</h1><p>Registro de identidades, fotografías e información de cada héroe.</p>
<div class="actions"><a class="button" href="{{ route('superheroes.create') }}">Registrar superhéroe</a></div>
<div class="table-wrap"><table><thead><tr><th>Foto</th><th>Superhéroe</th><th>Nombre real</th><th>Acciones</th></tr></thead><tbody>
@forelse($heroes as $hero)<tr><td><img class="portrait" src="{{ $hero->photo_url }}" alt="{{ $hero->hero_name }}"></td><td>{{ $hero->hero_name }}</td><td>{{ $hero->real_name }}</td><td><a href="{{ route('superheroes.show',$hero) }}">Ver ficha</a><a href="{{ route('superheroes.edit',$hero) }}">Editar</a><form method="post" action="{{ route('superheroes.destroy',$hero) }}">@csrf @method('DELETE')<button class="danger">Eliminar</button></form></td></tr>
@empty<tr><td colspan="4">No hay superhéroes registrados.</td></tr>@endforelse</tbody></table></div>
@endsection
