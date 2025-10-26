@extends('layout')

@section('content')
<div class="product-header">
    <h1>Meet Buddy</h1>
    <p>Your future furry friend is waiting for you!</p>
</div>

<div class="product-content">
    <div class="product-section">
        <div class="product-image">
            <img src="https://hips.hearstapps.com/hmg-prod/images/dog-puppy-on-garden-royalty-free-image-1586966191.jpg?crop=1.00xw:0.669xh;0,0.190xh&resize=1200:*" alt="Buddy the Golden Retriever" class="img-fluid rounded shadow">
        </div>
        <div class="product-details">
            <h2>Buddy – Golden Retriever</h2>
            <p class="product-age">Age: 2 years</p>
            <p class="product-description">Buddy is a cheerful Golden Retriever who loves to play fetch and go for long walks. He’s great with kids and other pets, making him the perfect companion for any loving family.</p>
            <h4 class="product-price">$150 Adoption Fee</h4>
            <form action="{{ url('/adoption/submit') }}" method="POST">
                @csrf
                <input type="hidden" name="pet_id" value="1">
                <input type="hidden" name="pet_name" value="Buddy">
                <input type="hidden" name="pet_price" value="150">
                <button type="submit" class="btn btn-primary btn-lg">Adopt Buddy</button>
            </form>
            <a href="{{ url('/adoption') }}" class="btn btn-outline-secondary mt-3">Back to Pets</a>
        </div>
    </div>

    <div class="product-section reverse">
        <div class="product-text">
            <h2>About Golden Retrievers</h2>
            <p>Golden Retrievers are friendly, intelligent, and devoted companions. Known for their gentle temperament, they are ideal family pets and therapy dogs. Their playful nature and love for outdoor activities make them wonderful companions for active owners.</p>
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
                <p>Buddy enjoys high-quality dog food with plenty of protein and nutrients.</p>
            </div>
            <div class="care-card card">
                <div class="care-icon">🏃‍♂️</div>
                <h4>Exercise</h4>
                <p>He needs daily walks, playtime, and a secure outdoor space to explore.</p>
            </div>
            <div class="care-card card">
                <div class="care-icon">❤️</div>
                <h4>Temperament</h4>
                <p>Gentle, loyal, and affectionate—perfect for families and kids.</p>
            </div>
            <div class="care-card card">
                <div class="care-icon">🩺</div>
                <h4>Health</h4>
                <p>Fully vaccinated, neutered, and health-checked by our veterinarians.</p>
            </div>
        </div>
    </div>
</div>

<style>
    .product-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .product-header h1 {
        color: var(--primary);
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }

    .product-section {
        display: flex;
        align-items: center;
        margin-bottom: 4rem;
        gap: 3rem;
    }

    .product-section.reverse {
        flex-direction: row-reverse;
    }

    .product-image img {
        width: 100%;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .product-details {
        flex: 1;
    }

    .product-details h2 {
        color: var(--primary);
        margin-bottom: 1rem;
        font-size: 2rem;
    }

    .product-description {
        margin-bottom: 1rem;
        line-height: 1.6;
    }

    .product-price {
        color: var(--success);
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
    }

    .product-text {
        flex: 1;
    }

    .product-text h2 {
        color: var(--primary);
        margin-bottom: 1rem;
        font-size: 2rem;
    }

    .product-icon {
        flex: 1;
        text-align: center;
    }

    .image-placeholder {
        font-size: 8rem;
        background-color: var(--white);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .care-section {
        margin-bottom: 4rem;
        text-align: center;
    }

    .care-section h2 {
        color: var(--primary);
        margin-bottom: 2rem;
        font-size: 2rem;
    }

    .care-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 2rem;
    }

    .care-card {
        padding: 2rem 1rem;
        border-radius: 15px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .care-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    }

    .care-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    @media (max-width: 768px) {
        .product-section,
        .product-section.reverse {
            flex-direction: column;
        }

        .product-image {
            margin-bottom: 2rem;
        }
    }
</style>
@endsection
