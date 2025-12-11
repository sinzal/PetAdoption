<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Paws & Tails Adoption Center</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="welcome-container">
            <div class="welcome-header">
                <h1>🐾 Paws & Tails</h1>
                <p class="welcome-subtitle">Find Your Forever Friend</p>
            </div>

            <div class="welcome-content">
                <div class="welcome-hero">
                    <h2>Welcome to Our Pet Adoption Center</h2>
                    <p>Discover your perfect companion from our loving pets waiting for their forever homes.</p>
                    <div class="welcome-actions">
                        <a href="{{ route('home') }}" class="btn btn-primary">Enter Site</a>
                        <a href="{{ route('adoption') }}" class="btn btn-secondary">Browse Pets</a>
                    </div>
                </div>

                <div class="welcome-features">
                    <div class="feature-card">
                        <div class="feature-icon">🐶</div>
                        <h3>Dogs</h3>
                        <p>Loving canine companions of all sizes</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">🐱</div>
                        <h3>Cats</h3>
                        <p>Playful and affectionate feline friends</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">🐰</div>
                        <h3>Small Pets</h3>
                        <p>Rabbits, guinea pigs, and other small animals</p>
                    </div>
                </div>
            </div>

            <div class="welcome-footer">
                <p>&copy; {{ date('Y') }} Paws & Tails Adoption Center</p>
                <p>Making happy families, one adoption at a time</p>
            </div>
        </div>

        <style>
            .welcome-container {
                min-height: 100vh;
                background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 2rem;
                color: white;
                text-align: center;
            }

            .welcome-header h1 {
                font-size: 3rem;
                margin-bottom: 0.5rem;
                text-shadow: 2px 2px 0px rgba(0, 0, 0, 0.1);
            }

            .welcome-subtitle {
                font-size: 1.5rem;
                opacity: 0.9;
                margin-bottom: 3rem;
            }

            .welcome-hero {
                margin-bottom: 4rem;
            }

            .welcome-hero h2 {
                font-size: 2.5rem;
                margin-bottom: 1rem;
            }

            .welcome-hero p {
                font-size: 1.3rem;
                margin-bottom: 2rem;
                opacity: 0.9;
            }

            .welcome-actions {
                display: flex;
                gap: 1rem;
                justify-content: center;
                flex-wrap: wrap;
            }

            .welcome-features {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 2rem;
                margin-bottom: 3rem;
                max-width: 800px;
            }

            .feature-card {
                background: rgba(255, 255, 255, 0.1);
                padding: 2rem;
                border-radius: 15px;
                backdrop-filter: blur(10px);
            }

            .feature-icon {
                font-size: 3rem;
                margin-bottom: 1rem;
            }

            .feature-card h3 {
                margin-bottom: 0.5rem;
                font-size: 1.5rem;
            }

            .welcome-footer {
                margin-top: 2rem;
                opacity: 0.8;
            }

            @media (max-width: 768px) {
                .welcome-header h1 {
                    font-size: 2.5rem;
                }

                .welcome-hero h2 {
                    font-size: 2rem;
                }

                .welcome-features {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    </body>
</html>