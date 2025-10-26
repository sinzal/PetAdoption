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

<style>
    .about-header {
        text-align: center;
        margin-bottom: 3rem;
    }
    
    .about-header h1 {
        color: var(--primary);
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }
    
    .about-section {
        display: flex;
        align-items: center;
        margin-bottom: 4rem;
        gap: 3rem;
    }
    
    .about-section.reverse {
        flex-direction: row-reverse;
    }
    
    .about-text {
        flex: 1;
    }
    
    .about-text h2 {
        color: var(--primary);
        margin-bottom: 1rem;
        font-size: 2rem;
    }
    
    .about-text p {
        margin-bottom: 1rem;
        line-height: 1.6;
    }
    
    .about-image {
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
    
    .team-section {
        margin-bottom: 4rem;
    }
    
    .team-section h2 {
        text-align: center;
        color: var(--primary);
        margin-bottom: 2rem;
        font-size: 2rem;
    }
    
    .team-members {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
    }
    
    .team-member {
        text-align: center;
    }
    
    .member-image {
        margin-bottom: 1rem;
    }
    
    .member-image .image-placeholder {
        font-size: 4rem;
        padding: 1.5rem;
    }
    
    .member-role {
        color: var(--secondary);
        font-weight: bold;
        margin-bottom: 1rem;
    }
    
    .stats-section h2 {
        text-align: center;
        color: var(--primary);
        margin-bottom: 2rem;
        font-size: 2rem;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
    }
    
    .stat-card {
        text-align: center;
        padding: 2rem 1rem;
    }
    
    .stat-number {
        font-size: 3rem;
        font-weight: bold;
        color: var(--primary);
        margin-bottom: 0.5rem;
    }
    
    .stat-label {
        font-size: 1.2rem;
        color: var(--text);
    }
    
    @media (max-width: 768px) {
        .about-section, .about-section.reverse {
            flex-direction: column;
        }
        
        .about-image {
            margin-top: 2rem;
        }
    }
</style>
@endsection