@extends('layouts.app')
@section('title', 'Editar superhéroe')
@section('nav')

@endsection
@section('content')
<h1>Editar superhéroe</h1><form method="post" action="{{ route('superheroes.update',$hero) }}" enctype="multipart/form-data">@csrf @method('PUT') @include('superheroes._form')</form>
@endsection
