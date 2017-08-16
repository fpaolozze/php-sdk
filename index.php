<?php

include __DIR__ . '/lib/Paggi.php';
include __DIR__ . '/lib/Cards.php';
include __DIR__ . '/lib/Card.php';
include __DIR__ . '/lib/Charges.php';
include __DIR__ . '/lib/Address.php';


use Paggi\Paggi;
use Paggi\Cards;
use Paggi\Card;
use Paggi\Address;

$dev_token = "B31DCE74-E768-43ED-86DA-85501612548F";
$staging_token = "d3606313-bc7e-428d-8254-ec83853bbd72";

Paggi::init($dev_token,true);


//$charges = new Charges();
//$charges->findById("sdsd");
//$response = $charges->find();

//echo($response);

//echo "<br><br>";

$cards = new Cards();
//$response2 = $cards->find();
//echo ($response2);
//$response2 = $cards->findById("card_6d502929-c214-4c3f-8e4d-191bd42edafa");

//$decode = json_decode($response2);

//print_r($response2['name']);
//echo "<p>";
//print_r($response2['year']);

//echo ($response2);



$card = new Card();
$card->setCustomerId("customer_7241f2c6-d8d7-4648-9843-e494c1ac881b");
$card->setName("Est luminus");
$card->setNumber("5514967494092156");
$card->setMonth("6");
$card->setYear("19");
$card->setCvc("122");
$card->setCardAlias("Favorite Platium card");

$metadata = array("internal_id"=>"84372");

$card->setMetadata($metadata);

$address = new Address();
$address->setCity("Sao Paulo");
$address->setState("SP");
$address->setStreet("Maranhao");
$address->setZip("120202");

$card->setAddress($address);


$resul = $cards->create($card);

//echo(json_decode($resul,true)['name']);
echo ($resul);






?>
