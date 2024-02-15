@extends('layouts.admin')

@section('page-header')
        <h1>Project Technologies</h1>
        <div class="btn-container">
            <a href="{{ route('admin.technologies.create') }}" role="button" class="btn btn-info btn-sm mx-2">Create New Technology</a>
            <a href="{{ route('admin.projects.index') }}" role="button" class="btn btn-primary btn-sm">Go Back to Projects</a>
        </div>
       
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
                </tr>
            </thead>
            <tbody>
                @foreach ($technologies as $technology)
                    <tr>
                        <td class="fw-bold">{{ $technology->id }}</td>
                        <td>{{ $technology->title }}</td>
                        <td>{{ $technology->slug }}</td>
                        <td class="d-flex justify-content-end">
                            <a href="{{ route('admin.technologies.edit', $technology) }}" role="button" class="btn btn-primary btn-sm mx-2">Edit</a>
                            <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST">
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
