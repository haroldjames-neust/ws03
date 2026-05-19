<?php
$resultFilter = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['filter_button'])) {
        $filterInput = $_POST['filterInput'] ?? '';
        $filtered_myInput = filter_var($filterInput, FILTER_VALIDATE_URL) ;
        if (!$filtered_myInput) {
            $resultFilter = "<label class='invalid'>Invalid URL</label>";
        } else {
            $resultFilter = "<label class='valid'>Valid URL</label>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Validation</title>
    
</head>

<body>
    <header>
        <h1>Validation</h1>
    </header>
    <section id="input-filter">
        <span>filter_var();</span>
        <form method="post">
            <input type="url" name="filterInput" placeholder="Put URL HEREEE" required>
            <button type="submit" name="filter_button">VALIDATE</button>
        </form>
    </section>
    <section id="output-filter">
        <?php echo $resultFilter; ?>
    </section>


</body>

</html>