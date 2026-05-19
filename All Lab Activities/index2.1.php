<?php
$stitle = "LANY";
$sauthor = "John Ruzzel Sansait";
$sbody = "LANY is an American pop rock band from Los Angeles. Formed in Nashville in 2014, the band consists of guitarist and lead vocalist Paul Klein and drummer Jake Goss. Through Polydor and Interscope Records, the band released four albums: LANY, Malibu Nights, Mama's Boy, and gg bb xx";
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

    <header class="bg-gradient-to-r from-cyan-600 to-blue-400 text-white p-6">
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
