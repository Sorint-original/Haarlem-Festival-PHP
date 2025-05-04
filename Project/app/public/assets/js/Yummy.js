document.addEventListener('DOMContentLoaded', function() {
    // Function to load page content
    function loadPageContent() {
        fetch('/yummy/get-page')
            .then(response => response.json())
            .then(data => {
                // Update the header
                document.querySelector('.display-3').textContent = data.header;
                // Update the main text
                document.querySelector('.h3').textContent = data.text;
                // Update the note
                document.querySelector('.note-box strong').nextSibling.textContent = ' ' + data.note;
            })
            .catch(error => console.error('Error:', error));
    }

    // Carousel state
    let restaurants = [];
    let currentIndex = 0;
    let visibleCards = getVisibleCards();

    // DOM elements
    const carousel = document.getElementById('restaurant-carousel');
    const pagination = document.getElementById('carousel-pagination');
    const leftArrow = document.querySelector('.carousel-arrow.left');
    const rightArrow = document.querySelector('.carousel-arrow.right');
    const filterButtons = document.querySelectorAll('.btn-filter');

    // Responsive: determine how many cards to show
    function getVisibleCards() {
        if (window.innerWidth < 600) return 1;
        if (window.innerWidth < 900) return 2;
        if (window.innerWidth < 1200) return 3;
        return 4;
    }

    window.addEventListener('resize', () => {
        visibleCards = getVisibleCards();
        // Clamp currentIndex if needed
        if (currentIndex > restaurants.length - visibleCards) {
            currentIndex = Math.max(0, restaurants.length - visibleCards);
        }
        renderCarousel();
        renderPagination();
    });

    // Fetch restaurants
    function fetchRestaurants(cuisine = 'all') {
        let url = '/restaurants';
        if (cuisine !== 'all') {
            url += '?cuisine=' + encodeURIComponent(cuisine);
        }
        fetch(url)
            .then(res => res.json())
            .then(data => {
                restaurants = data;
                currentIndex = 0;
                renderCarousel();
                renderPagination();
            })
            .catch(err => console.error('Error fetching restaurants:', err));
    }

    // Render restaurant cards for current view
    function renderCarousel() {
        carousel.innerHTML = '';
        carousel.style.display = 'flex';
        carousel.style.overflow = 'hidden';
        carousel.style.flexWrap = 'nowrap';
        const end = Math.min(currentIndex + visibleCards, restaurants.length);
        for (let i = currentIndex; i < end; i++) {
            carousel.appendChild(createRestaurantCard(restaurants[i]));
        }
        updateArrows();
    }

    // Create a restaurant card element
    function createRestaurantCard(r) {
        const card = document.createElement('div');
        card.className = 'restaurant-card text-center m-3';
        card.style.width = '320px';
        card.style.height = '600px';
        card.style.flex = '0 0 auto';
        card.innerHTML = `
            <div class="restaurant-image mb-2">
                <img src="${r.image || '/assets/images/placeholder.png'}" alt="${r.name}" style="width:320px;height:320px;object-fit:cover;border-radius:16px;">
            </div>
            <div class="restaurant-name" style="font-family: 'Merienda One', cursive; font-size: 2rem;">${r.name}</div>
            <div class="restaurant-rating mb-1">
                <span style="font-size:1.2rem;">${r.rating || 0}</span>
                <span style="color:gold;">&#9733;</span>
                <span style="color:#888;">${r.reviewCount || 0} reviews</span>
            </div>
            <div class="restaurant-cuisines mb-1">${Array.isArray(r.cuisineTypes) ? r.cuisineTypes.join(',') : (r.cuisineTypes || '')}</div>
            <div class="restaurant-price mb-1">€${r.price || 'N/A'}</div>
        `;
        return card;
    }

    // Render pagination dots
    function renderPagination() {
        pagination.innerHTML = '';
        const pageCount = Math.max(1, restaurants.length - visibleCards + 1);
        for (let i = 0; i < pageCount; i++) {
            const dot = document.createElement('span');
            dot.className = 'carousel-dot';
            dot.style.cursor = 'pointer';
            dot.style.fontSize = '2rem';
            dot.style.margin = '0 4px';
            dot.style.color = (i === currentIndex) ? '#222' : '#fff';
            dot.style.background = (i === currentIndex) ? '#222' : '#fff';
            dot.style.borderRadius = '50%';
            dot.style.border = '1px solid #222';
            dot.style.width = '18px';
            dot.style.height = '18px';
            dot.style.display = 'inline-block';
            dot.addEventListener('click', () => {
                currentIndex = i;
                renderCarousel();
                renderPagination();
            });
            pagination.appendChild(dot);
        }
    }

    // Update arrow button states
    function updateArrows() {
        leftArrow.disabled = currentIndex === 0;
        rightArrow.disabled = currentIndex >= restaurants.length - visibleCards;
    }

    // Event listeners
    leftArrow.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            renderCarousel();
            renderPagination();
        }
    });
    rightArrow.addEventListener('click', () => {
        if (currentIndex < restaurants.length - visibleCards) {
            currentIndex++;
            renderCarousel();
            renderPagination();
        }
    });
    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            filterButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            fetchRestaurants(btn.getAttribute('data-cuisine'));
        });
    });

    // Initial load
    loadPageContent();
    fetchRestaurants();
}); 