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
        [
            'name' => 'Hotel Roma',
            'description' => 'Hotel Roma Descrizione',
            'parking' => false,
            'vote' => 3,
            'distance_to_center' => 7.4
        ],
        [
            'name' => 'Hotel Pisolo',
            'description' => 'Hotel Pisolo Descrizione',
            'parking' => true,
            'vote' => 5,
            'distance_to_center' => 88
        ],
        [
            'name' => 'Hotel Ronfolo',
            'description' => 'Hotel Ronfolo Descrizione',
            'parking' => true,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Corona',
            'description' => 'Hotel Corona Descrizione',
            'parking' => false,
            'vote' => 3,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Principi',
            'description' => 'Hotel Principi Descrizione',
            'parking' => false,
            'vote' => 4,
            'distance_to_center' => 34
        ],
    ];

    if((isset($_GET['vote']) && !empty($_GET['vote'])) && empty($_GET['parking'])){
        $filtHotels = array_filter($hotels, fn($hotel) => $hotel['vote'] == $_GET['vote']);
        $hotels = $filtHotels;
    }
    else if((isset($_GET['parking']) && !empty($_GET['parking'])) && empty($_GET['vote'])){
        $filtHotels = array_filter($hotels, fn($hotel) => $hotel['parking']);
        $hotels = $filtHotels;
    }
    else if((isset($_GET['vote']) && !empty($_GET['vote'])) && (isset($_GET['parking']) && !empty($_GET['parking']))){
        $filtHotels = array_filter($hotels, function($hotel){
            return ($hotel['parking'] && ($hotel['vote'] == $_GET['vote']));
        });
        $hotels = $filtHotels;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Hotels</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <div class="filterBar d-flex justify-content-start align-items-center mb-4 p-3">
            <form class="d-flex justify-content-center align-items-center" action="index.php" method="GET">
                <select class="select-vote me-4" name="vote" id="vote">
                    <option value="" selected>---valutazione---</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <input class="form-check-input me-2" type="checkbox" name="parking" id="parking">
                <label class="form-check-label" for="parking"><i class="fa-solid fa-car fs-2"></i></label>
                <button type="submit" class="btn btn-outline-light ms-3"><i class="fa-solid fa-filter"></i></button>
            </form>
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
                    <p class="distance">Distanza dal centro: <?php echo $hotel['distance_to_center']?> km</p>
                    <span class="parking">Posto auto: <?php echo ($hotel['parking'])? 'Si':'No'?></span>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
</body>
</html>