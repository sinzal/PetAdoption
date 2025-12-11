@extends('admin.layout')

@section('content')
<h2>Pet Details: {{ $pet->name }}</h2>

<div class="pet-details">
    <div style="display: flex; gap: 2rem; align-items: flex-start;">
        <div>
            <img src="{{ $pet->image_url }}" alt="{{ $pet->name }}" style="width: 300px; height: 300px; object-fit: cover; border-radius: 10px;">
        </div>
        <div style="flex: 1;">
            <table class="table" style="max-width: 500px;">
                <tr>
                    <th>Name:</th>
                    <td>{{ $pet->name }}</td>
                </tr>
                <tr>
                    <th>Type:</th>
                    <td>{{ ucfirst($pet->type) }}</td>
                </tr>
                <tr>
                    <th>Breed:</th>
                    <td>{{ $pet->breed }}</td>
                </tr>
                <tr>
                    <th>Age:</th>
                    <td>{{ $pet->age }}</td>
                </tr>
                <tr>
                    <th>Price:</th>
                    <td>${{ $pet->price }}</td>
                </tr>
                <tr>
                    <th>Status:</th>
                    <td>
                        @if($pet->is_available)
                            <span style="color: green;">Available</span>
                        @else
                            <span style="color: red;">Not Available</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Description:</th>
                    <td>{{ $pet->description }}</td>
                </tr>
                <tr>
                    <th>Added:</th>
                    <td>{{ $pet->created_at->format('M j, Y') }}</td>
                </tr>
            </table>
            
            <div style="margin-top: 2rem;">
                <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('pets.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection