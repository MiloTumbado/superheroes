@extends('layouts.app')
@section('title', 'Registrar superhéroe')
@section('nav')@endsection
@section('content')
<h1>Registrar superhéroe</h1><form method="post" action="{{ route('superheroes.store') }}" enctype="multipart/form-data">@csrf @include('superheroes._form')</form>
@endsection
