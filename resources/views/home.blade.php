@extends('layout')

@section('content')
<div class="home-hero">
    <div class="hero-content">
        <h1>Welcome to Paws & Tails</h1>
        <p>Find your perfect furry, feathery, or scaly friend!</p>
        <a href="{{ route('adoption') }}" class="btn btn-primary">Meet Our Pets</a>
    </div>
    <div class="hero-image">
        <div class="animal-icons">
            <span class="animal-icon">🐶</span>
            <span class="animal-icon">🐱</span>
            <span class="animal-icon">🐰</span>
            <span class="animal-icon">🐦</span>
            <span class="animal-icon">🐭</span>
            <span class="animal-icon">🦚</span>
        </div>
    </div>
</div>

<div class="features">
    <h2>Why Adopt From Us?</h2>
    <div class="feature-cards">
        <div class="card">
            <div class="card-header">
                <span class="feature-icon">❤️</span>
                <h3>Loving Care</h3>
            </div>
            <div class="card-body">
                <p>All our pets receive the best care and attention while they wait for their forever homes.</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <span class="feature-icon">🏠</span>
                <h3>Forever Homes</h3>
            </div>
            <div class="card-body">
                <p>We carefully match pets with families to ensure lifelong happiness for both.</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <span class="feature-icon">✅</span>
                <h3>Health Guarantee</h3>
            </div>
            <div class="card-body">
                <p>All pets are vet-checked, vaccinated, and spayed/neutered before adoption.</p>
            </div>
        </div>
    </div>
</div>

<style>
    .home-hero {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 3rem 0;
        flex-wrap: wrap;
    }
    
    .hero-content {
        flex: 1;
        min-width: 300px;
        padding-right: 2rem;
    }
    
    .hero-content h1 {
        font-size: 3rem;
        color: var(--primary);
        margin-bottom: 1rem;
        text-shadow: 2px 2px 0px rgba(0, 0, 0, 0.1);
    }
    
    .hero-content p {
        font-size: 1.5rem;
        margin-bottom: 2rem;
        color: var(--text);
    }
    
    .hero-image {
        flex: 1;
        min-width: 300px;
        text-align: center;
    }
    
    .animal-icons {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
    }
    
    .animal-icon {
        font-size: 4rem;
        background-color: var(--white);
        border-radius: 20px;
        padding: 1rem;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
    
    .animal-icon:hover {
        transform: scale(1.1);
    }
    
    .features {
        margin-top: 4rem;
    }
    
    .features h2 {
        text-align: center;
        margin-bottom: 2rem;
        color: var(--primary);
        font-size: 2.5rem;
    }
    
    .feature-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
    }
    
    .feature-icon {
        font-size: 2.5rem;
        display: block;
        margin-bottom: 0.5rem;
    }
    
    @media (max-width: 768px) {
        .home-hero {
            flex-direction: column;
            text-align: center;
        }
        
        .hero-content {
            padding-right: 0;
            margin-bottom: 2rem;
        }
        
        .hero-content h1 {
            font-size: 2.5rem;
        }
    }
</style>
@endsection