@extends('layouts.app')
@section('title', 'Ficha del superhéroe')
@section('nav')@endsection
@section('content')
<h1>{{ $hero->hero_name }}</h1><img class="detail-photo" src="{{ $hero->photo_url }}" alt="{{ $hero->hero_name }}"><h2>{{ $hero->real_name }}</h2><p>{{ $hero->information }}</p><div class="actions"><a class="button" href="{{ route('superheroes.edit',$hero) }}">Editar</a><a href="{{ route('superheroes.index') }}">Volver al registro</a></div>
@endsection
