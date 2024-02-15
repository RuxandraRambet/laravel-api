@extends('layouts.admin')

@section('page-header')
    <h1>Create New Type</h1>
    <a href="{{ route('admin.types.index') }}" role="button" class="btn btn-primary btn-sm">Go Back to Types</a>
@endsection

@section('content')
    <div class="container mt-5">
        @include('partials.errors')

        <form action="{{ route('admin.types.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Type Title</label>
                <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" placeholder="New Type"
                    name="title" value="{{ old('title') }}">
            </div>
            
            <button class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
