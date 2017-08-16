<?php

require __DIR__ . '/vendor/autoload.php';

use Paggi\Paggi;
use Paggi\Cards;
use Paggi\model\Card;
use Paggi\model\Address;

$dev_token = "B31DCE74-E768-43ED-86DA-85501612548F";
$staging_token = "d3606313-bc7e-428d-8254-ec83853bbd72";

Paggi::init($dev_token, true);


$cards = new Cards();

$card = new Card();
$card->setCustomerId("customer_7241f2c6-d8d7-4648-9843-e494c1ac881b");
$card->setName("Est luminus");
$card->setNumber("5514967494092156");
$card->setMonth("6");
$card->setYear("19");
$card->setCvc("122");
$card->setCardAlias("Favorite Platium card");

$metadata = array("internal_id" => "84372");

$card->setMetadata($metadata);

$address = new Address();
$address->setCity("Sao Paulo");
$address->setState("SP");
$address->setStreet("Maranhao");
$address->setZip("120202");

$card->setAddress($address);


$cardId = "card_79ca5b97-3d40-42d6-ae85-21fa26e737e2"; //DevToken
//$cardIdStaging = "card_6d502929-c214-4c3f-8e4d-191bd42edafa"; //DevStaging

//echo $resulCreateCard = $cards->create($card);
echo $resulFindAllCards = $cards->findAll();
//echo $resulFindCardById = $cards->findById($cardId);
//echo $resulDeleteCard = $cards->delete($cardId);


//$charges = new Charges();
//$charges->findById("sdsd");
//$response = $charges->find();

//echo($response);



?>
