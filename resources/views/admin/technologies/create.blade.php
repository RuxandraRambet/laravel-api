@extends('layouts.admin')

@section('page-header')
    <h1>Create New Technology</h1>
    <a href="{{ route('admin.technologies.index') }}" role="button" class="btn btn-primary btn-sm">Go Back to Technologies</a>
@endsection

@section('content')
    <div class="container mt-5">
        @include('partials.errors')

        <form action="{{ route('admin.technologies.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Technology Title</label>
                <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" placeholder="New Technology"
                    name="title" value="{{ old('title') }}">
            </div>
            
            <button class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
