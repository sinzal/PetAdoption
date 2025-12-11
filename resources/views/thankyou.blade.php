@extends('layout')

@section('content')
<div class="thankyou-container">
    <div class="thankyou-header">
        <div class="success-animation">
            <div class="success-checkmark">
                <div class="check-icon">
                    <span class="icon-line line-tip"></span>
                    <span class="icon-line line-long"></span>
                    <div class="icon-circle"></div>
                    <div class="icon-fix"></div>
                </div>
            </div>
        </div>
        <h1>Thank You for Your Adoption!</h1>
        <p class="subtitle">Your application has been received and is being reviewed</p>
    </div>

    <div class="thankyou-content">
        <div class="next-steps card">
            <div class="card-header">
                <h2>What Happens Next?</h2>
            </div>
            <div class="card-body">
                <div class="steps-timeline">
                    <div class="step">
                        <div class="step-icon">📧</div>
                        <h3>Application Review</h3>
                        <p>We'll review your application within 24-48 hours</p>
                    </div>
                    <div class="step">
                        <div class="step-icon">📞</div>
                        <h3>Phone Interview</h3>
                        <p>We'll call you to discuss your application and answer questions</p>
                    </div>
                    <div class="step">
                        <div class="step-icon">🏠</div>
                        <h3>Home Check (If Required)</h3>
                        <p>Some pets may require a quick home safety check</p>
                    </div>
                    <div class="step">
                        <div class="step-icon">🐾</div>
                        <h3>Meet & Greet</h3>
                        <p>You'll meet your potential new family member</p>
                    </div>
                    <div class="step">
                        <div class="step-icon">🎉</div>
                        <h3>Adoption Finalization</h3>
                        <p>Complete paperwork and bring your new friend home!</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="feedback-section">
            <div class="feedback-form card">
                <div class="card-header">
                    <h2>Share Your Experience</h2>
                </div>
                <div class="card-body">
                    <p>We'd love to hear about your adoption experience with Paws & Tails</p>
                    
                    <form id="feedback-form">
                        <div class="form-group">
                            <label for="user-name">Your Name (Optional)</label>
                            <input type="text" id="user-name" name="user_name" placeholder="Enter your name">
                        </div>
                        
                        <div class="form-group">
                            <label>Overall Rating</label>
                            <div class="rating-stars">
                                <input type="radio" id="star5" name="rating" value="5">
                                <label for="star5">⭐</label>
                                <input type="radio" id="star4" name="rating" value="4">
                                <label for="star4">⭐</label>
                                <input type="radio" id="star3" name="rating" value="3">
                                <label for="star3">⭐</label>
                                <input type="radio" id="star2" name="rating" value="2">
                                <label for="star2">⭐</label>
                                <input type="radio" id="star1" name="rating" value="1">
                                <label for="star1">⭐</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="feedback">Your Feedback</label>
                            <textarea id="feedback" name="feedback" rows="4" placeholder="Tell us about your experience with our adoption process..." required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="pet-name">Which pet did you apply for? (Optional)</label>
                            <input type="text" id="pet-name" name="pet_name" placeholder="Pet's name">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit Feedback</button>
                    </form>
                </div>
            </div>

            <div class="previous-feedbacks card">
                <div class="card-header">
                    <h2>What Other Adopters Say</h2>
                </div>
                <div class="card-body">
                    <div class="feedbacks-list" id="feedbacks-list">
                        <!-- Feedback items will be loaded here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="action-buttons">
        <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
        <a href="{{ route('adoption') }}" class="btn btn-secondary">Adopt Another Pet</a>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sample feedback data
        const sampleFeedbacks = [
            {
                id: 1,
                user: "Sarah M.",
                rating: 5,
                pet: "Adopted Max the Beagle",
                feedback: "The adoption process was smooth and the staff was incredibly helpful. Max has settled in perfectly with our family!",
                date: "2 weeks ago"
            },
            {
                id: 2,
                user: "James T.",
                rating: 4,
                pet: "Adopted Luna the Cat",
                feedback: "Great experience overall. The follow-up care advice was very useful. Luna is the perfect addition to our home.",
                date: "1 month ago"
            },
            {
                id: 3,
                user: "The Johnson Family",
                rating: 5,
                pet: "Adopted Buddy the Golden Retriever",
                feedback: "We couldn't be happier! Buddy is exactly what our family needed. The adoption counselors really took the time to match us with the right pet.",
                date: "3 months ago"
            },
            {
                id: 4,
                user: "Emily R.",
                rating: 5,
                pet: "Adopted Thumper the Rabbit",
                feedback: "As a first-time pet owner, I appreciated all the guidance. Thumper is healthy, happy, and brings so much joy to my life!",
                date: "2 months ago"
            }
        ];
        
        // Load feedbacks from localStorage or use sample data
        let allFeedbacks = JSON.parse(localStorage.getItem('pawsAndTailsFeedbacks')) || sampleFeedbacks;
        
        // Display feedbacks
        function displayFeedbacks() {
            const feedbacksList = document.getElementById('feedbacks-list');
            feedbacksList.innerHTML = '';
            
            allFeedbacks.forEach(feedback => {
                const feedbackItem = document.createElement('div');
                feedbackItem.className = 'feedback-item';
                
                // Create star rating display
                let stars = '';
                for (let i = 0; i < 5; i++) {
                    if (i < feedback.rating) {
                        stars += '⭐';
                    } else {
                        stars += '☆';
                    }
                }
                
                feedbackItem.innerHTML = `
                    <div class="feedback-header">
                        <div class="feedback-user">${feedback.user}</div>
                        <div class="feedback-rating">${stars}</div>
                    </div>
                    <div class="feedback-pet">${feedback.pet}</div>
                    <div class="feedback-text">${feedback.feedback}</div>
                    <div class="feedback-date">${feedback.date}</div>
                `;
                
                feedbacksList.appendChild(feedbackItem);
            });
        }
        
        // Handle feedback form submission
        document.getElementById('feedback-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const userName = formData.get('user_name') || 'Anonymous';
            const rating = formData.get('rating');
            const feedbackText = formData.get('feedback');
            const petName = formData.get('pet_name');
            
            if (!rating) {
                alert('Please provide a rating');
                return;
            }
            
            if (!feedbackText.trim()) {
                alert('Please provide your feedback');
                return;
            }
            
            // Create new feedback object
            const newFeedback = {
                id: allFeedbacks.length + 1,
                user: userName,
                rating: parseInt(rating),
                pet: petName ? `Applied for ${petName}` : 'Pet adoption',
                feedback: feedbackText,
                date: 'Just now'
            };
            
            // Add to feedbacks array
            allFeedbacks.unshift(newFeedback);
            
            // Save to localStorage
            localStorage.setItem('pawsAndTailsFeedbacks', JSON.stringify(allFeedbacks));
            
            // Update display
            displayFeedbacks();
            
            // Reset form
            this.reset();
            
            // Show success message
            showFeedbackSuccess();
        });
        
        // Show feedback submission success
        function showFeedbackSuccess() {
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 100px;
                right: 20px;
                background: var(--accent);
                color: var(--text);
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
                <span style="font-size: 1.5rem;">💕</span>
                <div>
                    <strong>Thank you!</strong> Your feedback has been submitted.
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
        
        // Initialize the page
        displayFeedbacks();
        
        // Update cart count (should be 0 after checkout)
        updateCartCount();
        
        function updateCartCount() {
            const cartCount = document.querySelector('.cart-count');
            cartCount.textContent = '0';
        }
    });
</script>
@endsection
@endsection