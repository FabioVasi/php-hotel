<?php
/*
Descrizione:

Partiamo da questo array di hotel. https://www.codepile.net/pile/OEWY7Q1G
Stampare tutti i nostri hotel con tutti i dati disponibili.

Iniziate in modo graduale. Prima stampate in pagina i dati, senza preoccuparvi dello stile. Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.

Bonus:

Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)

NOTA: deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore) Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel.
*/

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

var_dump($_GET);



if (isset($_GET['rating'])) {

    $hotels = array_filter($hotels, function ($hotel) {

        return $hotel['vote'] >= $_GET['rating'];

    });

}



if (isset($_GET['parking']) && $_GET['parking'] == 1) {

    $hotels = array_filter($hotels, function ($hotel) {

        return $hotel['parking'];

    });

} elseif (isset($_GET['parking']) && $_GET['parking'] == 0) {

    $hotels = array_filter($hotels, function ($hotel) {

        return !$hotel['parking'];

    });

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .icon{
            fill: gold;
        }
    </style>
</head>
<body class="bg-secondary">

    <div class="container mt-5">

        <h1 class="text-center text-warning">Hotel list's</h1>

        <form>
            <input class="me-1 form-check-input" type="radio" name="parking" id="parking" value="1">
            <label class="me-3 form-check-label" for="parking">Has Parking</label>
            <input class="me-1 form-check-input" type="radio" name="parking" id="no_parking" value="0">
            <label class="me-3 form-check-label" for="no_parking">No Parking</label>

            <div class="mb-3">
                <select class="form-select form-select-sm mt-3 mb-3" name="rating" id="rating">
                    <option value="" <?php echo (isset($_GET['rating']) && $_GET['rating'] == '' ? 'selected' : '') ?>>All</option>
                    <option value="1" <?php echo (isset($_GET['rating']) && $_GET['rating'] == 1 ? 'selected' : '') ?>>1+</option>
                    <option value="2" <?php echo (isset($_GET['rating']) && $_GET['rating'] == 2 ? 'selected' : '') ?>>2+</option>
                    <option value="3" <?php echo (isset($_GET['rating']) && $_GET['rating'] == 3 ? 'selected' : '') ?>>3+</option>
                    <option value="4" <?php echo (isset($_GET['rating']) && $_GET['rating'] == 4 ? 'selected' : '') ?>>4+</option>
                </select>
            </div>

            <button class="btn btn-primary fw-bold border-warning" type="submit">Filter</button>
            <button class="btn btn-danger ms-3 fw-bold border-warning" type="reset">Unfilter</button>
        </form>

        <div class="row">
            <div class="col-12">
                <table class="table border border-2 border-primary">
                    <thead>
                        <tr>
                            <th class="border-start border-primary" scope="col">Name</th>
                            <th class="border-start border-primary" scope="col">Description</th>
                            <th class="border-start border-primary" scope="col">Parking</th>
                            <th class="border-start border-primary" scope="col">Vote</th>
                            <th class="border-start border-primary" scope="col">Distance to center</th>
                        </tr>
                    </thead>
                    <tbody class="border border-primary">
                        <?php foreach($hotels as $hotel) : ?>
                            <tr>
                                <td class="border-start border-primary"><?= $hotel['name'] ?></td>
                                <td class="border-start border-primary"><?= $hotel['description'] ?></td>
                                <td class="border-start border-primary">
                                    <?php if ($hotel['parking']) : ?>
                                        <svg style="fill: green;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 117.4L109.1 192H402.9l-26.1-74.6C372.3 104.6 360.2 96 346.6 96H165.4c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32H346.6c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2V400v48c0 17.7-14.3 32-32 32H448c-17.7 0-32-14.3-32-32V400H96v48c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V400 256c0-26.7 16.4-49.6 39.6-59.2zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
                                    <?php else : ?>
                                        <svg style="fill: red;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 117.4L109.1 192H402.9l-26.1-74.6C372.3 104.6 360.2 96 346.6 96H165.4c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32H346.6c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2V400v48c0 17.7-14.3 32-32 32H448c-17.7 0-32-14.3-32-32V400H96v48c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V400 256c0-26.7 16.4-49.6 39.6-59.2zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
                                    <?php endif; ?>
                                </td>
                                <td class="border-start border-primary d-flex justify-content-start align-items-center">
                                    <?= $hotel['vote'] ?>/5 <svg class="icon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                                </td>
                                <td class="border-start border-primary"><?= $hotel['distance_to_center'] ?> km</td>
                            </tr>
                        <?php endforeach; ?>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>