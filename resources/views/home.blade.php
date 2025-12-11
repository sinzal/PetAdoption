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
@endsection