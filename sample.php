<?php

require __DIR__ . '/vendor/autoload.php';

use Paggi\Paggi;

$staging_token = "d3606313-bc7e-428d-8254-ec83853bbd72";
$dev_token = "B31DCE74-E768-43ED-86DA-85501612548F";


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


try{
    //$p = $paggi->newCall();
    //$paggi->cards()->findAll();
    //$r1 = $paggi->cards()->createCard($cardParams);
    //$r2 = $paggi->cards()->delete("card_609fe86f-5657-4a4b-873c-a9f98cbaa5f4");
    //$r3 = $paggi->cards()->findById($r1->id);
    //echo json_encode($r1);
    //$r3 = $paggi->cards()->findById($id);

    //echo json_encode($r1);
}catch (Exception $ex){
    echo ($ex->getMessage());
}



?>