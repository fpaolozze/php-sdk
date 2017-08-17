<?php

require __DIR__ . '/vendor/autoload.php';


use Paggi\Cards;
use Paggi\Paggi;

$dev_token = "B31DCE74-E768-43ED-86DA-85501612548F";

Paggi::init($dev_token, true);

$cardParams = array(
    "customer_id" => "customer_7241f2c6-d8d7-4648-9843-e494c1ac881b",
    "name" => "Cartao testando",
    "number" => "5514967494092156",
    "month" => "12",
    "year" => "20",
    "cvc" => "210",
    "card_alias" => "Cartao dourado");


$cards = new Cards();
$card = $cards->create($cardParams);
//$card = $cards->findById("card_2293f89b-8312-4309-a196-0f98de9d51e0");
//$card = $cards->findAll();
json_encode($card);


?>