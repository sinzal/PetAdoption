@extends('admin.layout')

@section('content')
<h2>Add New Pet</h2>

{{-- 
    IMPORTANT: The form must include enctype="multipart/form-data" 
    to properly handle file uploads to the server. 
--}}
<form action="{{ route('pets.store') }}" method="POST" enctype="multipart/form-data">
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
    
    {{-- START: File Upload Input --}}
    <div class="form-group">
        <label for="image_file">Pet Image *</label>
        <input type="file" name="image_file" id="image_file" class="form-control-file" accept="image/*" required>
        <small class="form-text text-muted">Upload a JPG, PNG, or GIF image (max 2MB).</small>
    </div>

    {{-- Image Preview Area --}}
    <div class="form-group" id="image-preview-container" style="display: none; margin-bottom: 15px;">
        <label>Image Preview:</label>
        <img id="image-preview" src="#" alt="Image Preview" style="max-width: 200px; height: auto; border: 1px solid #ccc; display: block;">
    </div>
    {{-- END: File Upload Input --}}
    
    <div class="form-group">
        <label for="description">Description *</label>
        <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
    </div>
    
    <button type="submit" class="btn btn-success">Add Pet</button>
    <a href="{{ route('pets.index') }}" class="btn btn-primary">Cancel</a>
</form>

<script>
    document.getElementById('image_file').addEventListener('change', function(event) {
        const fileInput = event.target;
        const file = fileInput.files[0];
        const preview = document.getElementById('image-preview');
        const previewContainer = document.getElementById('image-preview-container');

        if (file) {
            // 1. Client-Side Validation Check (for file type and size)
            const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            const maxSize = 2 * 1024 * 1024; // 2MB

            if (!allowedTypes.includes(file.type)) {
                alert('Invalid file type. Only JPG, PNG, and GIF are allowed.');
                fileInput.value = ''; // Clear the file input
                previewContainer.style.display = 'none';
                return;
            }

            if (file.size > maxSize) {
                alert('File is too large. Maximum size is 2MB.');
                fileInput.value = ''; // Clear the file input
                previewContainer.style.display = 'none';
                return;
            }

            // 2. Display Image Preview
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            previewContainer.style.display = 'none';
        }
    });
</script>
@endsection