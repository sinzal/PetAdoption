<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paws & Tails Adoption Center</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <div class="header-container">
            <a href="{{ route('home') }}" class="logo">
                <span class="logo-icon">🐾</span>
                <h1>Paws & Tails</h1>
            </a>
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ route('adoption') }}" class="{{ request()->routeIs('adoption') ? 'active' : '' }}">Adopt a Pet</a></li>
                    <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About Us</a></li>
                    <li><a href="{{ route('cart') }}" class="cart-icon {{ request()->routeIs('cart') ? 'active' : '' }}">
                        Cart <span class="cart-count">0</span>
                    </a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="footer-content">
            <p>&copy; {{ date('Y') }} Paws & Tails Adoption Center. All rights reserved.</p>
            <p>Find your forever friend with us!</p>
        </div>
    </footer>

    <script>
        // Simple cart functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize cart from localStorage or empty array
            let cart = JSON.parse(localStorage.getItem('petCart')) || [];
            updateCartCount();
            
            // Add to cart buttons
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const petId = this.getAttribute('data-pet-id');
                    const petName = this.getAttribute('data-pet-name');
                    const petPrice = parseFloat(this.getAttribute('data-pet-price'));
                    const petType = this.getAttribute('data-pet-type');
                    
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
                    
                    // Save to localStorage and update UI
                    localStorage.setItem('petCart', JSON.stringify(cart));
                    updateCartCount();
                    
                    // Show confirmation
                    alert(`${petName} added to your adoption cart!`);
                });
            });
            
            // Update cart count in header
            function updateCartCount() {
                const cartCount = document.querySelector('.cart-count');
                const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
                cartCount.textContent = totalItems;
            }
            
            // Filter functionality for adoption page
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
        });
    </script>
    
    @yield('scripts')
</body>
</html>