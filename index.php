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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-secondary">

    <div class="container mt-5">

        <h1 class="text-center text-warning">Hotel list's</h1>

        <form class="d-flex flex-wrap mt-5" method="GET">
            <input class="form-control w-75 border-primary" type="text" name="parking" id="parking" placeholder="Type your preference here...">
            <button class="btn btn-primary btn-lg ms-5 fw-bold border-warning" type="submit">Search</button>
        </form>

        <div class="row">
            <div class="col-12">
                <table class="table border border-2 border-primary mt-5">
                    <thead>
                        <tr>
                            <th scope="col-2">Hotels</th>
                            <th class="border-start border-primary" scope="col-2">1</th>
                            <th class="border-start border-primary" scope="col-2">2</th>
                            <th class="border-start border-primary" scope="col-2">3</th>
                            <th class="border-start border-primary" scope="col-2">4</th>
                            <th class="border-start border-primary" scope="col-2">5</th>
                        </tr>
                    </thead>
                    <tbody class="border border-primary">
                        <tr>
                            <th scope="row">Name</th>
                            <?php foreach($hotels as $hotel) : ?>
                                <td class="border-start border-primary"><?= $hotel['name'] ?></td>
                            <?php endforeach; ?>
                        </tr>
                        <tr>
                            <th scope="row">Description</th>
                            <?php foreach($hotels as $hotel) : ?>
                                <td class="border-start border-primary"><?= $hotel['description'] ?></td>
                            <?php endforeach; ?>
                        </tr>
                        <tr>
                            <th scope="row">Parking</th>
                            <?php foreach($hotels as $hotel) : ?>
                                <td class="border-start border-primary"><?= $hotel['parking'] ?></td>
                            <?php endforeach; ?>
                        </tr>
                        <tr>
                            <th scope="row">Vote</th>
                            <?php foreach($hotels as $hotel) : ?>
                                <td class="border-start border-primary"><?= $hotel['vote'] ?></td>
                            <?php endforeach; ?>
                        </tr>
                        <tr>
                            <th scope="row">Distance to center</th>
                            <?php foreach($hotels as $hotel) : ?>
                                <td class="border-start border-primary"><?= $hotel['distance_to_center'] ?></td>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>