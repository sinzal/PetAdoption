@extends('layout')

@section('content')
<div class="adoption-header">
    <h1>Find Your New Best Friend</h1>
    <p>All our pets are looking for loving forever homes</p>
</div>

<div class="search-section">
    <div class="form-group">
        <label for="pet-search">Search by Name or Breed:</label>
        <div class="search-wrapper">
            <input type="text" id="pet-search" placeholder="Search pets by name or breed...">
            <div id="search-results" class="search-results-dropdown"></div>
        </div>
    </div>
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

<div class="pets-grid" id="pets-container">
    @foreach($pets as $pet)
    <div class="pet-card card">
        <div class="pet-image">
            @if($pet->image_url)
                <img src="{{ $pet->image_url }}" class="pet-img" alt="{{ $pet->name }}">
            @else
                <div class="pet-placeholder">🐾</div>
            @endif
        </div>

        <div class="card-body">
            <h3>{{ $pet->name }}</h3>
            <p>{{ $pet->breed }}</p>
            <p>{{ $pet->age }} old</p>
            <p>{{ $pet->description }}</p>
            <div class="pet-price">${{ $pet->price }}</div>

            <button class="btn btn-primary add-to-cart"
                data-pet-id="{{ $pet->id }}"
                data-pet-name="{{ $pet->name }}"
                data-pet-price="{{ $pet->price }}"
                data-pet-type="{{ $pet->type }}">
                Add to Adoption Cart
            </button>

            <button type="button" class="btn btn-primary" onclick="window.location.href='{{ url('/productdetail1/' . $pet->id) }}'">
                View The Pet
            </button>
        </div>
    </div>
    @endforeach
</div>

@endsection


@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('pet-search');
    const filterSelect = document.getElementById('pet-filter');
    const petsContainer = document.getElementById('pets-container');
    const searchResults = document.getElementById('search-results');

    function debounce(func, delay) {
        let timeout;
        return function (...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), delay);
        };
    }

    // 🔥 AJAX Search Function
    function fetchPets() {
        let name = searchInput.value.trim();
        let type = filterSelect.value;

        fetch(`{{ route('pets.search') }}?name=${name}&type=${type}`)
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    petsContainer.innerHTML = data.html;

                    // Remove dropdown if empty
                    if (!name) searchResults.style.display = 'none';

                    // Fill dropdown (top 5 suggestions)
                    fetchDropdown(name, type);
                }
            });
    }

    // 🔥 AJAX dropdown results (top 5)
    function fetchDropdown(name, type) {
        if (!name) {
            searchResults.innerHTML = '';
            searchResults.style.display = 'none';
            return;
        }

        fetch(`{{ route('pets.search') }}?name=${name}&type=${type}`)
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    let parser = new DOMParser();
                    let htmlDoc = parser.parseFromString(data.html, "text/html");
                    let petCards = htmlDoc.querySelectorAll(".pet-card");

                    searchResults.innerHTML = "";
                    petCards.forEach((card, index) => {
                        if (index >= 5) return;

                        let petName = card.querySelector("h3").innerText;
                        let petBreed = card.querySelector("p").innerText;
                        let petId = card.querySelector(".add-to-cart").dataset.petId;

                        let item = document.createElement("div");
                        item.classList.add("search-result-item");
                        item.innerHTML = `
                            <strong>${petName}</strong><br>
                            <small>${petBreed}</small>
                        `;
                        item.onclick = () => window.location.href = `/productdetail1/${petId}`;

                        searchResults.appendChild(item);
                    });

                    searchResults.style.display = petCards.length ? "block" : "none";
                }
            });
    }

    // Events
    searchInput.addEventListener("input", debounce(fetchPets, 300));
    filterSelect.addEventListener("change", fetchPets);

    // Hide dropdown when clicking outside
    document.addEventListener("click", (e) => {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.style.display = "none";
        }
    });

});
</script>

<style>
/* Existing Search Styles */
.search-section {
    margin: 2rem auto;
    max-width: 600px;
}

.search-wrapper {
    position: relative;
}

#pet-search {
    width: 100%;
    padding: 12px 20px;
    border-radius: 30px;
    border: 2px solid #ddd;
    font-size: 16px;
}

.search-results-dropdown {
    display: none;
    position: absolute;
    top: 105%;
    left: 0;
    right: 0;
    background: white;
    border: 1px solid #ddd;
    border-radius: 10px;
    max-height: 250px;
    overflow-y: auto;
    z-index: 1000;
}

.search-result-item {
    padding: 12px;
    cursor: pointer;
    border-bottom: 1px solid #f0f0f0;
}

.search-result-item:hover {
    background: #f5f5f5;
}

/* --- PET CARD STYLING (UPDATED FOR ALIGNMENT AND LIGHTER PINK) --- */

.pets-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 30px; /* Space between cards */
    justify-content: center; /* Center cards horizontally */
    padding: 20px;
}

.pet-card {
    flex: 0 0 calc(33.333% - 20px); /* Approx 3 cards per row with gap */
    max-width: 300px; /* Set a max width for better control */
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    display: flex; /* Make card a flex container */
    flex-direction: column; /* Stack image and body */
}

.pet-image {
    width: 100%;
    height: 200px; /* Fixed height for image container */
    overflow: hidden;
}

.pet-img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures image covers the area without distortion */
}

/* CRITICAL: Flexbox for Card Body to push buttons to the bottom */
.card-body {
    padding: 15px;
    display: flex; /* Make card-body a flex container */
    flex-direction: column; /* Stack items vertically */
    flex-grow: 1; /* Allow card-body to take up available vertical space */
    min-height: 200px; /* Give the body a minimum height to standardize a bit */
}

.card-body h3 {
    color: #ffb6c1; /* Lighter Pink for name */
    margin-top: 0;
}

.card-body p {
    margin-bottom: 5px;
}

.pet-price {
    font-size: 1.5em;
    color: #333;
    font-weight: bold;
    margin: 10px 0 15px;
}

/* This targets the dynamic content before the buttons and uses auto-margin 
   to push the buttons to the bottom of the flex container (card-body) */
.card-body > p:nth-last-child(3),
.card-body .pet-price {
    margin-bottom: auto; 
}


/* Styling the buttons */
.card-body button {
    width: 100%;
    padding: 10px;
    margin-top: 10px; /* Space between buttons */
    border-radius: 30px;
    font-size: 16px;
    cursor: pointer;
    text-transform: uppercase;
    font-weight: 600;
}

/* Lighter Pink button style */
.btn-primary {
    background-color: #ffb6c1; /* Light Pink */
    border: 2px solid #ffb6c1;
    color: white; /* Keep text white for contrast */
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #ffc8d2; /* Slightly lighter pink on hover */
    border-color: #ffc8d2;
}
</style>
@endsection