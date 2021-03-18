<?php

$api = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);

switch ($api) {
    case 'ralf':
        $link = "https://hajus.ta19heinsoo.itmajakas.ee/api/movies";
        break;
    case 'ralf2':
        $link = "https://hajus.ta19heinsoo.itmajakas.ee/api/products";
        break;
    case 'janek':
        $link = "https://ta19.janek.itmajakas.ee/code/hajusrakendused/favorite-api/api/";
        break;
    default:
        $link = "https://ta19pupart.itmajakas.ee/hajus5/api/";
}

$data = file_get_contents($link);

$jsonData = json_decode($data);

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Api</title>
  </head>
  <body>

    <nav class="d-flex justify-content-around navbar navbar-expand-lg navbar-light bg-light">
      <div>
        <a class="btn btn-primary" href="?name=ralf">Ralf</a>
        <a class="btn btn-primary" href="?name=ralf2">Ralf2</a>
        <a class="btn btn-primary" href="?name=janek">Janek</a>
        <a class="btn btn-primary" href="?name=default">Default</a>
      </div>
      <div>
        <a class="btn btn-success" href="/hajus5/form">Add a new cat breed</a>
      </div>
    </nav>
    <div class="container">
        <div class="d-flex flex-wrap">
        <?php switch ($api) { case 'ralf': ?>

            <?php if (!empty($jsonData->data)) : foreach ($jsonData->data as $item) { ?>
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="<?= $item->image ?>" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title"><?= $item->title ?></h5>
                    <p class="card-text"><b>Rating:</b> <?= $item->movie_rating ?></p>
                    <p class="card-text"><b>Rank:</b> <?= $item->rank?></p>
                    <p class="card-text"><?= $item->description ?></p>
                  </div>
                </div>       
            <?php } endif; ?>
          
          <?php break;?>
          <?php case 'janek': ?>
          
            <?php if (!empty($jsonData->data)) : foreach ($jsonData->data as $item) { ?>
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title"><?= $item->title ?></h5>
                    <p class="card-text"><b>Added</b> <?= $item->added ?></p>
                    <p class="card-text"><b>Status</b> <?= $item->status?></p>
                    <p class="card-text"><?= $item->body ?></p>
                  </div>
                </div>       
            <?php } endif; ?>
          
          <?php break;?>
          <?php case 'ralf2': ?>

            <?php if (!empty($jsonData)) : foreach ($jsonData as $item) {?>
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="<?= $item->file_url ?>" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title"><?= $item->name ?></h5>
                    <p class="card-text"><b>Details:</b> <?= $item->details ?></p>
                    <p class="card-text"><b>Price:</b> <?= $item->price?></p>
                    <p class="card-text"><?= $item->description ?></p>
                  </div>
                </div>       
            <?php } endif; ?>
          
          <?php break; default: ?>

            <?php if (!empty($jsonData->data)) : foreach ($jsonData->data as $item) { ?>
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="<?= $item->image ?>" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title"><?= $item->title ?></h5>
                    <p class="card-text"><b>Color:</b> <?= $item->color ?></p>
                    <p class="card-text"><b>Coat:</b> <?= $item->coat ?></p>
                    <p class="card-text"><?= $item->description ?></p>
                  </div>
                </div>       
            <?php } endif; ?>

          <?php } ?>

        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>