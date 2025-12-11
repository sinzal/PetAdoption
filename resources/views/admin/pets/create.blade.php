@extends('admin.layout')

@section('content')
<h2>Add New Pet</h2>

<form action="{{ route('pets.store') }}" method="POST">
    @csrf
    
    <div class="form-group">
        <label for="name">Pet Name *</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label for="type">Animal Type *</label>
        <select name="type" id="type" class="form-control" required>
            <option value="">Select Type</option>
            <option value="dog">Dog</option>
            <option value="cat">Cat</option>
            <option value="parrot">Parrot</option>
            <option value="rabbit">Rabbit</option>
            <option value="mouse">Mouse</option>
            <option value="peacock">Peacock</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="breed">Breed *</label>
        <input type="text" name="breed" id="breed" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label for="age">Age *</label>
        <input type="text" name="age" id="age" class="form-control" placeholder="e.g., 2 years, 6 months" required>
    </div>
    
    <div class="form-group">
        <label for="price">Price ($) *</label>
        <input type="number" name="price" id="price" class="form-control" step="0.01" min="0" required>
    </div>
    
    <div class="form-group">
        <label for="image_url">Image URL *</label>
        <input type="url" name="image_url" id="image_url" class="form-control" placeholder="https://example.com/image.jpg" required>
    </div>
    
    <div class="form-group">
        <label for="description">Description *</label>
        <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
    </div>
    
    <button type="submit" class="btn btn-success">Add Pet</button>
    <a href="{{ route('pets.index') }}" class="btn btn-primary">Cancel</a>
</form>
@endsection