@extends('layouts.app')
@section('title', 'Papelera de superhéroes')
@section('nav')

@endsection
@section('content')
<h1>Papelera de superhéroes</h1><p>Los registros eliminados conservan su fotografía y pueden restaurarse.</p><a href="{{ route('superheroes.index') }}">Volver a activos</a>
<table><thead><tr><th>Foto</th><th>Superhéroe</th><th>Eliminado</th><th>Acción</th></tr></thead><tbody>@forelse($heroes as $hero)<tr><td><img class="portrait" src="{{ asset('storage/'.$hero->photo_path) }}" alt="{{ $hero->hero_name }}"></td><td>{{ $hero->hero_name }}</td><td>{{ $hero->deleted_at->format('d/m/Y H:i') }}</td><td><form method="post" action="{{ route('superheroes.restore',$hero->id) }}">@csrf<button>Restaurar</button></form></td></tr>@empty<tr><td colspan="4">La papelera está vacía.</td></tr>@endforelse</tbody></table>
@endsection
