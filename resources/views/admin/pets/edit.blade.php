@extends('admin.layout')

@section('content')
<h2>Edit Pet: {{ $pet->name }}</h2>

<form action="{{ route('pets.update', $pet->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="form-group">
        <label for="name">Pet Name *</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $pet->name }}" required>
    </div>
    
    <div class="form-group">
        <label for="type">Animal Type *</label>
        <select name="type" id="type" class="form-control" required>
            <option value="dog" {{ $pet->type == 'dog' ? 'selected' : '' }}>Dog</option>
            <option value="cat" {{ $pet->type == 'cat' ? 'selected' : '' }}>Cat</option>
            <option value="parrot" {{ $pet->type == 'parrot' ? 'selected' : '' }}>Parrot</option>
            <option value="rabbit" {{ $pet->type == 'rabbit' ? 'selected' : '' }}>Rabbit</option>
            <option value="mouse" {{ $pet->type == 'mouse' ? 'selected' : '' }}>Mouse</option>
            <option value="peacock" {{ $pet->type == 'peacock' ? 'selected' : '' }}>Peacock</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="breed">Breed *</label>
        <input type="text" name="breed" id="breed" class="form-control" value="{{ $pet->breed }}" required>
    </div>
    
    <div class="form-group">
        <label for="age">Age *</label>
        <input type="text" name="age" id="age" class="form-control" value="{{ $pet->age }}" required>
    </div>
    
    <div class="form-group">
        <label for="price">Price ($) *</label>
        <input type="number" name="price" id="price" class="form-control" value="{{ $pet->price }}" step="0.01" min="0" required>
    </div>
    
    <div class="form-group">
        <label for="image_url">Image URL *</label>
        <input type="url" name="image_url" id="image_url" class="form-control" value="{{ $pet->image_url }}" required>
    </div>
    
    <div class="form-group">
        <label for="description">Description *</label>
        <textarea name="description" id="description" class="form-control" rows="4" required>{{ $pet->description }}</textarea>
    </div>
    
    <div class="form-group">
        <label for="is_available">
            <input type="checkbox" name="is_available" id="is_available" value="1" {{ $pet->is_available ? 'checked' : '' }}>
            Available for adoption
        </label>
    </div>
    
    <button type="submit" class="btn btn-success">Update Pet</button>
    <a href="{{ route('pets.index') }}" class="btn btn-primary">Cancel</a>
</form>
@endsection