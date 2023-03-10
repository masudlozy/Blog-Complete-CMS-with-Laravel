@extends('layouts.app')
@section('content')
<div class="card card-default">
    <div class="card-header">
        {{ isset($tag) ? 'Edit Tag' : 'Create Tag' }}
    </div>
    <div class="card-body">
        @include('layouts.errors')
        <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}"
            method="POST">
            @if (isset($tag))
            @method('PUT')
            @endif
            @csrf
            <div class="form group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name"
                    value="{{ isset($tag) ? $tag->name : ''}}">
            </div>
            <div class="form-group my-2">
                <button type="submit" class="btn btn-success">
                    {{ isset($tag) ? 'Update Tag' : 'Add Tag' }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
