<?php

require '../vendor/autoload.php';
require './Mailer.php';

$method = getenv("REQUEST_METHOD");
$path = parse_url(getenv('REQUEST_URI'), PHP_URL_PATH);

function home()
{
    echo render('home.phtml', [
        'isSuccess' => isset($_GET['kuldesSikeres'])
    ]);
}

function render($path, $params = [])
{
    ob_start();
    require __DIR__ . '/views/' . $path;
    return ob_get_clean();
}

function notFoundhandler()
{
    header('Location: /');
}
 