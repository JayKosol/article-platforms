@extends('layout.default')

@section('content')
<div >
    <h1>Authors</h1>
    <a href="{{ route('authors.create') }}" class="btn btn-primary mb-3">Add New Author</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($authors as $author)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $author->name }}</td>
                <td>{{ $author->description }}</td>
                <td>
                    <a href="{{ route('authors.show', $author->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No authors found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection