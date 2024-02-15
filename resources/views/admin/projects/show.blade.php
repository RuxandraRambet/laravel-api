@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="card text-center">
            <div class="card-header">
                <h3>{{ $project->title }}</h3>
            </div>
            <div class="card-body">
                <p class="card-text"> {{ $project->description }}</p>
                @if ($project->project_image)
                    <div class="my-4">
                        <img src="{{ asset('storage/' . $project->project_image) }}" class="w-50">
                    </div>
                @endif
                <div class="my-3">
                    <h6><strong>Type:</strong> {{ $project->type?->title ?: 'No category' }}</h6>
                </div>

                <div>
                    <h6 class="fw-bold">Technology:</h6>
                    <ul class="list-unstyled">
                        @foreach ($project->technologies as $technology)
                            <li> {{ $technology->title }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="p-3">
                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary mx-2">Edit</a>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-success">Go back to projects</a>
                </div>

            </div>
        </div>

    </div>
@endsection
