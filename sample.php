<?php

require __DIR__ . '/vendor/autoload.php';


use Paggi\Cards;
use Paggi\Paggi;

$staging_token = "d3606313-bc7e-428d-8254-ec83853bbd72";
$dev_token = "B31DCE74-E768-43ED-86DA-85501612548F";

//Paggi::init($dev_token, true);

$paggi = new Paggi($dev_token,true);

$cardParams = array(
    "customer_id" => "customer_7241f2c6-d8d7-4648-9843-e494c1ac881b",
    "name" => "Cartao testando",
    "number" => "5514967494092156",
    "month" => "12",
    "year" => "20",
    "cvc" => "210");

//echo Paggi::isStaging();
//echo Paggi::getToken();


$r = $paggi->cards()->createCard($cardParams);
//$r = $paggi->cards()->findAll();
//$r = $paggi->cards()->delete("card_036e0226-0970-4af4-bcd9-3b5124085c3d");
//$r = $paggi->cards()->findById("card_036e0226-0970-4af4-bcd9-3b5124085c3d");
print_r(($r->customer_id));


//$card = $cards->create($cardParams);
//$card = $cards->findById("card_2293f89b-8312-4309-a196-0f98de9d51e0");
//$card = $cards->findAll();
//json_encode($card);


?>