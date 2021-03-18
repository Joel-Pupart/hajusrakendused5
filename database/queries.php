<?php

function getData($limit = 0) {
    global $db;

    $sql = 'SELECT *  FROM breeds';

    if (!empty($limit)) {
        $sql .= " LIMIT " . $limit;
    }

    return $db->query($sql)->fetchAll();

}

function save($title, $image, $desc, $color, $coat) {
    global $db;

    $sql = 'INSERT INTO breeds (title, image, description, color, coat) VALUES ("' . $title . '","' . $image . '","' . $desc . '","' . $color . '","' . $coat . '");';

    try {
        $db->prepare($sql)->execute();
    } catch (PDOException $e) {
        return [
            'message' => $e->getMessage(),
            'status' => 'false',
        ];
    }

    return [
        'message' => 'success',
        'status' => 'true',
    ];

}