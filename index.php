<?php 

//codice php

//array che contiene l'elenco degli hotel e le caratteristiche
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

// verificare se la checkbox è stata selezionata per il filtraggio dei parcheggi
$filter_parking = isset($_GET['parcheggio']) && $_GET['parcheggio'] == '1';

//verificare se il radio della valutazione è stata selezionata per il filtraggio dei voti
$filter_vote = isset($_GET['voto']) ? (int)$_GET['voto'] : null;

?>

<!-- codice html -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Hotel</title>

</head>
<body>
    <section class="container m-4">

        <h2 class="my-5">Scegli il tuo hotel</h2>

        <div class="container d-flex">
            
            <!-- Parte del form per filtrare i parcheggi e i voti -->
            <form action="index.php" method="GET" class="mx-1 d-flex">
                <div class="form-check mx-2">
                    <input class="form-check-input" type="checkbox" name="parcheggio" value="1" id="flexCheckDefault" <?php if($filter_parking) echo 'checked'; ?>>
                    <label class="form-check-label" for="flexCheckDefault">
                        Solo con parcheggio
                    </label>
                </div>

                <label class="mx-5">Voto:</label>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="radio" name="voto" id="flexRadioDefault1" value="1" <?php if($filter_vote === 1) echo 'checked'; ?>>
                    <label class="form-check-label" for="flexRadioDefault1">
                        1
                    </label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="radio" name="voto" id="flexRadioDefault2" value="2" <?php if($filter_vote === 2) echo 'checked'; ?>>
                    <label class="form-check-label" for="flexRadioDefault2">
                        2
                    </label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="radio" name="voto" id="flexRadioDefault3" value="3" <?php if($filter_vote === 3) echo 'checked'; ?>>
                    <label class="form-check-label" for="flexRadioDefault3">
                        3
                    </label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="radio" name="voto" id="flexRadioDefault4" value="4" <?php if($filter_vote === 4) echo 'checked'; ?>>
                    <label class="form-check-label" for="flexRadioDefault4">
                        4
                    </label>
                </div>
                <div class="form-check mx-2">
                    <input class="form-check-input" type="radio" name="voto" id="flexRadioDefault5" value="5" <?php if($filter_vote === 5) echo 'checked'; ?>>
                    <label class="form-check-label" for="flexRadioDefault5">
                        5
                    </label>
                </div>

                <button type="submit" class="btn btn-primary mx-4">Filtra</button>
                <a href="index.php" class="btn btn-secondary">Resetta Filtri</a>
            </form>
        </div>

        <!-- Tabella che elenca gli hotel e le caratteristiche -->
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Parcheggio</th>
                    <th scope="col">Voto</th>
                    <th scope="col">Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($hotels as $hotel): ?>
                    <?php 
                    // Verifica se l'hotel deve essere visualizzato in base ai filtri
                    $show_hotel = true;
                    if ($filter_parking && !$hotel['parking']) {
                        $show_hotel = false;
                    }
                    if ($filter_vote && $hotel['vote'] !== $filter_vote) {
                        $show_hotel = false;
                    }
                    ?>
                    <?php if ($show_hotel): ?>
                        <tr>
                            <td><?php echo $hotel['name']; ?></td>
                            <td><?php echo $hotel['description']; ?></td>
                            <td><?php echo $hotel['parking'] ? 'Sì' : 'No'; ?></td>
                            <td><?php echo $hotel['vote']; ?></td>
                            <td>Km <?php echo $hotel['distance_to_center']; ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

    </section>
</body>
</html>