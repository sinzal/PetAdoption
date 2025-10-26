@extends('layout')

@section('content')
<div class="cart-header">
    <h1>Your Adoption Cart</h1>
    <p>Almost ready to bring your new friend home!</p>
</div>

<div class="cart-container">
    <div class="cart-items">
        <div class="cart-empty-message" id="empty-cart-message">
            <h2>Your cart is empty</h2>
            <p>Find your perfect pet in our <a href="{{ route('adoption') }}">adoption gallery</a>!</p>
        </div>
        
        <div id="cart-items-container">
            <!-- Cart items will be populated by JavaScript -->
        </div>
    </div>
    
    <div class="cart-summary card">
        <div class="card-header">
            <h2>Adoption Summary</h2>
        </div>
        <div class="card-body">
            <div class="summary-line">
                <span>Subtotal:</span>
                <span id="cart-subtotal">$0</span>
            </div>
            <div class="summary-line">
                <span>Adoption Fee:</span>
                <span id="adoption-fee">$50</span>
            </div>
            <hr>
            <div class="summary-line total">
                <span>Total:</span>
                <span id="cart-total">$50</span>
            </div>
            <a href="{{ route('checkout') }}" class="btn btn-primary" id="checkout-btn" style="display: none;">Proceed to Checkout</a>
        </div>
    </div>
</div>

<style>
    .cart-header {
        text-align: center;
        margin-bottom: 2rem;
    }
    
    .cart-header h1 {
        color: var(--primary);
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }
    
    .cart-container {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 2rem;
    }
    
    .cart-item {
        display: flex;
        background-color: var(--white);
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        align-items: center;
    }
    
    .cart-item-image {
        width: 100px;
        height: 100px;
        background-color: var(--secondary);
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 1.5rem;
        font-size: 2.5rem;
    }
    
    .cart-item-details {
        flex-grow: 1;
    }
    
    .cart-item-name {
        font-size: 1.3rem;
        margin-bottom: 0.5rem;
        color: var(--primary);
    }
    
    .cart-item-type {
        color: #666;
        margin-bottom: 0.5rem;
    }
    
    .cart-item-price {
        font-weight: bold;
        color: var(--secondary);
    }
    
    .cart-item-controls {
        display: flex;
        align-items: center;
    }
    
    .quantity-controls {
        display: flex;
        align-items: center;
        margin-right: 1rem;
    }
    
    .quantity-btn {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: none;
        background-color: var(--primary);
        color: white;
        font-weight: bold;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .quantity {
        margin: 0 0.5rem;
        font-weight: bold;
    }
    
    .remove-btn {
        background-color: #ff6b6b;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 0.5rem 1rem;
        cursor: pointer;
    }
    
    .cart-summary .card-body {
        padding: 1.5rem;
    }
    
    .summary-line {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1rem;
    }
    
    .summary-line.total {
        font-size: 1.3rem;
        font-weight: bold;
        color: var(--primary);
    }
    
    hr {
        margin: 1rem 0;
        border: none;
        border-top: 1px solid #e0e0e0;
    }
    
    #checkout-btn {
        width: 100%;
        margin-top: 1rem;
        text-align: center;
    }
    
    .cart-empty-message {
        text-align: center;
        padding: 3rem;
        background-color: var(--white);
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    
    .cart-empty-message h2 {
        color: var(--primary);
        margin-bottom: 1rem;
    }
    
    @media (max-width: 768px) {
        .cart-container {
            grid-template-columns: 1fr;
        }
        
        .cart-item {
            flex-direction: column;
            text-align: center;
        }
        
        .cart-item-image {
            margin-right: 0;
            margin-bottom: 1rem;
        }
        
        .cart-item-controls {
            margin-top: 1rem;
            justify-content: center;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cart = JSON.parse(localStorage.getItem('petCart')) || [];
        const cartItemsContainer = document.getElementById('cart-items-container');
        const emptyCartMessage = document.getElementById('empty-cart-message');
        const checkoutBtn = document.getElementById('checkout-btn');
        
        function renderCart() {
            if (cart.length === 0) {
                emptyCartMessage.style.display = 'block';
                cartItemsContainer.innerHTML = '';
                checkoutBtn.style.display = 'none';
                return;
            }
            
            emptyCartMessage.style.display = 'none';
            checkoutBtn.style.display = 'block';
            
            let html = '';
            let subtotal = 0;
            
            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                subtotal += itemTotal;
                
                html += `
                <div class="cart-item" data-pet-id="${item.id}">
                    <div class="cart-item-image">
                        ${getAnimalIcon(item.type)}
                    </div>
                    <div class="cart-item-details">
                        <h3 class="cart-item-name">${item.name}</h3>
                        <p class="cart-item-type">${item.type.charAt(0).toUpperCase() + item.type.slice(1)}</p>
                        <p class="cart-item-price">$${item.price} each</p>
                    </div>
                    <div class="cart-item-controls">
                        <div class="quantity-controls">
                            <button class="quantity-btn minus" data-pet-id="${item.id}">-</button>
                            <span class="quantity">${item.quantity}</span>
                            <button class="quantity-btn plus" data-pet-id="${item.id}">+</button>
                        </div>
                        <button class="remove-btn" data-pet-id="${item.id}">Remove</button>
                    </div>
                </div>
                `;
            });
            
            cartItemsContainer.innerHTML = html;
            
            // Update totals
            document.getElementById('cart-subtotal').textContent = `$${subtotal}`;
            document.getElementById('cart-total').textContent = `$${subtotal + 50}`;
            
            // Add event listeners to buttons
            document.querySelectorAll('.quantity-btn.plus').forEach(btn => {
                btn.addEventListener('click', function() {
                    const petId = this.getAttribute('data-pet-id');
                    updateQuantity(petId, 1);
                });
            });
            
            document.querySelectorAll('.quantity-btn.minus').forEach(btn => {
                btn.addEventListener('click', function() {
                    const petId = this.getAttribute('data-pet-id');
                    updateQuantity(petId, -1);
                });
            });
            
            document.querySelectorAll('.remove-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const petId = this.getAttribute('data-pet-id');
                    removeFromCart(petId);
                });
            });
        }
        
        function getAnimalIcon(type) {
            switch(type) {
                case 'dog': return '🐶';
                case 'cat': return '🐱';
                case 'parrot': return '🐦';
                case 'rabbit': return '🐰';
                case 'mouse': return '🐭';
                case 'peacock': return '🦚';
                default: return '🐾';
            }
        }
        
        function updateQuantity(petId, change) {
            const itemIndex = cart.findIndex(item => item.id === petId);
            
            if (itemIndex !== -1) {
                cart[itemIndex].quantity += change;
                
                if (cart[itemIndex].quantity <= 0) {
                    cart.splice(itemIndex, 1);
                }
                
                localStorage.setItem('petCart', JSON.stringify(cart));
                updateCartCount();
                renderCart();
            }
        }
        
        function removeFromCart(petId) {
            const itemIndex = cart.findIndex(item => item.id === petId);
            
            if (itemIndex !== -1) {
                cart.splice(itemIndex, 1);
                localStorage.setItem('petCart', JSON.stringify(cart));
                updateCartCount();
                renderCart();
            }
        }
        
        function updateCartCount() {
            const cartCount = document.querySelector('.cart-count');
            const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
            cartCount.textContent = totalItems;
        }
        
        renderCart();
    });
</script>
@endsection