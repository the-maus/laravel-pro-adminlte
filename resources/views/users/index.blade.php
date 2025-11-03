@extends('layouts.default')
@section('page-title', 'Users')
@section('page-actions')
    <a href="{{ route('users.create') }}" class="btn btn-primary">Add user</a>
@endsection
    
@section('content')
    @session('status')
        <div class="alert alert-success">
            {{ $value }}
        </div>
    @endsession

    <form action="{{ route('users.index') }}" method="GET" class="mb-3" style="width:300px">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control" value="{{ request()?->keyword }}" placeholder="Search by name or e-mail">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @can('edit', \App\Models\User::class) 
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        @endcan

                        {{-- checks on UserPolicy::destroy --}}
                        @can('destroy', \App\Models\User::class) 
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        @endcan
                    </td>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
@endsection