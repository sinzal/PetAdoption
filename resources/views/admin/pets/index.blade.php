@extends('admin.layout')

@section('content')
<div class="admin-pets-header">
    <h2>Manage Pets</h2>
    <a href="{{ route('pets.create') }}" class="btn btn-primary">Add New Pet</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Type</th>
            <th>Breed</th>
            <th>Age</th>
            <th>Price</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pets as $pet)
        <tr>
            <td>
                <img src="{{ $pet->image_url }}" alt="{{ $pet->name }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px;">
            </td>
            <td>{{ $pet->name }}</td>
            <td>{{ ucfirst($pet->type) }}</td>
            <td>{{ $pet->breed }}</td>
            <td>{{ $pet->age }}</td>
            <td>${{ $pet->price }}</td>
            <td>
                @if($pet->is_available)
                    <span style="color: green;">Available</span>
                @else
                    <span style="color: red;">Not Available</span>
                @endif
            </td>
            <td>
                <a href="{{ route('pets.show', $pet->id) }}" class="btn btn-primary">View</a>
                <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('pets.destroy', $pet->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this pet?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@if($pets->isEmpty())
    <p>No pets found. <a href="{{ route('pets.create') }}">Add your first pet!</a></p>
@endif
@endsection