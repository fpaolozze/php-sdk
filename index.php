<?php

require __DIR__ . '/vendor/autoload.php';

use Paggi\Paggi;

$staging_token = "d3606313-bc7e-428d-8254-ec83853bbd72";
$dev_token = "B31DCE74-E768-43ED-86DA-85501612548F";


$paggi = new Paggi($dev_token, true);

$cardParams = array(
    "customer_id" => "customer_7241f2c6-d8d7-4648-9843-e494c1ac881b",
    "name" => "Cartao testando",
    "number" => "5514967494092156",
    "month" => "12",
    "year" => "20",
    "cvc" => "210");

$customerParams = array("name" => "Rafael Felipe", "email" => "rafael@gmail.com", "card" => $cardParams);

//Paggi::isStaging();
//echo Paggi::getToken();


try {
    //$p = $paggi->newCall();
    //$paggi->cards()->findAll();
    //$r3 = $paggi->cards()->createCard($cardParams);
    //$r2 = $paggi->cards()->delete("card_609fe86f-5657-4a4b-873c-a9f98cbaa5f4");
    //$r3 = $paggi->cards()->findById($r1->id);
    //echo json_encode($r1);
    //$r3 = $paggi->cards()->findById("card_609fe86f-5657-4a4b-873c-a9f98cbaa5f4");

    //$b = $paggi->banks()->findAll();

    //$c = $paggi->customers()->findById("customer_7241f2c6-d8d7-4648-9843-e494c1ac881b");
    //$c = $paggi->customers()->create($customerParams);
    //$c = $paggi->customers()->update("customer_7c2e30e4-ccbd-4431-afd0-1c93d5641ab5",array("name"=>"ANA PAULA"));
    //$c = $paggi->customers()->findAll();

    $intermediaries = array(
        "fee" => 20.0,
        "flat" => 10,
        "description" => "Win 10 cents promotion",
        "customer_id" => "customer_74ff4ff0-0d95-4d18-a1c5-187f3fca0df6"
    );

    $intermediaries2 = array(
        "fee" => 0.0,
        "flat" => 10,
        "description" => "Win 10 cents promotion",
        "customer_id" => "customer_7c2e30e4-ccbd-4431-afd0-1c93d5641ab5"
    );

    $t = array($intermediaries,$intermediaries2);

    $chargesSimple = array(
        "destination" => "customer_bdb43875-a19f-4d0a-a901-720e33cc5745",
        "amount" => 1000,
        "customer_id" => "customer_ab32d26f-f396-460e-a2c4-7963543055b4",
        "intermediaries"=>$t
    );

    //$ch = $paggi->charges()->charge($chargesSimple);
    //$ch = $paggi->charges()->cancel("charge_fb322e1b-b577-485f-828c-56ddca16c522");
    //$ch = $paggi->charges()->capture("charge_fb322e1b-b577-485f-828c-56ddca16c522");
    //$ch = $paggi->charges()->findById("charge_5ffe3202-a32b-4fec-8bd9-b7afed68cba6");
    $ch = $paggi->charges()->findAll();
    echo json_encode($ch);

    //$paggi2 = $paggi->newCall();
    //$can = $paggi2->charges()->cancel($ch->id);
    //echo json_encode($can)

} catch (Exception $ex) {
    echo($ex->getMessage());
}


?>