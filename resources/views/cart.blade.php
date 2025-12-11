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

@section('scripts')
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
@endsection