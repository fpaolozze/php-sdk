<?php

require __DIR__ . '/vendor/autoload.php';

use Paggi\Paggi;

$invalid_token = "1234567890";
$staging_token = "d3606313-bc7e-428d-8254-ec83853bbd72";
$dev_token = "B31DCE74-E768-43ED-86DA-85501612548F";

try{

$cardParams = array(
    "customer_id" => "customer_74ff4ff0-0d95-4d18-a1c5-187f3fca0df6",
    "name" => "Cartao testando",
    "number" => "4556509599054418",
    "month" => "10",
    "year" => "19",
    "cvc" => "112");

$customerParams = array("name" => "Rafael Felipe de Souza Ramos", "email" => "rafael.felipe1989@gmail.com", "card" => $cardParams);

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

$intermediaries = array($intermediaries, $intermediaries2);

$chargesSimple = array(
    "destination" => "customer_bdb43875-a19f-4d0a-a901-720e33cc5745",
    "amount" => 1000,
    "customer_id" => "customer_ab32d26f-f396-460e-a2c4-7963543055b4",
    "intermediaries"=>$intermediaries);

$bank_accountParams = array("customer_id" => "customer_8057b7ef-80e0-4732-a226-7e024a84b42b",
    "bank_id" => "bank_30860418-f51d-423f-812a-4d7cb659ac82",
    "number" => "0123456",
    "digit" => "1",
    "branch" => "333",
    "branch_digit" => "1");


Paggi::setApiKey($dev_token);

echo Paggi::getToken();



} catch (Exception $ex) {
    echo($ex->getMessage());
    exit(1);
}

?>