@extends('layouts.app')
@section('content')
<div class="card card-default">
    <div class="card-header">
        {{ isset($category) ? 'Edit Category' : 'Create Category' }}
    </div>
    <div class="card-body">
        @include('layouts.errors')
<form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}"method="POST">
            @if (isset($category))
            @method('PUT')
            @endif
            @csrf
            <div class="form group">
                <label for="name">Name</label>
    <input type="text" class="form-control" name="name" value="{{ isset($category) ? $category->name : ''}}">
            </div>
            <div class="form-group my-2">
                <button type="submit" class="btn btn-success">
                    {{ isset($category) ? 'Update Category' : 'Add Category' }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
