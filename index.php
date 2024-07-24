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

// verificare se la checkbox è stata selezionata
$filter = isset($_GET['parcheggio']) && $_GET['parcheggio'] == '1';

?>

<!-- codice html -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Hotel</title>

    <script>
        function submitForm() {
            document.getElementById('filterForm').submit();
        }
    </script>
</head>
<body>
    <section class="container m-4">

        <h2 class="my-5">Scegli il tuo hotel</h2>

        <form id="filterForm" action="index.php" method="GET" class="mx-1">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="parcheggio" value="1" id="flexCheckDefault" <?php if($filter) echo 'checked'; ?> onchange="submitForm()">
                <label class="form-check-label" for="flexCheckDefault">
                    Solo con parcheggio
                </label>
            </div>
        </form>
        
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
                    <?php if(!$filter || ($filter && $hotel['parking'])): ?>
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