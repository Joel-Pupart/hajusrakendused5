<?php

$createBreeds = "CREATE TABLE `breeds` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `title` varchar(100) NOT NULL,
    `image` varchar(200) NOT NULL,
    `description` text NOT NULL,
    `color` varchar(100) NOT NULL,
    `fur_length` varchar(100) NOT NULL,
    UNIQUE KEY `id` (`id`)
   ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1";