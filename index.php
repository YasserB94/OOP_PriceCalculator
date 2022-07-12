<?php
declare(strict_types=1);

//Head and opening tag for body
require './Views/head.php';
//Load ENV FILE INTO SUPERGLOBAL
//Symfony Dotenv parses .env files to make environment variables stored in them accessible via $_SERVER or $_ENV.
require_once realpath(__DIR__ . "/vendor/autoload.php");
use Symfony\Component\Dotenv\Dotenv;
//Create dotenv object
$dotenv = new Dotenv();
//Load .env vars into superglobal $_ENV
$dotenv->load(__DIR__."/.env");


//ADD DBCONTROLLER
require "Controllers/priceCalculatorController.php";

$controller = new priceCalculatorController($_POST);



$controller->render();



//Footer and closing tag for body/html
require './Views/footer.php';
?>
