@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('message'))
    <div class="alert alert-danger mb-0" role="alert">
        {{ session('message') }}
    </div>
    @endif
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="fs-4 text-secondary my-4"> I miei Progetti</h2>
        <a href="{{ Route('admin.projects.create') }}" class="btn btn-success btn-sm">Crea Nuovo Progetto</a>

    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome Progetto</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Categoria</th>
                <th scope="col">Tecnologia</th>
                <th scope="col">Data inizio</th>
                <th scope="col">Data fine</th>
                <th scope="col">Slug</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <th scope="row">{{ $project->title }}</th>
                <td>{{ $project->description }}</td>
                <td>{{ $project->type?->name ?: 'Categoria non presente' }}</td>
                <td>
                    @forelse ($project->technologies as $technology)
                    {{ $technology->name }}
                    @empty
                    Tecnologia non presente
                    @endforelse
                </td>
                <td>{{ $project->start_date }}</td>
                <td>{{ $project->end_date }}</td>
                <td>{{ $project->slug }}</td>
                <td><a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-primary btn-sm">Dettaglio</a></td>
                <td><a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Modifica</a></td>
                <td><a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#project-{{ $project->id }}">Elimina</a></td>
            </tr>

            <div class="modal fade" id="project-{{ $project->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Attenzione</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Sei sicuro di voler cancellare il progetto con id <strong>{{ $project->id }}</strong>?
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>





            @endforeach
        </tbody>
    </table>
</div>
@endsection