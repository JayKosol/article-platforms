
@extends('layout.default')

@section('content')
<div class="container mt-5">
	<h2>Update Author</h2>
	<form action="{{ route('authors.update', $author->id) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="mb-3">
			<label for="name" class="form-label">Author Name</label>
			<input type="text" class="form-control" id="name" name="name" value="{{ old('name', $author->name) }}" required>
		</div>
		<div class="mb-3">
			<label for="description" class="form-label">Description</label>
			<textarea class="form-control" id="description" name="description">{{ old('description', $author->description) }}</textarea>
		</div>
		<div class="mb-3">
			<label for="is_active" class="form-label">Is Active</label>
			<select class="form-control" id="is_active" name="is_active">
				<option value="1" {{ old('is_active', $author->is_active) == 1 ? 'selected' : '' }}>Active</option>
				<option value="0" {{ old('is_active', $author->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
			</select>
		</div>
		<div class="mb-3">
			<label for="joined_at" class="form-label">Joined At</label>
			<input type="date" class="form-control" id="joined_at" name="joined_at" value="{{ old('joined_at', $author->joined_at ? date('Y-m-d', strtotime($author->joined_at)) : '') }}">
		</div>
		<button type="submit" class="btn btn-primary">Update</button>
	</form>
</div>
@endsection
