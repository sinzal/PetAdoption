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
    <!-- Dog 1 - Buddy -->
    <div class="pet-card card" data-type="dog">
        <div class="pet-image">
            <div class="pet-type-badge dog">Dog</div>
            <img src="https://hips.hearstapps.com/hmg-prod/images/dog-puppy-on-garden-royalty-free-image-1586966191.jpg?crop=1.00xw:0.669xh;0,0.190xh&resize=1200:*" alt="Buddy the Golden Retriever" class="pet-img">
        </div>
        <div class="card-body">
            <h3>Buddy</h3>
            <p class="pet-breed">Golden Retriever</p>
            <p class="pet-age">2 years old</p>
            <p class="pet-description">Friendly and loves to play fetch. Buddy is great with kids and other pets.</p>
            <div class="pet-price">$150</div>
            <button class="btn btn-primary add-to-cart" 
                    data-pet-id="1" 
                    data-pet-name="Buddy" 
                    data-pet-price="150"
                    data-pet-type="dog">
                Add to Adoption Cart
            </button>
            <br>
            <button type="button" class="btn btn-primary" onclick="window.location.href='{{ url('/productdetail1') }}'">
    View The Pet
</button>

        </div>
    </div>

    <!-- Cat 1 - Whiskers -->
    <div class="pet-card card" data-type="cat">
        <div class="pet-image">
            <div class="pet-type-badge cat">Cat</div>
            <img src="https://upload.wikimedia.org/wikipedia/commons/4/4d/Cat_November_2010-1a.jpg" alt="Whiskers the Siamese Cat" class="pet-img cat-img">
        </div>
        <div class="card-body">
            <h3>Whiskers</h3>
            <p class="pet-breed">Siamese</p>
            <p class="pet-age">1 year old</p>
            <p class="pet-description">Loves cuddles and nap time. Whiskers is a calm and affectionate companion.</p>
            <div class="pet-price">$100</div>
            <button class="btn btn-primary add-to-cart" 
                    data-pet-id="2" 
                    data-pet-name="Whiskers" 
                    data-pet-price="100"
                    data-pet-type="cat">
                Add to Adoption Cart
            </button>
        </div>
    </div>

    <!-- Parrot - Dolly -->
    <div class="pet-card card" data-type="parrot">
        <div class="pet-image">
            <div class="pet-type-badge parrot">Parrot</div>
            <img src="https://www.marylandzoo.org/wp-content/uploads/2017/10/african_grey_web-1024x683.jpg" alt="Dolly the African Grey Parrot" class="pet-img">
        </div>
        <div class="card-body">
            <h3>Dolly</h3>
            <p class="pet-breed">African Grey</p>
            <p class="pet-age">3 years old</p>
            <p class="pet-description">Very talkative and intelligent. Dolly can learn many words and phrases.</p>
            <div class="pet-price">$300</div>
            <button class="btn btn-primary add-to-cart" 
                    data-pet-id="3" 
                    data-pet-name="Dolly" 
                    data-pet-price="300"
                    data-pet-type="parrot">
                Add to Adoption Cart
            </button>
        </div>
    </div>

    <!-- Rabbit - Thumper -->
    <div class="pet-card card" data-type="rabbit">
        <div class="pet-image">
            <div class="pet-type-badge rabbit">Rabbit</div>
            <img src="https://i.pinimg.com/736x/a0/60/43/a06043c47cf16c71938b358d3b595008.jpg" alt="Thumper the White Rabbit" class="pet-img">
        </div>
        <div class="card-body">
            <h3>Thumper</h3>
            <p class="pet-breed">Holland Lop</p>
            <p class="pet-age">6 months old</p>
            <p class="pet-description">Loves carrots and hopping around. Thumper is gentle and enjoys being petted.</p>
            <div class="pet-price">$75</div>
            <button class="btn btn-primary add-to-cart" 
                    data-pet-id="4" 
                    data-pet-name="Thumper" 
                    data-pet-price="75"
                    data-pet-type="rabbit">
                Add to Adoption Cart
            </button>
        </div>
    </div>

    <!-- Mouse - Squeaky -->
    <div class="pet-card card" data-type="mouse">
        <div class="pet-image">
            <div class="pet-type-badge mouse">Mouse</div>
            <img src="https://img.lb.wbmdstatic.com/vim/live/webmd/consumer_assets/site_images/article_thumbnails/BigBead/what_to_know_about_house_mice_bigbead/1800x1200_getty_rf_what_to_know_about_house_mice_bigbead.jpg" alt="Squeaky the Mouse" class="pet-img">
        </div>
        <div class="card-body">
            <h3>Squeaky</h3>
            <p class="pet-breed">Fancy Mouse</p>
            <p class="pet-age">4 months old</p>
            <p class="pet-description">Tiny and curious explorer. Squeaky is active and loves running on his wheel.</p>
            <div class="pet-price">$20</div>
            <button class="btn btn-primary add-to-cart" 
                    data-pet-id="5" 
                    data-pet-name="Squeaky" 
                    data-pet-price="20"
                    data-pet-type="mouse">
                Add to Adoption Cart
            </button>
        </div>
    </div>

    <!-- Peacock - Azure -->
    <div class="pet-card card" data-type="peacock">
        <div class="pet-image">
            <div class="pet-type-badge peacock">Peacock</div>
            <img src="https://i.pinimg.com/564x/5e/72/c3/5e72c3313346ccab40a3232d90d68c56.jpg" alt="Azure the Peacock" class="pet-img peacock-img">
        </div>
        <div class="card-body">
            <h3>Azure</h3>
            <p class="pet-breed">Indian Peafowl</p>
            <p class="pet-age">2 years old</p>
            <p class="pet-description">Magnificent feathers and proud. Azure enjoys spacious outdoor areas.</p>
            <div class="pet-price">$500</div>
            <button class="btn btn-primary add-to-cart" 
                    data-pet-id="6" 
                    data-pet-name="Azure" 
                    data-pet-price="500"
                    data-pet-type="peacock">
                Add to Adoption Cart
            </button>
        </div>
    </div>

    <!-- Dog 2 - Max -->
    <div class="pet-card card" data-type="dog">
        <div class="pet-image">
            <div class="pet-type-badge dog">Dog</div>
            <img src="https://cdn.britannica.com/16/234216-050-C66F8665/beagle-hound-dog.jpg" alt="Max the Beagle" class="pet-img">
        </div>
        <div class="card-body">
            <h3>Max</h3>
            <p class="pet-breed">Beagle</p>
            <p class="pet-age">3 years old</p>
            <p class="pet-description">Great sense of smell and friendly. Max loves following scents and playing outdoors.</p>
            <div class="pet-price">$120</div>
            <button class="btn btn-primary add-to-cart" 
                    data-pet-id="7" 
                    data-pet-name="Max" 
                    data-pet-price="120"
                    data-pet-type="dog">
                Add to Adoption Cart
            </button>
        </div>
    </div>

    <!-- Cat 2 - Luna -->
    <div class="pet-card card" data-type="cat">
        <div class="pet-image">
            <div class="pet-type-badge cat">Cat</div>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSEv4hZ09qavzWZYnRGz5dWPx4UV5_QTat7Wg&s" alt="Luna the Maine Coon" class="pet-img cat-img">
        </div>
        <div class="card-body">
            <h3>Luna</h3>
            <p class="pet-breed">Maine Coon</p>
            <p class="pet-age">2 years old</p>
            <p class="pet-description">Fluffy and gentle giant. Luna is calm and enjoys watching birds from the window.</p>
            <div class="pet-price">$150</div>
            <button class="btn btn-primary add-to-cart" 
                    data-pet-id="8" 
                    data-pet-name="Luna" 
                    data-pet-price="150"
                    data-pet-type="cat">
                Add to Adoption Cart
            </button>
        </div>
    </div>
