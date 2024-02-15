@extends('layouts.admin')

@section('page-header')
        <h1>My Projects</h1>
        <a href="{{ route('admin.projects.create') }}" role="button" class="btn btn-primary">Create New Project</a>
@endsection

@section('content')
    @if (session('message'))
        <div class="toast show position-fixed bottom-0 end-0 p-3" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Alert</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('message') }}
            </div>
        </div>
    @endif
    <div class="container mt-5">
        <table class="table table-striped">
            <thead>
                <tr class="text-uppercase">
                    <th scope="col">id</th>
                    <th scope="col">title</th>
                    <th scope="col">slug</th>
                    <th scope="col text-right"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td class="fw-bold">{{ $project->id }}</td>
                        <td>
                            @if ($project->project_image)
                                <a href="#" class="btn btn-secondary btn-sm">image</a>
                            @endif {{ $project->title }}
                        </td>
                        <td>{{ $project->slug }}</td>
                        <td class="d-flex justify-content-end">
                            <a href="{{ route('admin.projects.show', $project) }}" role="button"
                                class="btn btn-warning btn-sm">Show</a>
                            <a href="{{ route('admin.projects.edit', $project) }}" role="button" class="btn btn-primary btn-sm mx-2">Edit</a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
