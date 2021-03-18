<?php

include_once '../autoload.php';

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$image = filter_input(INPUT_POST, 'image', FILTER_VALIDATE_URL);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING);
$coat = filter_input(INPUT_POST, 'coat', FILTER_SANITIZE_STRING);


if (isset($action)) {
    if (!empty($image)) {
        if (!empty($title) && !empty($description) && !empty($color) && !empty($coat)) {
            $result = save($title, $image, $description, $color, $coat);
            
            if ($result['status']) {

                $cacheFiles = glob(".." . DIRECTORY_SEPARATOR . "api" . DIRECTORY_SEPARATOR . "cache-*.json");
                
                if(!empty($cacheFiles)) : foreach ($cacheFiles as $cacheFile) {
                    unlink($cacheFile);
                } endif;

                header("Location: ../");
                exit();

            } else {
                echo $result['message'];
            }

        } else {
            echo "<span class='d-flex alert alert-danger'>Error! All fields are required!</span>";
        }
    } else {
        echo "<span class='d-flex alert alert-danger'>Error! Enter a URL in the image input!</span>";
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Add new my topic</title>
  </head>
  <body>
    <div class="container">
        <h1 class="h1">Add a cat breed</h1>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input name="title" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input name="image" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Color</label>
                <input name="color" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Coat</label>
                <input name="coat" type="text" class="form-control">
            </div>
            <button type="submit" name="action" class="btn btn-primary">Add</button>
            <a href="../" class="btn btn-primary">Back</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>