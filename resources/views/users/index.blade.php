@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">Users</div>
    <div class="card-body">
        @if ($users->count() > 0)
        <table class="table">
            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th></th>
                <th></th>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>
                        <img src="{{ asset('storage/' .$user->image) }}" alt="" style="height:70px; width:100px"
                            class="img-thumbnail">
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>

                    <td>
                        @if (!$user->isAdmin())
                    <form action="{{ route('users.make-admin', $user->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Make Admin</button>
                    </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
            </thead>
        </table>
        @else
        <h3 class="text-center">No User</h3>
        @endif
    </div>
</div>

@endsection
