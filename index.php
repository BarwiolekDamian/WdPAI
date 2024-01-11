<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('offers', 'OfferController');
Router::get('logout', 'SecurityController');
Router::get('account', 'AccountController');

Router::post('search', 'OfferController');
Router::post('addOffer', 'OfferController');
Router::post('login', 'SecurityController');
Router::post('account', 'AccountController');
Router::post('register', 'SecurityController');

Router::run($path);

?>