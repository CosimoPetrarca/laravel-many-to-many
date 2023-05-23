@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('message'))
    <h5 class="alert alert-danger ms-auto p-2" role="alert">{{ session('message') }}</h5>
    @endif
    <h1 class="fs-4 text-secondary my-4 text-center"> Dettaglio Progetto: {{ $project->title }}</h1>
    <hr>
    <h3><strong>Nome Progetto:</strong> {{ $project->title }}</h3>
    @if ($project->image)
    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
    @endif
    <p><strong>Descrizione Progetto:</strong> {{ $project->description }}</p>
    <p><strong>Categoria:</strong> {{ $project->type?->name ?: 'Categoria non presente' }}</p>
    <p><strong>Data inizio Progetto:</strong> {{ $project->start_date }}</p>
    <p><strong>Data fine Progetto:</strong> {{ $project->end_date }}</p>
    <p><strong>Slug:</strong> {{ $project->slug }}</p>
    <hr>
</div>
@endsection