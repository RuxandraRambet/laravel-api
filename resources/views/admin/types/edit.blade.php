@extends('layouts.admin')

@section('page-header')
    <h1>Edit type: {{ $type->title }}</h1>
    <a href="{{ route('admin.types.index') }}" role="button" class="btn btn-primary btn-sm">Go Back to Types</a>
@endsection

@section('content')
    <div class="container mt-5">
        @include('partials.errors')

        <form action="{{ route('admin.types.update', $type) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Type Title</label>
                <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title"
                    name="title" value="{{ old('title', $type->title) }}">
            </div>
        
            <button class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
