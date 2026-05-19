<?php
$stitle = "My Favorite Things to Do";
$sauthor = "Harold James Delgado";
$sbody = "I love watching anime and movies, reading manhwa, and motorcycling to different places. These activities help me relax, enjoy my free time, and explore new experiences. Watching anime lets me dive into imaginative worlds and stories that inspire creativity. Reading manhwa gives me a way to explore different cultures and art styles, while motorcycling allows me to feel the freedom of the open road, discover new places, and connect with nature. These hobbies not only entertain me but also provide a sense of balance and mindfulness in my everyday life.";
$spagetitle = "STUDBIT's Blog | " . $stitle;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?= $spagetitle ?></title>
</head>

<body class="bg-gray-50">

    <header class="bg-gradient-to-r from-purple-600 to-pink-500 text-white p-6">
        <div class="container mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold"><?= $stitle ?></h1>
            <p class="text-base md:text-lg mt-1">By <?= $sauthor ?></p>
        </div>
    </header>

    <div class="container mx-auto p-6 mt-6">
        <div class="bg-gradient-to-br from-white to-gray-100 rounded-3xl shadow-2xl p-10 md:p-16">
            <p class="text-lg md:text-2xl leading-relaxed text-gray-800"><?= $sbody ?></p>
        </div>
    </div>

</body>
</html>
