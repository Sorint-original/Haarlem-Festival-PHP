<?php
$page_type = "history"; #this way we can set which color backround is set in the header based on the page type
$slides = [ 
    'front slide 1.png',
    'front slide 2.png',
    'front slide 3.png',
    'front slide 4.png',
    'front slide 5.png'
];

$title = "History";


$fontColoring = 'fontCdark'; #this is how we define how the font should be colored based on the background
require(__DIR__ . "/../partials/header.php");
require(__DIR__ . "/../partials/slideshow.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haarlem Festival - History</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merienda+One&display=swap" rel="stylesheet">
</head>
<body>
    <div class="flex overflow-hidden flex-col bg-[linear-gradient(330deg,#C17F59_36.35%,#E6D7C3_82.26%)]">
      <div class="flex relative flex-col px-16 w-full text-9xl text-center text-white min-h-[700px] max-md:px-5 max-md:pt-24 max-md:pb-28 max-md:max-w-full max-md:text-4xl">

      </div>
      <div class="flex flex-col items-center px-9 mt-14 w-full max-md:px-5 max-md:mt-10 max-md:max-w-full">
          <div class="flex gap-5 max-md:flex-col max-md:">
            <div
              class="w-[59%] max-md:ml-0 max-md:w-full"
            >
              <div
                class="text-4xl text-black leading-[61px] max-md:mt-10 max-md:max-w-full"
              >
                <span style="font-family: Merienda One, -apple-system, Roboto, Helvetica, sans-serif; font-size: 51px;">
                  The Story of Haarlem
                </span>
                <br />
                Nestled along the banks of the Spaarne River, Haarlem's history
                stretches back over millennia. Archaeological findings reveal
                that the area was inhabited as early as 3600 years before our
                era, but it was during the medieval period that Haarlem truly
                began to flourish.
                <br />
                <br />
                <span style="font-family: Merienda One, -apple-system, Roboto, Helvetica, sans-serif; font-size: 46px; line-height: 50px;">
                  Timeline of Growth
                </span>
                <ul>
                  <li>
                    Ancient Times: Early settlements around the Spaarne River
                  </li>
                  <li>10th Century: First historical mention of Haarlem</li>
                  <li>
                    12th Century: Becomes a fortified town and residence of the
                    Counts of Holland
                  </li>
                  <li>1245: Officially chartered as a city</li>
                  <li>14th Century: Development into a major trading center</li>
                  <li>
                    16th-17th Century: Golden Age - flourishing of arts,
                    culture, and commerce
                  </li>
                </ul>
                <br />
                <span style="font-family: Merienda One, -apple-system, Roboto, Helvetica, sans-serif; font-size: 46px; line-height: 50px;">
                  City of Innovation and Culture
                </span>
                <br />
                Known by various nicknames throughout history:
                <ul>
                  <li>
                    Spaarnestad (Spaarne City) - for its location on the river
                  </li>
                  <li>
                    Bloemenstad (Flower City) - as the historical center of
                    tulip cultivation
                  </li>
                  <li>
                    Art City - for its significant role in Dutch Golden Age
                    painting
                  </li>
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
            <div
              class="ml-5 w-[41%] max-md:ml-0 max-md:w-full"
            >
              <img
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/ecb13ad7d20e7218d8bada5e945037a2f4c6e077?placeholderIfAbsent=true&apiKey=6302e5c8c82a438b9c48016c50e62161"
                class="object-contain mt-5 w-full aspect-[1.35] max-md:mt-10 max-md:max-w-full"
              />
            </div>
          </div>
        </div>
        <div
          class="mt-64 text-6xl leading-none text-black max-md:mt-10 max-md:max-w-full max-md:text-4xl"
        >
          The Haarlem Tour:
        </div>
        <div
          class="mt-12 text-4xl text-center text-black leading-[61px] max-md:mt-10 max-md:max-w-full"
        >
          Welcome to Haarlem, a city where history whispers through its
          cobblestone streets and every landmark tells a tale. Get ready to
          embark on an enchanting journey as we explore three of Haarlem's most
          significant sites, each brimming with cultural heritage and
          architectural splendor.
        </div>
        <div
          class="mt-48 w-full max-w-[1765px] max-md:mt-10 max-md:max-w-full"
          space="164"
        >
          <div class="flex gap-5 max-md:flex-col max-md:">
            <div
              class="w-[33%] max-md:ml-0 max-md:w-full"
            >
              <div
                class="flex flex-wrap grow gap-6 items-start px-6 pt-6 pb-10 w-full bg-white rounded-lg border-8 border-yellow-600 border-solid min-h-56 min-w-60 max-md:px-5 max-md:mt-10"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/34e462f2a6997b9257e414c0d724c6fa0c91960f?placeholderIfAbsent=true&apiKey=6302e5c8c82a438b9c48016c50e62161"
                  class="object-contain shrink-0 w-40 aspect-square min-h-40 min-w-40"
                />
                <div
                  class="flex-1 shrink basis-0 min-w-40"
                >
                  <div class="w-full">
                    <div
                      class="text-2xl font-semibold tracking-tight leading-tight text-stone-900"
                    >
                      St Bavokerk
                    </div>
                    <div
                      class="mt-2 text-base leading-6 text-neutral-500"
                    >
                      You'll be captivated by the grandeur of this Gothic
                      masterpiece, a cornerstone of Haarlem's spiritual life
                      since the 13th century.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="ml-5 w-[33%] max-md:ml-0 max-md:w-full"
            >
              <div
                class="flex flex-wrap grow gap-6 items-start px-6 pt-6 pb-2.5 w-full bg-white rounded-lg border-8 border-yellow-600 border-solid min-h-56 min-w-60 max-md:px-5 max-md:mt-10"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/9b2bc57fd7720b1273d7f98e290c8b34bee923de?placeholderIfAbsent=true&apiKey=6302e5c8c82a438b9c48016c50e62161"
                  class="object-contain shrink-0 w-40 aspect-square min-h-40 min-w-40"
                />
                <div
                  class="flex-1 shrink basis-0 min-w-40"
                >
                  <div class="w-full">
                    <div
                      class="text-2xl font-semibold tracking-tight leading-tight text-stone-900"
                    >
                      Jopenkerk
                    </div>
                    <div
                      class="mt-2 text-base leading-6 text-neutral-500"
                    >
                      A former church that has been transformed into a lively
                      brewery. Here, you'll experience Haarlem's brewing
                      tradition firsthand and enjoy a refreshing break amidst
                      its unique ambiance.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="ml-5 w-[33%] max-md:ml-0 max-md:w-full"
            >
              <div
                class="flex flex-wrap grow gap-6 items-start px-6 pt-6 pb-2.5 w-full bg-white rounded-lg border-8 border-yellow-600 border-solid min-h-56 min-w-60 max-md:px-5 max-md:mt-10"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/79f46310479b807a6f7d3a04ca618f34d5085448?placeholderIfAbsent=true&apiKey=6302e5c8c82a438b9c48016c50e62161"
                  class="object-contain shrink-0 w-40 aspect-square min-h-40 min-w-40"
                />
                <div
                  class="flex-1 shrink basis-0 min-w-40"
                >
                  <div class="w-full">
                    <div
                      class="text-2xl font-semibold tracking-tight leading-tight text-stone-900"
                    >
                      Molen De Adriaan
                    </div>
                    <div
                      class="mt-2 text-base leading-6 text-neutral-500"
                    >
                      It stands as a testament to the city's industrious spirit.
                      Ascend to its viewing platform for breathtaking views of
                      Haarlem and learn about the vital role this windmill
                      played in the community's history.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div
          class="mt-32 w-full max-w-[1765px] max-md:mt-10 max-md:max-w-full"
          space="164"
        >
          <div class="flex gap-5 max-md:flex-col max-md:">
            <div
              class="w-[33%] max-md:ml-0 max-md:w-full"
            >
              <div
                class="flex flex-wrap grow gap-6 items-start px-6 py-7 w-full bg-white rounded-lg border-8 border-yellow-600 border-solid min-h-56 min-w-60 max-md:px-5 max-md:mt-10"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/5959ce5e47ca03bab78c474fd83e47f140c2cebc?placeholderIfAbsent=true&apiKey=6302e5c8c82a438b9c48016c50e62161"
                  class="object-contain shrink-0 w-40 aspect-square min-h-40 min-w-40"
                />
                <div
                  class="flex-1 shrink basis-0 min-w-40"
                >
                  <div class="w-full">
                    <div
                      class="text-2xl font-semibold tracking-tight leading-tight text-stone-900"
                    >
                      Grote Markt
                    </div>
                    <div
                      class="mt-2 text-base leading-6 text-neutral-500"
                    >
                      The main square of Haarlem, surrounded by historic
                      buildings, shops, and cafes. It's a lively hub for markets
                      and events, offering a perfect spot to soak up the city's
                      charm.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="ml-5 w-[33%] max-md:ml-0 max-md:w-full"
            >
              <div
                class="flex flex-wrap grow gap-6 items-start px-6 py-7 w-full bg-white rounded-lg border-8 border-yellow-600 border-solid min-h-56 min-w-60 max-md:px-5 max-md:mt-10"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/a57241f10af21b1277d572ce766d2dcbaddfbf62?placeholderIfAbsent=true&apiKey=6302e5c8c82a438b9c48016c50e62161"
                  class="object-contain shrink-0 w-40 aspect-square min-h-40 min-w-40"
                />
                <div
                  class="flex-1 shrink basis-0 min-w-40"
                >
                  <div class="w-full">
                    <div
                      class="text-2xl font-semibold tracking-tight leading-tight text-stone-900"
                    >
                      De Hallen
                    </div>
                    <div
                      class="mt-2 text-base leading-6 text-neutral-500"
                    >
                      A historic building housing the Frans Hals Museum's
                      contemporary art collection. De Hallen showcases modern
                      exhibitions and is a great spot for art lovers.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="ml-5 w-[33%] max-md:ml-0 max-md:w-full"
            >
              <div
                class="flex flex-wrap grow gap-6 items-start px-6 pt-6 pb-10 w-full bg-white rounded-lg border-8 border-yellow-600 border-solid min-h-56 min-w-60 max-md:px-5 max-md:mt-10"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/4aa98e30c47ff9ebd45af7010f9bb8415b79c683?placeholderIfAbsent=true&apiKey=6302e5c8c82a438b9c48016c50e62161"
                  class="object-contain shrink-0 w-40 aspect-square min-h-40 min-w-40"
                />
                <div
                  class="flex-1 shrink basis-0 min-w-40"
                >
                  <div class="w-full">
                    <div
                      class="text-2xl font-semibold tracking-tight leading-tight text-stone-900"
                    >
                      Proveniershof
                    </div>
                    <div
                      class="mt-2 text-base leading-6 text-neutral-500"
                    >
                      A peaceful and picturesque hofje (courtyard) surrounded by
                      historic houses, offering a glimpse into Haarlem's
                      architectural and social history.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div
          class="mt-44 w-full max-w-[1765px] max-md:mt-10 max-md:max-w-full"
          space="164"
        >
          <div class="flex gap-5 max-md:flex-col max-md:">
            <div
              class="w-[33%] max-md:ml-0 max-md:w-full"
            >
              <div
                class="flex flex-wrap grow gap-6 items-start px-6 pt-6 pb-10 w-full bg-white rounded-lg border-8 border-yellow-600 border-solid min-h-56 min-w-60 max-md:px-5 max-md:mt-10"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/34e462f2a6997b9257e414c0d724c6fa0c91960f?placeholderIfAbsent=true&apiKey=6302e5c8c82a438b9c48016c50e62161"
                  class="object-contain shrink-0 w-40 aspect-square min-h-40 min-w-40"
                />
                <div
                  class="flex-1 shrink basis-0 min-w-40"
                >
                  <div class="w-full">
                    <div
                      class="text-2xl font-semibold tracking-tight leading-tight text-stone-900"
                    >
                      Waalse kerk Haarlem
                    </div>
                    <div
                      class="mt-2 text-base leading-6 text-neutral-500"
                    >
                      A hidden gem in Haarlem, this historic French Reformed
                      Church is known for its serene atmosphere and occasional
                      cultural events.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="ml-5 w-[33%] max-md:ml-0 max-md:w-full"
            >
              <div
                class="flex flex-wrap grow gap-6 items-start px-6 pt-6 pb-10 w-full bg-white rounded-lg border-8 border-yellow-600 border-solid min-h-56 min-w-60 max-md:px-5 max-md:mt-10"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/312d31f34580797fc6bf66825869f8b2ea6eccf9?placeholderIfAbsent=true&apiKey=6302e5c8c82a438b9c48016c50e62161"
                  class="object-contain shrink-0 w-40 aspect-square min-h-40 min-w-40"
                />
                <div
                  class="flex-1 shrink basis-0 min-w-40"
                >
                  <div class="w-full">
                    <div
                      class="text-2xl font-semibold tracking-tight leading-tight text-stone-900"
                    >
                      Amsterdamse poort
                    </div>
                    <div
                      class="mt-2 text-base leading-6 text-neutral-500"
                    >
                      The only remaining medieval city gate of Haarlem, dating
                      back to the 14th century. It's a striking reminder of the
                      city's past fortifications.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="ml-5 w-[33%] max-md:ml-0 max-md:w-full"
            >
              <div
                class="flex flex-wrap grow gap-6 items-start px-6 pt-6 pb-10 w-full bg-white rounded-lg border-8 border-yellow-600 border-solid min-h-56 min-w-60 max-md:px-5 max-md:mt-10"
              >
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/eb20d2c07643fdfe2af641fb28e60a64b07a8560?placeholderIfAbsent=true&apiKey=6302e5c8c82a438b9c48016c50e62161"
                  class="object-contain shrink-0 w-40 aspect-square min-h-40 min-w-40"
                />
                <div
                  class="flex-1 shrink basis-0 min-w-40"
                >
                  <div class="w-full">
                    <div
                      class="text-2xl font-semibold tracking-tight leading-tight text-stone-900"
                    >
                      Hof van Bakenes
                    </div>
                    <div
                      class="mt-2 text-base leading-6 text-neutral-500"
                    >
                      One of Haarlem's oldest hofjes, established in the 14th
                      century. It features charming small houses surrounding a
                      tranquil courtyard.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div
          class="mt-40 text-5xl leading-none text-black max-md:mt-10 max-md:text-4xl"
        >
          Tour tickets
        </div>
      </div>
      <div class="flex flex-col pl-6 mt-7 w-full max-md:pl-5 max-md:max-w-full">
        <div
          class="text-4xl text-black leading-[61px] w-[1258px] max-md:max-w-full"
        >
          <span style="font-family: Merienda One, -apple-system, Roboto, Helvetica, sans-serif; font-size: 30px;">
            Experience the Heart of Haarlem: Book Your Tour Today!
          </span>
          <br />
          Step into a world where history comes alive! Join us for an
          unforgettable journey through the enchanting streets of Haarlem, where
          each landmark tells a story and every moment is steeped in culture.
          <br />
        </div>
        <div class="z-10 max-md:max-w-full" space="33">
          <div class="flex gap-5 max-md:flex-col max-md:">
            <div
              class="w-[54%] max-md:ml-0 max-md:w-full"
            >
              <div
                class="text-4xl text-black leading-[61px] max-md:mt-8 max-md:max-w-full"
              >
                <br />
                <span style="font-family: Merienda One, -apple-system, Roboto, Helvetica, sans-serif; font-size: 30px;">
                  Why Choose Our Tour?
                </span>
                <ul>
                  <li>
                    Explore Iconic Landmarks: Visit the breathtaking St. Bavo
                    Church, a masterpiece of Gothic architecture, and discover
                    the rich history behind its magnificent walls.
                  </li>
                  <li>
                    Savor Local Brews: Take a break at Jopenkerk, a unique
                    brewery housed in a former church, and indulge in the
                    flavors of Haarlem's brewing heritage.
                  </li>
                  <li>
                    Marvel at Historic Windmills: Conclude your adventure at
                    Molen de Adriaan, where you'll enjoy stunning views and
                    learn about the city's industrious past.
                  </li>
                </ul>
                <br />
                <span style="font-family: Merienda One, -apple-system, Roboto, Helvetica, sans-serif; font-size: 30px;">
                  What Awaits You:
                </span>
                <ul>
                  <li>
                    Expert guides sharing captivating stories and insights
                  </li>
                  <li>
                    A friendly atmosphere filled with fellow history enthusiasts
                  </li>
                  <li>
                    The chance to create lasting memories in one of the
                    Netherlands' most charming cities
                  </li>
                </ul>
                <br />
              </div>
            </div>
            <div
              class="ml-5 w-[46%] max-md:ml-0 max-md:w-full"
            >
            <div class="flex relative flex-col justify-center items-center px-20 pb-96 mt-6 min-h-[941px] max-md:px-5 max-md:mt-10 max-md:max-w-full">                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/b418c461d3b5cde3a61a74bde4cfa13d0d182744?placeholderIfAbsent=true&apiKey=6302e5c8c82a438b9c48016c50e62161"
                  class="object-cover absolute inset-0 size-full"
                />
                <div class="flex relative flex-col max-w-full w-[466px]">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/b30714cbf248c88e41b7e808a58fc684f1d4f8f1?placeholderIfAbsent=true&apiKey=6302e5c8c82a438b9c48016c50e62161"
                    class="object-contain self-end aspect-[1.09] w-[37px]"
                  />
                  <div class="flex gap-5 justify-between items-start mt-16 max-w-full w-[301px] max-md:mt-10">
                    <img
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/94f39c716e7abc9eec05ac1fa456627e9a2bc28c?placeholderIfAbsent=true&apiKey=6302e5c8c82a438b9c48016c50e62161"
                      class="object-contain shrink-0 self-end mt-6 aspect-[1.16] w-[37px]"
                    />
                    <img
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/c4e7ebb21afdb32848f2a55b65781c88f083049e?placeholderIfAbsent=true&apiKey=6302e5c8c82a438b9c48016c50e62161"
                      class="object-contain shrink-0 self-start aspect-[1.16] w-[37px]"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <div class="flex gap-5 max-md:flex-col max-md:">
            <div
              class="w-6/12 max-md:ml-0 max-md:w-full"
            >
              <div
                class="grow text-xl leading-5 text-black max-md:mt-10"
              >
              </div>
            </div>
            <div
              class="ml-5 w-6/12 max-md:ml-0 max-md:w-full"
            >
              <div
                class="grow text-xl leading-5 text-center text-black max-md:mt-10"
              >
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
</body>

<?require(__DIR__ . "/../partials/footer.php"); ?>
</html>