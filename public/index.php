<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require_once __DIR__ . "/../vendor/autoload.php";

$bt = ['button1','button2','button3'];

$log = new Logger("log");
$log->pushHandler(new StreamHandler(__DIR__ . "/../src/logs/buttonlogs.log"));

$loader = new FilesystemLoader(__DIR__ . "/../src/templates");
$twig = new Environment($loader);

echo $twig->render('index.html.twig', array('bt' => $bt));

function check_button($log){
    $button = (string)$_GET['button'];
    if ($button == "button1") $log->info("Нажата кнопка1");
    if ($button == "button2") $log->info("Нажата кнопка2");
    if ($button == "button3") $log->info("Нажата кнопка3");
}

check_button($log);