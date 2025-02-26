<div class="container-fluid hero-section ">
    <!-- Header Section -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold">
                HAARLEM FESTIVAL <span class="arrow">→</span> <span class="date">24 JULY</span>
            </h1>
        </div>
    </div>

    <!-- Cards Section -->
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="row g-4" id="cards-container"></div>
        </div>
    </div>

    <!-- Button Section -->
    <div class="row mt-5">
        <div class="col-12 text-center">
            <button class="btn btn-custom px-4 py-4">BUY TICKETS</button>
        </div>
    </div>
</div>

<script>
    const cardsData = [
        {
            title: "EXCITEMENT",
            text: "Never stop the fun! From soul-stirring jazz and dazzling dance performances to interactive activities. Let music, movement, and creativity ignite your spirit and fill your day with joy!"
        },
        {
            title: "CULTURE",
            text: "Celebrate Haarlem's rich heritage! Discover fascinating history and captivating stories brought to life through unique exhibitions and live performances. Explore city's cultural treasures!"
        },
        {
            title: "DELICIOUS",
            text: "A delicious journey! Taste the best local dishes, try amazing food from all over, and experience meals full of flavor and joy. Every bite is a celebration of good food and vibrant festival energy!"
        }
    ];

    const cardsContainer = document.getElementById("cards-container");
    cardsData.forEach(({ title, text }) => {
        const cardHTML = `
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h3 class="card-title">${title}</h3>
                        <p class="card-text">${text}</p>
                    </div>
                </div>
            </div>
        `;
        cardsContainer.innerHTML += cardHTML;
    });
</script>
