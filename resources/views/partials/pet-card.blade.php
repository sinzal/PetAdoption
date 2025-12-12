@foreach($pets as $pet)
<div class="pet-card card">
    <div class="pet-image">
        <img src="{{ $pet->image_url }}" alt="{{ $pet->name }}" class="pet-img">
    </div>
    <div class="card-body">
        <h3>{{ $pet->name }}</h3>
        <p>{{ $pet->breed }}</p>
        <p>{{ $pet->age }} old</p>
        <p>{{ $pet->description }}</p>
        <div class="pet-price">${{ $pet->price }}</div>

        <button class="btn btn-primary">
            Add to Cart
        </button>

        <button class="btn btn-primary" onclick="window.location='/productdetail1/{{ $pet->id }}'">
            View Pet
        </button>
    </div>
</div>
@endforeach
