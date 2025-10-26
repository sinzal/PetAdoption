@extends('layout')

@section('content')
<div class="checkout-header">
    <h1>Complete Your Adoption</h1>
    <p>Just a few details to finalize your new family member's adoption</p>
</div>

<div class="checkout-container">
    <div class="checkout-form">
        <form id="adoption-form">
            <div class="form-section">
                <h2>Your Information</h2>
                
                <div class="form-group">
                    <label for="full-name">Full Name *</label>
                    <input type="text" id="full-name" name="full_name" required>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number *</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="address">Street Address *</label>
                    <input type="text" id="address" name="address" required>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="city">City *</label>
                        <input type="text" id="city" name="city" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="state">State *</label>
                        <input type="text" id="state" name="state" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="zip">ZIP Code *</label>
                        <input type="text" id="zip" name="zip" required>
                    </div>
                </div>
            </div>
            
            <div class="form-section">
                <h2>Home Environment</h2>
                
                <div class="form-group">
                    <label for="home-type">Type of Home *</label>
                    <select id="home-type" name="home_type" required>
                        <option value="">Select...</option>
                        <option value="house">House</option>
                        <option value="apartment">Apartment</option>
                        <option value="condo">Condo/Townhouse</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="yard">Do you have a yard?</label>
                    <select id="yard" name="yard">
                        <option value="">Select...</option>
                        <option value="yes-fenced">Yes, fenced</option>
                        <option value="yes-not-fenced">Yes, not fenced</option>
                        <option value="no">No</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="other-pets">Other Pets in Home</label>
                    <textarea id="other-pets" name="other_pets" rows="3" placeholder="Tell us about any other pets you have"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="children">Children in Home</label>
                    <textarea id="children" name="children" rows="3" placeholder="Ages of children, if any"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="experience">Previous Pet Experience</label>
                    <textarea id="experience" name="experience" rows="3" placeholder="Tell us about your experience with pets"></textarea>
                </div>
            </div>
            
            <div class="form-section">
                <h2>Adoption Agreement</h2>
                
                <div class="agreement-text">
                    <p>By submitting this application, I agree to the following:</p>
                    <ul>
                        <li>I will provide proper food, water, shelter, and veterinary care for my pet</li>
                        <li>I will ensure my pet is spayed/neutered if not already done</li>
                        <li>I will not allow my pet to roam freely outdoors unsupervised</li>
                        <li>I understand that Paws & Tails may follow up on this adoption</li>
                        <li>I will return the pet to Paws & Tails if I can no longer care for them</li>
                    </ul>
                </div>
                
                <div class="form-group checkbox-group">
                    <input type="checkbox" id="agree" name="agree" required>
                    <label for="agree">I have read and agree to the adoption terms *</label>
                </div>
            </div>
            
            
        
<button type="button" class="btn btn-primary" onclick="window.location.href='{{ url('/thankyou') }}'">
    Submit Adoption Application
</button>
        </form>
    </div>
    
    <div class="order-summary card">
        <div class="card-header">
            <h2>Adoption Summary</h2>
        </div>
        <div class="card-body">
            <div id="checkout-items">
                <!-- Checkout items will be populated by JavaScript -->
            </div>
            <hr>
            <div class="summary-line">
                <span>Subtotal:</span>
                <span id="checkout-subtotal">$0</span>
            </div>
            <div class="summary-line">
                <span>Adoption Fee:</span>
                <span>$50</span>
            </div>
            <hr>
            <div class="summary-line total">
                <span>Total:</span>
                <span id="checkout-total">$50</span>
            </div>
        </div>
    </div>
</div>

<style>
    .checkout-header {
        text-align: center;
        margin-bottom: 2rem;
    }
    
    .checkout-header h1 {
        color: var(--primary);
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }
    
    .checkout-container {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 3rem;
    }
    
    .form-section {
        margin-bottom: 2.5rem;
        padding-bottom: 2rem;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .form-section h2 {
        color: var(--primary);
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
    }
    
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }
    
    .form-row .form-group:last-child {
        grid-column: 1 / -1;
    }
    
    .agreement-text {
        background-color: #f9f9f9;
        padding: 1.5rem;
        border-radius: 10px;
        margin-bottom: 1.5rem;
    }
    
    .agreement-text ul {
        margin-left: 1.5rem;
        margin-top: 1rem;
    }
    
    .agreement-text li {
        margin-bottom: 0.5rem;
    }
    
    .checkbox-group {
        display: flex;
        align-items: flex-start;
    }
    
    .checkbox-group input {
        width: auto;
        margin-right: 0.5rem;
        margin-top: 0.3rem;
    }
    
    .order-summary .card-body {
        padding: 1.5rem;
    }
    
    .checkout-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .checkout-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    
    .item-name {
        font-weight: bold;
    }
    
    .item-details {
        color: #666;
        font-size: 0.9rem;
    }
    
    .item-price {
        text-align: right;
    }
    
    .item-quantity {
        color: #666;
        font-size: 0.9rem;
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
    
    @media (max-width: 768px) {
        .checkout-container {
            grid-template-columns: 1fr;
        }
        
        .form-row {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cart = JSON.parse(localStorage.getItem('petCart')) || [];
        const checkoutItemsContainer = document.getElementById('checkout-items');
        
        function renderCheckoutItems() {
            if (cart.length === 0) {
                window.location.href = "{{ route('adoption') }}";
                return;
            }
            
            let html = '';
            let subtotal = 0;
            
            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                subtotal += itemTotal;
                
                html += `
                <div class="checkout-item">
                    <div class="item-info">
                        <div class="item-name">${item.name}</div>
                        <div class="item-details">${item.type.charAt(0).toUpperCase() + item.type.slice(1)}</div>
                    </div>
                    <div class="item-price">
                        <div>$${itemTotal}</div>
                        <div class="item-quantity">Qty: ${item.quantity}</div>
                    </div>
                </div>
                `;
            });
            
            checkoutItemsContainer.innerHTML = html;
            
            // Update totals
            document.getElementById('checkout-subtotal').textContent = `$${subtotal}`;
            document.getElementById('checkout-total').textContent = `$${subtotal + 50}`;
        }
        
        // Form submission
        document.getElementById('adoption-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // In a real application, you would send the form data to your server
            alert('Thank you for your adoption application! We will review it and contact you within 2-3 business days.');
            
            // Clear the cart
            localStorage.removeItem('petCart');
            window.location.href = "{{ route('home') }}";
        });
        
        renderCheckoutItems();
    });
</script>
@endsection