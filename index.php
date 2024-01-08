<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('offers', 'OfferController');
Router::post('search', 'OfferController');
Router::post('addOffer', 'OfferController');
Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');

Router::run($path);

?>