@extends('layout')

@section('content')
<div class="adoption-header">
    <h1>Find Your New Best Friend</h1>
    <p>All our pets are looking for loving forever homes</p>
</div>

<!-- Search Bar Section -->
<div class="search-section">
    <div class="form-group">
        <label for="pet-search">Search by Name or Breed:</label>
        <div class="search-wrapper">
            <input type="text" id="pet-search" placeholder="Search pets by name or breed...">
            <div id="search-results" class="search-results-dropdown"></div>
        </div>
    </div>
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

<div class="pets-grid" id="pets-container">
    @foreach($pets as $pet)
    <div class="pet-card card" data-type="{{ $pet->type }}" data-name="{{ strtolower($pet->name) }}" data-breed="{{ strtolower($pet->breed) }}">
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

    // Search Bar Functionality
    const searchInput = document.getElementById('pet-search');
    const searchResults = document.getElementById('search-results');
    const petsContainer = document.getElementById('pets-container');
    let allPets = Array.from(document.querySelectorAll('.pet-card'));
    
    // Cache all pets data for quick searching
    const petsData = allPets.map(pet => ({
        element: pet,
        name: pet.getAttribute('data-name'),
        breed: pet.getAttribute('data-breed'),
        type: pet.getAttribute('data-type')
    }));

    // Debounce function to limit API calls
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Local search function
    function performLocalSearch(query) {
        if (!query.trim()) {
            searchResults.style.display = 'none';
            return [];
        }
        
        const searchTerm = query.toLowerCase().trim();
        return petsData.filter(pet => 
            pet.name.includes(searchTerm) || 
            pet.breed.includes(searchTerm)
        );
    }

    // Display search results in dropdown
    function displaySearchResults(results) {
        searchResults.innerHTML = '';
        
        if (results.length === 0) {
            searchResults.style.display = 'none';
            return;
        }
        
        results.slice(0, 5).forEach(result => {
            const petElement = result.element;
            const name = petElement.querySelector('h3').textContent;
            const breed = petElement.querySelector('.pet-breed').textContent;
            const type = petElement.getAttribute('data-type');
            
            const resultItem = document.createElement('div');
            resultItem.className = 'search-result-item';
            resultItem.innerHTML = `
                <div class="search-result-icon">
                    ${type === 'dog' ? '🐶' : 
                      type === 'cat' ? '🐱' : 
                      type === 'parrot' ? '🐦' : 
                      type === 'rabbit' ? '🐰' : 
                      type === 'mouse' ? '🐭' : 
                      type === 'peacock' ? '🦚' : '🐾'}
                </div>
                <div class="search-result-info">
                    <strong>${name}</strong>
                    <small>${breed}</small>
                </div>
            `;
            
            resultItem.addEventListener('click', function() {
                const petId = petElement.querySelector('.add-to-cart').getAttribute('data-pet-id');
                window.location.href = `/productdetail1/${petId}`;
            });
            
            searchResults.appendChild(resultItem);
        });
        
        searchResults.style.display = 'block';
    }

    // Filter pets grid based on search
    function filterPetsGrid(searchTerm) {
        const filterSelect = document.getElementById('pet-filter');
        const selectedType = filterSelect ? filterSelect.value : 'all';
        
        allPets.forEach(pet => {
            const petName = pet.getAttribute('data-name');
            const petBreed = pet.getAttribute('data-breed');
            const petType = pet.getAttribute('data-type');
            
            const matchesSearch = !searchTerm || 
                                 petName.includes(searchTerm) || 
                                 petBreed.includes(searchTerm);
            
            const matchesType = selectedType === 'all' || petType === selectedType;
            
            pet.style.display = (matchesSearch && matchesType) ? 'block' : 'none';
        });
    }

    // Event listener for search input with debouncing
    if (searchInput) {
        searchInput.addEventListener('input', debounce(function(e) {
            const query = e.target.value.toLowerCase().trim();
            
            // Clear search results if empty
            if (!query) {
                searchResults.style.display = 'none';
                filterPetsGrid('');
                return;
            }
            
            // Perform local search
            const results = performLocalSearch(query);
            displaySearchResults(results);
            
            // Filter the main grid
            filterPetsGrid(query);
        }, 300));
    }

    // Close search results when clicking outside
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.style.display = 'none';
        }
    });

    // Filter functionality - updated to work with search
    const filterSelect = document.getElementById('pet-filter');
    if (filterSelect) {
        filterSelect.addEventListener('change', function() {
            const selectedType = this.value;
            const searchTerm = searchInput ? searchInput.value.toLowerCase().trim() : '';
            
            allPets.forEach(pet => {
                const petName = pet.getAttribute('data-name');
                const petBreed = pet.getAttribute('data-breed');
                const petType = pet.getAttribute('data-type');
                
                const matchesSearch = !searchTerm || 
                                     petName.includes(searchTerm) || 
                                     petBreed.includes(searchTerm);
                
                const matchesType = selectedType === 'all' || petType === selectedType;
                
                pet.style.display = (matchesSearch && matchesType) ? 'block' : 'none';
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
                existingItem.quantity += 1;
            } else {
                cart.push({
                    id: petId,
                    name: petName,
                    price: petPrice,
                    type: petType,
                    quantity: 1
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

<style>
.search-section {
    margin: 2rem 0;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.search-wrapper {
    position: relative;
    width: 100%;
}

#pet-search {
    width: 100%;
    padding: 12px 20px;
    border: 2px solid #e0e0e0;
    border-radius: 30px;
    font-size: 16px;
    transition: all 0.3s ease;
    box-sizing: border-box;
}

#pet-search:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
}

.search-results-dropdown {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    max-height: 300px;
    overflow-y: auto;
    z-index: 1000;
    margin-top: 5px;
}

.search-result-item {
    padding: 12px 20px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 12px;
    transition: background-color 0.2s ease;
    border-bottom: 1px solid #f0f0f0;
}

.search-result-item:last-child {
    border-bottom: none;
}

.search-result-item:hover {
    background-color: #f8f9fa;
}

.search-result-icon {
    font-size: 1.5rem;
}

.search-result-info {
    display: flex;
    flex-direction: column;
}

.search-result-info strong {
    font-size: 16px;
    color: #333;
}

.search-result-info small {
    font-size: 14px;
    color: #666;
}

/* Responsive design */
@media (max-width: 768px) {
    .search-section {
        margin: 1rem 0;
        padding: 0 1rem;
    }
    
    #pet-search {
        padding: 10px 15px;
        font-size: 14px;
    }
}
</style>
@endsection
@endsection