<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paws & Tails Adoption Center</title>
    <style>
        /* Global Styles */
        :root {
            --primary: #FFB6C1; /* Light Pink */
            --secondary: #87CEEB; /* Sky Blue */
            --accent: #98FB98; /* Pale Green */
            --text: #5D4037; /* Brown */
            --light: #FFF9F9; /* Very Light Pink */
            --white: #FFFFFF;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Comic Neue', cursive, Arial, sans-serif;
        }
        
        body {
            background-color: var(--light);
            color: var(--text);
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffb6c1' fill-opacity='0.2' fill-rule='evenodd'/%3E%3C/svg%3E");
        }
        
        /* Header Styles */
        header {
            background-color: var(--primary);
            padding: 1rem 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
        }
        
        .logo h1 {
            color: var(--white);
            font-size: 1.8rem;
            margin-left: 10px;
            text-shadow: 2px 2px 0px rgba(0, 0, 0, 0.1);
        }
        
        .logo-icon {
            font-size: 2rem;
            color: var(--white);
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav li {
            margin-left: 1.5rem;
        }
        
        nav a {
            color: var(--white);
            text-decoration: none;
            font-weight: bold;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        
        nav a:hover, nav a.active {
            background-color: var(--white);
            color: var(--primary);
        }
        
        .cart-icon {
            position: relative;
        }
        
        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: var(--secondary);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 0.8rem;
        }
        
        /* Main Content */
        main {
            min-height: calc(100vh - 140px);
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        /* Footer */
        footer {
            background-color: var(--primary);
            color: var(--white);
            text-align: center;
            padding: 1.5rem;
            margin-top: 2rem;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        /* Button Styles */
        .btn {
            display: inline-block;
            background-color: var(--secondary);
            color: white;
            padding: 0.7rem 1.5rem;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .btn:hover {
            background-color: #6ab0d8;
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }
        
        .btn-primary {
            background-color: var(--primary);
        }
        
        .btn-primary:hover {
            background-color: #ff9bb0;
        }
        
        .btn-accent {
            background-color: var(--accent);
            color: var(--text);
        }
        
        .btn-accent:hover {
            background-color: #7de87d;
        }
        
        /* Card Styles */
        .card {
            background-color: var(--white);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
        
        .card-header {
            background-color: var(--secondary);
            color: white;
            padding: 1rem;
            text-align: center;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        /* Form Styles */
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        
        input, select, textarea {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        
        input:focus, select:focus, textarea:focus {
            border-color: var(--secondary);
            outline: none;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
            }
            
            nav ul {
                margin-top: 1rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            nav li {
                margin: 0.5rem;
            }
        }
    </style>
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