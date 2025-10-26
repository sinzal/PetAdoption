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

<style>
    .thankyou-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 2rem;
    }
    
    .thankyou-header {
        text-align: center;
        margin-bottom: 3rem;
        padding: 2rem;
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        border-radius: 20px;
        color: white;
    }
    
    .thankyou-header h1 {
        font-size: 2.8rem;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 0px rgba(0, 0, 0, 0.1);
    }
    
    .subtitle {
        font-size: 1.3rem;
        opacity: 0.9;
    }
    
    /* Success Animation */
    .success-animation {
        margin: 0 auto 2rem;
        width: 80px;
        height: 80px;
    }
    
    .success-checkmark {
        width: 80px;
        height: 80px;
        margin: 0 auto;
    }
    
    .check-icon {
        width: 80px;
        height: 80px;
        position: relative;
        border-radius: 50%;
        box-sizing: content-box;
        border: 4px solid white;
    }
    
    .check-icon::before {
        top: 3px;
        left: -2px;
        width: 30px;
        transform-origin: 100% 50%;
        border-radius: 100px 0 0 100px;
    }
    
    .check-icon::after {
        top: 0;
        left: 30px;
        width: 60px;
        transform-origin: 0 50%;
        border-radius: 0 100px 100px 0;
        animation: rotate-circle 4.25s ease-in;
    }
    
    .check-icon::before, .check-icon::after {
        content: '';
        height: 100px;
        position: absolute;
        background: transparent;
        transform: rotate(-45deg);
    }
    
    .icon-line {
        height: 5px;
        background-color: white;
        display: block;
        border-radius: 2px;
        position: absolute;
        z-index: 10;
    }
    
    .icon-line.line-tip {
        top: 46px;
        left: 14px;
        width: 25px;
        transform: rotate(45deg);
        animation: icon-line-tip 0.75s;
    }
    
    .icon-line.line-long {
        top: 38px;
        right: 8px;
        width: 47px;
        transform: rotate(-45deg);
        animation: icon-line-long 0.75s;
    }
    
    .icon-circle {
        top: -4px;
        left: -4px;
        z-index: 10;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        position: absolute;
        box-sizing: content-box;
        border: 4px solid rgba(255, 255, 255, 0.5);
    }
    
    .icon-fix {
        top: 8px;
        width: 5px;
        left: 26px;
        z-index: 1;
        height: 85px;
        position: absolute;
        transform: rotate(-45deg);
        background-color: transparent;
    }
    
    @keyframes rotate-circle {
        0% { transform: rotate(-45deg); }
        5% { transform: rotate(-45deg); }
        12% { transform: rotate(-405deg); }
        100% { transform: rotate(-405deg); }
    }
    
    @keyframes icon-line-tip {
        0% { width: 0; left: 1px; top: 19px; }
        54% { width: 0; left: 1px; top: 19px; }
        70% { width: 50px; left: -8px; top: 37px; }
        84% { width: 17px; left: 21px; top: 48px; }
        100% { width: 25px; left: 14px; top: 45px; }
    }
    
    @keyframes icon-line-long {
        0% { width: 0; right: 46px; top: 54px; }
        65% { width: 0; right: 46px; top: 54px; }
        84% { width: 55px; right: 0px; top: 35px; }
        100% { width: 47px; right: 8px; top: 38px; }
    }
    
    .thankyou-content {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
        margin-bottom: 3rem;
    }
    
    .steps-timeline {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 1.5rem;
    }
    
    .step {
        text-align: center;
        padding: 1rem;
    }
    
    .step-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }
    
    .step h3 {
        color: var(--primary);
        margin-bottom: 0.5rem;
        font-size: 1.2rem;
    }
    
    .step p {
        color: #666;
        font-size: 0.9rem;
        line-height: 1.4;
    }
    
    .feedback-section {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
    }
    
    .rating-stars {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
        gap: 5px;
    }
    
    .rating-stars input {
        display: none;
    }
    
    .rating-stars label {
        cursor: pointer;
        font-size: 2rem;
        color: #ddd;
        transition: color 0.2s;
    }
    
    .rating-stars input:checked ~ label,
    .rating-stars label:hover,
    .rating-stars label:hover ~ label {
        color: #ffc107;
    }
    
    .rating-stars input:checked + label {
        color: #ffc107;
    }
    
    .feedback-item {
        padding: 1.5rem;
        border-bottom: 1px solid #eee;
    }
    
    .feedback-item:last-child {
        border-bottom: none;
    }
    
    .feedback-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.5rem;
    }
    
    .feedback-user {
        font-weight: bold;
        color: var(--primary);
    }
    
    .feedback-rating {
        color: #ffc107;
        font-size: 1.2rem;
    }
    
    .feedback-pet {
        font-style: italic;
        color: #666;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }
    
    .feedback-text {
        line-height: 1.5;
        color: #555;
    }
    
    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 1rem;
        flex-wrap: wrap;
    }
    
    .btn-secondary {
        background-color: var(--accent);
        color: var(--text);
    }
    
    .btn-secondary:hover {
        background-color: #7de87d;
    }
    
    @media (max-width: 768px) {
        .feedback-section {
            grid-template-columns: 1fr;
        }
        
        .steps-timeline {
            grid-template-columns: 1fr;
        }
        
        .thankyou-header h1 {
            font-size: 2.2rem;
        }
        
        .action-buttons {
            flex-direction: column;
        }
        
        .action-buttons .btn {
            width: 100%;
            text-align: center;
        }
    }
</style>

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