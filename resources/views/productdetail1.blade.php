@extends('layout')

@section('content')
@php
    // If no pet is passed, get the first pet (for backward compatibility)
    $pet = $pet ?? App\Models\Pet::first();
@endphp

<div class="product-header">
    <h1>Meet {{ $pet->name ?? 'Buddy' }}</h1>
    <p>Your future furry friend is waiting for you!</p>
</div>

<div class="product-content">
    <div class="product-section">
        <div class="product-image">
            @if(isset($pet) && $pet->image_url)
                <img src="{{ $pet->image_url }}" alt="{{ $pet->name }} the {{ $pet->breed }}" class="img-fluid rounded shadow">
            @else
                {{-- Fallback for Buddy --}}
                <img src="https://hips.hearstapps.com/hmg-prod/images/dog-puppy-on-garden-royalty-free-image-1586966191.jpg?crop=1.00xw:0.669xh;0,0.190xh&resize=1200:*" alt="Buddy the Golden Retriever" class="img-fluid rounded shadow">
            @endif
        </div>
        <div class="product-details">
            <h2>{{ $pet->name ?? 'Buddy' }} – {{ $pet->breed ?? 'Golden Retriever' }}</h2>
            <p class="product-age">Age: {{ $pet->age ?? '2 years' }}</p>
            <p class="product-description">{{ $pet->description ?? "Buddy is a cheerful Golden Retriever who loves to play fetch and go for long walks. He's great with kids and other pets, making him the perfect companion for any loving family." }}</p>
            <h4 class="product-price">${{ $pet->price ?? '150' }} Adoption Fee</h4>
            
            <button id="addToCartBtn" class="btn btn-primary btn-lg">
                Adopt {{ $pet->name ?? 'Buddy' }}
            </button>

            <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.getElementById('addToCartBtn').addEventListener('click', function () {
                    let cart = JSON.parse(localStorage.getItem('petCart')) || [];
                    
                    // Add pet to cart
                    cart.push({
                        id: "{{ $pet->id ?? '1' }}",
                        name: "{{ $pet->name ?? 'Buddy' }}",
                        type: "{{ $pet->type ?? 'dog' }}",
                        price: {{ $pet->price ?? '150' }},
                        quantity: 1
                    });

                    localStorage.setItem('petCart', JSON.stringify(cart));

                    // Update cart icon count
                    const totalItems = cart.reduce((t, item) => t + item.quantity, 0);
                    const cartCount = document.querySelector('.cart-count');
                    if (cartCount) {
                        cartCount.textContent = totalItems;
                    }

                    // Redirect to cart page
                    window.location.href = "/cart";
                });
            });
            </script>

            <a href="{{ url('/adoption') }}" class="btn btn-secondary mt-3">Back to Pets</a>
        </div>
    </div>

    <div class="product-section reverse">
        <div class="product-text">
            <h2>About {{ $pet->breed ?? 'Golden Retrievers' }}</h2>
            <p>{{ $pet->type == 'dog' ? 'Golden Retrievers are friendly, intelligent, and devoted companions. Known for their gentle temperament, they are ideal family pets and therapy dogs. Their playful nature and love for outdoor activities make them wonderful companions for active owners.' : 'Learn more about this wonderful pet!' }}</p>
        </div>
        <div class="product-icon">
            <div class="image-placeholder">🐾</div>
        </div>
    </div>

    <div class="care-section">
        <h2>Care & Adoption Info</h2>
        <div class="care-grid">
            <div class="care-card card">
                <div class="care-icon">🍖</div>
                <h4>Feeding</h4>
                <p>{{ $pet->name ?? 'Buddy' }} enjoys high-quality pet food with plenty of protein and nutrients.</p>
            </div>
            <div class="care-card card">
                <div class="care-icon">🏃‍♂️</div>
                <h4>Exercise</h4>
                <p>Daily activity and playtime are essential for a happy and healthy pet.</p>
            </div>
            <div class="care-card card">
                <div class="care-icon">❤️</div>
                <h4>Temperament</h4>
                <p>Gentle, loyal, and affectionate—perfect for families and kids.</p>
            </div>
            <div class="care-card card">
                <div class="care-icon">🩺</div>
                <h4>Health</h4>
                <p>Fully vaccinated and health-checked by our veterinarians.</p>
            </div>
        </div>
    </div>
</div>
@endsection