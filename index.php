<?php

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Hotels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container bg-black">
        <div class="filterBar mb-4">

        </div>
        <div class="hotels row p-4">
            <?php
                foreach($hotels as $hotel){
            ?>
                <div class="hotel-card col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="picBox">
                        <img class="w-100" src="./img/hotel.png" alt="random hotel icon">
                    </div>
                    <h3 class="hotel-name"><?php echo $hotel['name']?></h3>
                    <span class="valutation">valutazione: <?php echo $hotel['vote']?></span>
                    <div class="description"><?php echo $hotel['description']?></div>
                    <p class="distance">Distanza dal centro: <?php echo $hotel['distance_to_center']?></p>
                    <span class="parking">Posto auto: <?php echo ($hotel['parking'])? 'Si':'No'?></span>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
</body>
</html>