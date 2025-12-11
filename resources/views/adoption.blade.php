@extends('layout')

@section('content')
<div class="adoption-header">
    <h1>Find Your New Best Friend</h1>
    <p>All our pets are looking for loving forever homes</p>
</div>

<div class="filter-section">
    <div class="form-group">
        <label for="pet-filter">Filter by Animal Type:</label>
        <select id="pet-filter">
            <option value="all">All Animals</option>
            <option value="dog">Dogs</option>
            <option value="cat">Cats</option>
            <option value="parrot">Parrots</option>
            <option value="rabbit">Rabbits</option>
            <option value="mouse">Mice</option>
            <option value="peacock">Peacocks</option>
        </select>
    </div>
</div>

<div class="pets-grid">
    @foreach($pets as $pet)
    <div class="pet-card card" data-type="{{ $pet->type }}">
        <div class="pet-image">
            <div class="pet-type-badge {{ $pet->type }}">{{ ucfirst($pet->type) }}</div>
            @if($pet->image_url)
                <img src="{{ $pet->image_url }}" 
                     alt="{{ $pet->name }} the {{ $pet->breed }}" 
                     class="pet-img {{ $pet->type == 'cat' || $pet->type == 'peacock' ? $pet->type . '-img' : '' }}"
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                     loading="lazy">
                <!-- Fallback placeholder (hidden by default) -->
                <div class="pet-placeholder" style="display: none;">
                    {{ $pet->type == 'dog' ? '🐶' : 
                       ($pet->type == 'cat' ? '🐱' : 
                       ($pet->type == 'parrot' ? '🐦' : 
                       ($pet->type == 'rabbit' ? '🐰' : 
                       ($pet->type == 'mouse' ? '🐭' : 
                       ($pet->type == 'peacock' ? '🦚' : '🐾'))))) }}
                </div>
            @else
                <!-- No image URL - show placeholder directly -->
                <div class="pet-placeholder">
                    {{ $pet->type == 'dog' ? '🐶' : 
                       ($pet->type == 'cat' ? '🐱' : 
                       ($pet->type == 'parrot' ? '🐦' : 
                       ($pet->type == 'rabbit' ? '🐰' : 
                       ($pet->type == 'mouse' ? '🐭' : 
                       ($pet->type == 'peacock' ? '🦚' : '🐾'))))) }}
                </div>
            @endif
        </div>
        <div class="card-body">
            <h3>{{ $pet->name }}</h3>
            <p class="pet-breed">{{ $pet->breed }}</p>
            <p class="pet-age">{{ $pet->age }} old</p>
            <p class="pet-description">{{ $pet->description }}</p>
            <div class="pet-price">${{ $pet->price }}</div>
            <button class="btn btn-primary add-to-cart" 
                    data-pet-id="{{ $pet->id }}" 
                    data-pet-name="{{ $pet->name }}" 
                    data-pet-price="{{ $pet->price }}"
                    data-pet-type="{{ $pet->type }}">
                Add to Adoption Cart
            </button>
            <br>
            <button type="button" class="btn btn-primary" onclick="window.location.href='{{ url('/productdetail1/' . $pet->id) }}'">
                View The Pet
            </button>
        </div>
    </div>
    @endforeach
</div>

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Adoption page loaded successfully');
    
    // Simple image load logging
    document.querySelectorAll('.pet-img').forEach(img => {
        img.addEventListener('load', function() {
            console.log('✓ Image loaded:', this.src);
        });
        img.addEventListener('error', function() {
            console.log('✗ Image failed:', this.src);
        });
    });

    // Filter functionality
    const filterSelect = document.getElementById('pet-filter');
    if (filterSelect) {
        filterSelect.addEventListener('change', function() {
            const selectedType = this.value;
            const petCards = document.querySelectorAll('.pet-card');
            
            petCards.forEach(card => {
                if (selectedType === 'all' || card.getAttribute('data-type') === selectedType) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }

    // Add to cart functionality
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const petId = this.getAttribute('data-pet-id');
            const petName = this.getAttribute('data-pet-name');
            const petPrice = parseFloat(this.getAttribute('data-pet-price'));
            const petType = this.getAttribute('data-pet-type');
            
            let cart = JSON.parse(localStorage.getItem('petCart')) || [];
            
            // Check if pet is already in cart
            const existingItem = cart.find(item => item.id === petId);
            
            if (existingItem) {
                existingItem.quantity += 0;
            } else {
                cart.push({
                    id: petId,
                    name: petName,
                    price: petPrice,
                    type: petType,
                    quantity: 0
                });
            }
            
            // Save to localStorage
            localStorage.setItem('petCart', JSON.stringify(cart));
            
            // Update cart count
            updateCartCount();
            
            // Show confirmation
            showAddToCartConfirmation(petName);
        });
    });
    
    // Update cart count in header
    function updateCartCount() {
        const cart = JSON.parse(localStorage.getItem('petCart')) || [];
        const cartCount = document.querySelector('.cart-count');
        if (cartCount) {
            const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
            cartCount.textContent = totalItems;
        }
    }
    
    // Show confirmation when pet is added to cart
    function showAddToCartConfirmation(petName) {
        const notification = document.createElement('div');
        notification.style.cssText = `
            position: fixed;
            top: 100px;
            right: 20px;
            background: var(--primary);
            color: white;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 1000;
            transform: translateX(150%);
            transition: transform 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        `;
        notification.innerHTML = `
            <span style="font-size: 1.5rem;">🐾</span>
            <div>
                <strong>${petName}</strong> added to your adoption cart!
            </div>
        `;
        
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 10);
        
        // Animate out after 3 seconds
        setTimeout(() => {
            notification.style.transform = 'translateX(150%)';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }

    // Initialize cart count on page load
    updateCartCount();
});
</script>
@endsection
@endsection