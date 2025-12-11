@extends('layout')

@section('content')
<div class="about-header">
    <h1>About Paws & Tails</h1>
    <p>Our mission is to connect loving families with pets in need</p>
</div>

<div class="about-content">
    <div class="about-section">
        <div class="about-text">
            <h2>Our Story</h2>
            <p>Paws & Tails was founded in 2010 with a simple goal: to help homeless pets find their forever families. What started as a small volunteer-run operation has grown into a comprehensive adoption center that places thousands of animals each year.</p>
            <p>We believe every pet deserves a loving home, and every family deserves the joy that a pet brings. Our team works tirelessly to ensure that each adoption is a perfect match for both the pet and their new family.</p>
        </div>
        <div class="about-image">
            <div class="image-placeholder">🏠</div>
        </div>
    </div>
    
    <div class="about-section reverse">
        <div class="about-text">
            <h2>Our Process</h2>
            <p>When a pet comes to Paws & Tails, they receive complete veterinary care including vaccinations, spay/neuter surgery, and any necessary medical treatment. Our behavior specialists work with each animal to address any issues and prepare them for life in a home.</p>
            <p>We carefully screen potential adopters to ensure our pets are going to safe, loving environments where they will thrive. Our adoption counselors work with you to find the perfect pet for your lifestyle and home.</p>
        </div>
        <div class="about-image">
            <div class="image-placeholder">❤️</div>
        </div>
    </div>
    
    <div class="team-section">
        <h2>Meet Our Team</h2>
        <div class="team-members">
            <div class="team-member card">
                <div class="member-image">
                    <div class="image-placeholder">👩‍⚕️</div>
                </div>
                <div class="card-body">
                    <h3>Dr. Sarah Johnson</h3>
                    <p class="member-role">Head Veterinarian</p>
                    <p>Sarah ensures all our pets are healthy and ready for their new homes.</p>
                </div>
            </div>
            
            <div class="team-member card">
                <div class="member-image">
                    <div class="image-placeholder">👨‍💼</div>
                </div>
                <div class="card-body">
                    <h3>Michael Chen</h3>
                    <p class="member-role">Adoption Coordinator</p>
                    <p>Michael matches pets with families and oversees the adoption process.</p>
                </div>
            </div>
            
            <div class="team-member card">
                <div class="member-image">
                    <div class="image-placeholder">👩‍🏫</div>
                </div>
                <div class="card-body">
                    <h3>Emily Rodriguez</h3>
                    <p class="member-role">Behavior Specialist</p>
                    <p>Emily works with our pets on socialization and training.</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="stats-section">
        <h2>By The Numbers</h2>
        <div class="stats-grid">
            <div class="stat-card card">
                <div class="stat-number">5,000+</div>
                <div class="stat-label">Pets Adopted</div>
            </div>
            <div class="stat-card card">
                <div class="stat-number">15</div>
                <div class="stat-label">Years of Service</div>
            </div>
            <div class="stat-card card">
                <div class="stat-number">200+</div>
                <div class="stat-label">Volunteers</div>
            </div>
            <div class="stat-card card">
                <div class="stat-number">98%</div>
                <div class="stat-label">Success Rate</div>
            </div>
        </div>
    </div>
</div>
@endsection