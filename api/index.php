<?php

require_once '..' . DIRECTORY_SEPARATOR . 'autoload.php';

//$list peab tulema andmebaasist ja seda peab cacheima nagu esimeses ülesandes

$limit = filter_input(INPUT_GET, 'param', FILTER_VALIDATE_INT);

if (empty($limit)) {
    $limit = 0;
}

$file = 'cache-' . $limit . '.json';

if (!file_exists($file)) {
    $list = getData($limit);

    file_put_contents($file, json_encode([
        'count' => count($list),
        'created' => date("Y-m-d H:i:s"),
        'data' => $list
    ]));
}

$json = json_decode(file_get_contents($file));

echo file_get_contents($file);