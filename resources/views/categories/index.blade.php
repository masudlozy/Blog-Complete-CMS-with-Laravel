@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>
</div>
<div class="card card-default">
    <div class="card-header">Categories</div>
    <div class="card-body">
        @if ($categories->count() > 0)
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Posts Count</th>
                <th></th>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                        {{ $category->posts->count() }}
                    </td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm">
                            Edit
                        </a>
                        <button class="btn btn-danger btn-sm" onclick="handleDelete({{$category->id}})">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </thead>
        </table>
        @else
        <h3 class="text-center">No Category</h3>
        @endif

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="POST" id="deleteCatgoryForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Category Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center text-bold"> Are you sure to delete this category?</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </div>
                </form>
            </div>
        </div>
        </div>

    </div>


@endsection

@section('scripts')
<script>
    function handleDelete(id){
    $('#deleteModal').modal('show');
    let form = document.getElementById('deleteCatgoryForm');
    console.log(form);
    form.action = '/categories/'+id;
    }
</script>

@endsection
