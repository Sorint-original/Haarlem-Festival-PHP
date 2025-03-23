<?php
$page_type = "history"; // This way we can set which color background is set in the header based on the page type
$slides = [ 
    'front slide 1.png',
    'front slide 2.png',
    'front slide 3.png',
    'front slide 4.png',
    'front slide 5.png'
];

$title = "History";
$fontColoring = 'fontCdark'; // This is how we define how the font should be colored based on the background
require(__DIR__ . "/../partials/header.php");
require(__DIR__ . "/../partials/slideshow.php");

// CSS styles
echo '<style>
    /* Background gradient for the history page */
    .history-background {
        background: linear-gradient(to right, #F7F4E9, #FF7A6D, #FF6B9E);
    }

    /* General styles */
    .flex {
        display: flex;
    }

    .overflow-hidden {
        overflow: hidden;
    }

    .flex-col {
        flex-direction: column;
    }

    .text-9xl {
        font-size: 6rem; /* Adjust as needed */
    }

    .text-4xl {
        font-size: 2.25rem; /* Adjust as needed */
    }

    .text-black {
        color: black;
    }

    .text-white {
        color: white;
    }

    .leading-[61px] {
        line-height: 61px;
    }

    .leading-5 {
        line-height: 1.25rem; /* Adjust as needed */
    }

    .mt-10 {
        margin-top: 2.5rem; /* Adjust as needed */
    }

    .mt-14 {
        margin-top: 3.5rem; /* Adjust as needed */
    }

    .mt-32 {
        margin-top: 8rem; /* Adjust as needed */
    }

    .mt-40 {
        margin-top: 10rem; /* Adjust as needed */
    }

    .mt-64 {
        margin-top: 16rem; /* Adjust as needed */
    }

    .px-16 {
        padding-left: 4rem; /* Adjust as needed */
        padding-right: 4rem; /* Adjust as needed */
    }

    .pb-28 {
        padding-bottom: 7rem; /* Adjust as needed */
    }

    .max-md\:px-5 {
        padding-left: 1.25rem; /* Adjust as needed */
        padding-right: 1.25rem; /* Adjust as needed */
    }

    .max-md\:mt-10 {
        margin-top: 2.5rem; /* Adjust as needed */
    }

    .max-md\:text-4xl {
        font-size: 2.25rem; /* Adjust as needed */
    }

    .w-full {
        width: 100%;
    }

    .w-[59%] {
        width: 59%;
    }

    .w-[41%] {
        width: 41%;
    }

    .w-[33%] {
        width: 33%;
    }

    .w-[46%] {
        width: 46%;
    }

    .object-contain {
        object-fit: contain;
    }

    .object-cover {
        object-fit: cover;
    }

    .rounded-lg {
        border-radius: 0.5rem; /* Adjust as needed */
    }

    .border-8 {
        border-width: 8px; /* Adjust as needed */
    }

    .border-yellow-600 {
        border-color: #d69e2e; /* Adjust as needed */
    }

    .min-h-56 {
        min-height: 14rem; /* Adjust as needed */
    }

    .min-w-60 {
        min-width: 15rem; /* Adjust as needed */
    }

    .text-center {
        text-align: center;
    }

    .text-stone-900 {
        color: #1f2937; /* Adjust as needed */
    }

    .text-neutral-500 {
        color: #6b7280; /* Adjust as needed */
    }

    .grow {
        flex-grow: 1;
    }

    .leading-tight {
        line-height: 1.25; /* Adjust as needed */
    }

    .tracking-tight {
        letter-spacing: -0.015em; /* Adjust as needed */
    }

    /* New class for the first map image */
    .first-map-image {
        width: 100%; /* Set to 100% of the container */
        max-width: 375px; /* Set a maximum width to increase size by 25% */
        height: auto; /* Maintain aspect ratio */
    }

    /* Class for the second map image */
    .second-map-image {
        width: 100%; /* Set to 100% of the container */
        max-width: 375px; /* Set a maximum width to increase size by 25% */
        height: auto; /* Maintain aspect ratio */
    }
</style>';

// Main content
echo '<div class="flex overflow-hidden flex-col history-background">
    <div class="flex relative flex-col px-16 w-full text-9xl text-center text-white min-h-[700px] max-md:px-5 max-md:pt-24 max-md:pb-28 max-md:max-w-full max-md:text-4xl">
        <!-- Content can go here -->
    </div>
    <div class="flex flex-col items-center px-9 mt-14 w-full max-md:px-5 max-md:mt-10 max-md:max-w-full">
        <div class="flex gap-5 max-md:flex-col">
            <div class="w-[59%] max-md:ml-0 max-md:w-full">
                <div class="text-4xl text-black leading-[61px] max-md:mt-10 max-md:max-w-full">
                    <span style="font-family: Merienda One, -apple-system, Roboto, Helvetica, sans-serif; font-size: 51px;">
                        The Story of Haarlem
                    </span>
                    <br />
                    Nestled along the banks of the Spaarne River, Haarlem\'s history stretches back over millennia. Archaeological findings reveal that the area was inhabited as early as 3600 years before our era, but it was during the medieval period that Haarlem truly began to flourish.
                    <br /><br />
                    <span style="font-family: Merienda One, -apple-system, Roboto, Helvetica, sans-serif; font-size: 46px; line-height: 50px;">
                        Timeline of Growth
                    </span>
                    <ul>
                        <li>Ancient Times: Early settlements around the Spaarne River</li>
                        <li>10th Century: First historical mention of Haarlem</li>
                        <li>12th Century: Becomes a fortified town and residence of the Counts of Holland</li>
                        <li>1245: Officially chartered as a city</li>
                        <li>14th Century: Development into a major trading center</li>
                        <li>16th-17th Century: Golden Age - flourishing of arts, culture, and commerce</li>
                    </ul>
                    <br />
                    <span style="font-family: Merienda One, -apple-system, Roboto, Helvetica, sans-serif; font-size: 46px; line-height: 50px;">
                        City of Innovation and Culture
                    </span>
                    <br />
                    Known by various nicknames throughout history:
                    <ul>
                        <li>Spaarnestad (Spaarne City) - for its location on the river</li>
                        <li>Bloemenstad (Flower City) - as the historical center of tulip cultivation</li>
                        <li>Art City - for its significant role in Dutch Golden Age painting</li>
                    </ul>
                    <br />
                    <span style="font-family: Merienda One, -apple-system, Roboto, Helvetica, sans-serif; font-size: 46px; line-height: 50px;">
                        Historical Significance
                    </span>
                    <br />
                    Haarlem played pivotal roles in:
                    <ul>
                        <li>Medieval Dutch commerce and politics</li>
                        <li>Development of printing and painting</li>
                        <li>Dutch tulip trade and horticulture</li>
                        <li>Beer brewing tradition since the 14th century</li>
                        <li>Religious history during the Reformation</li>
                    </ul>
                </div>
            </div>
            <div class="ml-5 w-[41%] max-md:ml-0 max-md:w-full">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/ecb13ad7d20e7218d8bada5e945037a2f4c6e077?placeholderIfAbsent=true&apiKey=6302e5c8c82a438b9c48016c50e62161" class="object-contain mt-5 first-map-image" />
            </div>
        </div>
    </div>
    <div class="mt-64 text-6xl leading-none text-black max-md:mt-10 max-md:max-w-full max-md:text-4xl">
        The Haarlem Tour:
    </div>
    <div class="mt-12 text-4xl text-center text-black leading-[61px] max-md:mt-10 max-md:max-w-full">
        Welcome to Haarlem, a city where history whispers through its cobblestone streets and every landmark tells a tale. Get ready to embark on an enchanting journey as we explore three of Haarlem\'s most significant sites, each brimming with cultural heritage and architectural splendor.
    </div>
    <div class="mt-48 w-full max-w-[1765px] max-md:mt-10 max-md:max-w-full" space="164">
        <div class="flex gap-5 max-md:flex-col">
            <div class="w-[33%] max-md:ml-0 max-md:w-full">
                <div class="flex flex-wrap grow gap-6 items-start px-6 pt-6 pb-10 w-full bg-white rounded-lg border-8 border-yellow-600 border-solid min-h-56 min-w-60 max-md:px-5 max-md:mt-10">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/34e462f2a6997b9257e414c0d724c6fa0c91960f?placeholderIfAbsent=true&apiKey=6302e5c8c82a438b9c48016c50e62161" class="object-contain shrink-0 w-40 aspect-square min-h-40 min-w-40" />
                    <div class="flex-1 shrink basis-0 min-w-40">
                        <div class="w-full">
                            <div class="text-2xl font-semibold tracking-tight leading-tight text-stone-900">St Bavokerk</div>
                            <div class="mt-2 text-base leading-6 text-neutral-500">You\'ll be captivated by the grandeur of this Gothic masterpiece, a cornerstone of Haarlem\'s spiritual life since the 13th century.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ml-5 w-[33%] max-md:ml-0 max-md:w-full">
                <div class="flex flex-wrap grow gap-6 items-start px-6 pt-6 pb-2.5 w-full bg-white rounded-lg border-8 border-yellow-600 border-solid min-h-56 min-w-60 max-md:px-5 max-md:mt-10">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/9b2bc57fd7720b1273d7f98e290c8b34bee923de?placeholderIfAbsent=true&apiKey=6302e5c8c82a438b9c48016c50e62161" class="object-contain shrink-0 w-40 aspect-square min-h-40 min-w-40" />
                    <div class="flex-1 shrink basis-0 min-w-40">
                        <div class="w-full">
                            <div class="text-2xl font-semibold tracking-tight leading-tight text-stone-900">Jopenkerk</div>
                            <div class="mt-2 text-base leading-6 text-neutral-500">A former church that has been transformed into a lively brewery. Here, you\'ll experience Haarlem\'s brewing tradition firsthand and enjoy a refreshing break amidst its unique ambiance.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ml-5 w-[33%] max-md:ml-0 max-md:w-full">
                <div class="flex flex-wrap grow gap-6 items-start px-6 pt-6 pb-10 w-full bg-white rounded-lg border-8 border-yellow-600 border-solid min-h-56 min-w-60 max-md:px-5 max-md:mt-10">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/79f46310479b807a6f7d3a04ca618f34d5085448?placeholderIfAbsent=true&apiKey=6302e5c8c82a438b9c48016c50e62161" class="object-contain shrink-0 w-40 aspect-square min-h-40 min-w-40" />
                    <div class="flex-1 shrink basis-0 min-w-40">
                        <div class="w-full">
                            <div class="text-2xl font-semibold tracking-tight leading-tight text-stone-900">Molen De Adriaan</div>
                            <div class="mt-2 text-base leading-6 text-neutral-500">It stands as a testament to the city\'s industrious spirit. Ascend to its viewing platform for breathtaking views of Haarlem and learn about the vital role this windmill played in the community\'s history.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-40 text-5xl leading-none text-black max-md:mt-10 max-md:text-4xl">
        Tour tickets
    </div>
    <div class="flex flex-col pl-6 mt-7 w-full max-md:pl-5 max-md:max-w-full">
        <div class="text-4xl text-black leading-[61px] w-[1258px] max-md:max-w-full">
            <span style="font-family: Merienda One, -apple-system, Roboto, Helvetica, sans-serif; font-size: 30px;">
                Experience the Heart of Haarlem: Book Your Tour Today!
            </span>
            <br />
            Step into a world where history comes alive! Join us for an unforgettable journey through the enchanting streets of Haarlem, where each landmark tells a story and every moment is steeped in culture.
            <br />
        </div>
        <div class="z-10 max-md:max-w-full" space="33">
            <div class="flex gap-5 max-md:flex-col max-md:">
                <div class="w-[54%] max-md:ml-0 max-md:w-full">
                    <div class="text-4xl text-black leading-[61px] max-md:mt-8 max-md:max-w-full">
                        <br />
                        <span style="font-family: Merienda One, -apple-system, Roboto, Helvetica, sans-serif; font-size: 30px;">
                            Why Choose Our Tour?
                        </span>
                        <ul>
                            <li>Explore Iconic Landmarks: Visit the breathtaking St. Bavo Church, a masterpiece of Gothic architecture, and discover the rich history behind its magnificent walls.</li>
                            <li>Savor Local Brews: Take a break at Jopenkerk, a unique brewery housed in a former church, and indulge in the flavors of Haarlem\'s brewing heritage.</li>
                            <li>Marvel at Historic Windmills: Conclude your adventure at Molen de Adriaan, where you\'ll enjoy stunning views and learn about the city\'s industrious past.</li>
                        </ul>
                        <br />
                        <span style="font-family: Merienda One, -apple-system, Roboto, Helvetica, sans-serif; font-size: 30px;">
                            What Awaits You:
                        </span>
                        <ul>
                            <li>Expert guides sharing captivating stories and insights</li>
                            <li>A friendly atmosphere filled with fellow history enthusiasts</li>
                            <li>The chance to create lasting memories in one of the Netherlands\' most charming cities</li>
                        </ul>
                        <br />
                    </div>
                </div>
                <div class="ml-5 w-[46%] max-md:ml-0 max-md:w-full">
                    <div class="flex relative flex-col justify-center items-center px-20 pb-96 mt-6 min-h-[941px] max-md:px-5 max-md:mt-10 max-md:max-w-full">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/b418c461d3b5cde3a61a74bde4cfa13d0d182744?placeholderIfAbsent=true&apiKey=6302e5c8c82a438b9c48016c50e62161" class="object-contain mt-5 first-map-image" />
                    </div>
                </div>
            </div>
        </div>
        <div class="self-center mt-0 text-4xl text-center text-black leading-[61px] w-[1551px] max-md:max-w-full">
            Don\'t miss out on this incredible opportunity to immerse yourself in Haarlem\'s cultural tapestry.
            <br />
            Spaces are limited, and tours fill up quickly! Click the button below to secure your spot and embark on a journey through time.
        </div>
        <div class="self-center mt-14 max-w-full w-[721px] max-md:mt-10" space="58">
            <div class="flex gap-5 max-md:flex-col max-md:">
                <div class="w-6/12 max-md:ml-0 max-md:w-full">
                    <div class="grow text-xl leading-5 text-black max-md:mt-10"></div>
                </div>
                <div class="ml-5 w-6/12 max-md:ml-0 max-md:w-full">
                    <div class="grow text-xl leading-5 text-center text-black max-md:mt-10"></div>
                </div>
            </div>
        </div>
    </div>
</div>';

require(__DIR__ . "/../partials/footer.php");
?>