</div>

<style>
    .adoption-header {
        text-align: center;
        margin-bottom: 2rem;
    }
    
    .adoption-header h1 {
        color: var(--primary);
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }
    
    .filter-section {
        max-width: 300px;
        margin: 0 auto 2rem;
    }
    
    .pets-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 2rem;
    }
    
    .pet-card {
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .pet-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    
    .pet-image {
        position: relative;
        height: 200px;
        overflow: hidden;
        background-color: var(--secondary);
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .pet-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    /* Fix for cat images - use contain to show full image */
    .cat-img {
        object-fit: contain;
        background-color: #f8f8f8;
    }
    
    /* Fix for peacock image - use contain and adjust positioning */
    .peacock-img {
        object-fit: contain;
        background-color: #f0f8ff;
    }
    
    .pet-card:hover .pet-img {
        transform: scale(1.05);
    }
    
    .pet-type-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        color: white;
        font-size: 0.8rem;
        font-weight: bold;
        z-index: 2;
    }
    
    .pet-type-badge.dog {
        background-color: #8B4513; /* saddlebrown */
    }
    
    .pet-type-badge.cat {
        background-color: #696969; /* dimgray */
    }
    
    .pet-type-badge.parrot {
        background-color: #32CD32; /* limegreen */
    }
    
    .pet-type-badge.rabbit {
        background-color: #FF69B4; /* hotpink */
    }
    
    .pet-type-badge.mouse {
        background-color: #A9A9A9; /* darkgray */
    }
    
    .pet-type-badge.peacock {
        background-color: #1E90FF; /* dodgerblue */
    }
    
    .pet-card .card-body {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        padding: 1.5rem;
    }
    
    .pet-card h3 {
        margin-bottom: 0.5rem;
        color: var(--primary);
        font-size: 1.4rem;
    }
    
    .pet-breed {
        font-style: italic;
        margin-bottom: 0.5rem;
        color: #666;
    }
    
    .pet-age {
        margin-bottom: 1rem;
        color: #888;
        font-size: 0.9rem;
    }
    
    .pet-description {
        margin-bottom: 1rem;
        flex-grow: 1;
        line-height: 1.5;
    }
    
    .pet-price {
        font-size: 1.5rem;
        font-weight: bold;
        color: var(--secondary);
        margin-bottom: 1rem;
        text-align: center;
    }
    
    .add-to-cart {
        width: 100%;
        padding: 0.8rem;
        font-size: 1rem;
    }

    /* Loading state for images */
    .pet-image::before {
        content: "🐾";
        position: absolute;
        font-size: 2rem;
        z-index: 1;
        opacity: 0.7;
    }

    .pet-img.loaded + .pet-image::before {
        display: none;
    }

    /* Special styling for specific pet types */
    [data-type="cat"] .pet-image,
    [data-type="peacock"] .pet-image {
        background: linear-gradient(135deg, #f8f8f8 0%, #e8e8e8 100%);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Image loading handling
        const images = document.querySelectorAll('.pet-img');
        images.forEach(img => {
            // Add loaded class when image is loaded
            if (img.complete) {
                img.classList.add('loaded');
            } else {
                img.addEventListener('load', function() {
                    this.classList.add('loaded');
                });
                img.addEventListener('error', function() {
                    // If image fails to load, show placeholder
                    this.style.display = 'none';
                    const placeholder = document.createElement('div');
                    placeholder.className = 'placeholder-image';
                    placeholder.innerHTML = getAnimalIcon(this.closest('.pet-card').getAttribute('data-type'));
                    placeholder.style.cssText = `
                        width: 100%;
                        height: 100%;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        font-size: 4rem;
                        background-color: var(--secondary);
                    `;
                    this.parentNode.appendChild(placeholder);
                });
            }
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
                
                // Show confirmation with cute animation
                showAddToCartConfirmation(petName);
            });
        });
        
        // Update cart count in header
        function updateCartCount() {
            const cart = JSON.parse(localStorage.getItem('petCart')) || [];
            const cartCount = document.querySelector('.cart-count');
            const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
            cartCount.textContent = totalItems;
        }
        
        // Show cute confirmation when pet is added to cart
        function showAddToCartConfirmation(petName) {
            // Create a cute notification
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
        
        // Helper function to get animal icon
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

        // Initialize cart count on page load
        updateCartCount();
    });
</script>
@endsection