<?php

require __DIR__ . '/vendor/autoload.php';

use Paggi\Paggi;

$invalid_token = "1234567890";
$staging_token = "d3606313-bc7e-428d-8254-ec83853bbd72";
$dev_token = "B31DCE74-E768-43ED-86DA-85501612548F";

try{

$paggi = new Paggi( $dev_token,true);

$cardParams = array(
    "customer_id" => "customer_74ff4ff0-0d95-4d18-a1c5-187f3fca0df6",
    "name" => "Cartao testando",
    "number" => "5514967494092156",
    "month" => "12",
    "year" => "20",
    "cvc" => "210");

$customerParams = array("name" => "Rafael Felipe", "email" => "rafael@gmail.com", "card" => $cardParams);

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


    //echo Paggi::isStaging();
    //echo Paggi::getToken();

    ## Cards

    //$c = $paggi->cards()->createCard($cardParams);
    //$c = $paggi->cards()->delete("card_609fe86f-5657-4a4b-873c-a9f98cbaa5f4");
    //$c = $paggi->cards()->findById("card_609fe86f-5657-4a4b-873c-a9f98cbaa5f4");
    //$c = $paggi->cards()->findAll();

    //print_r($c->result[0]['brand']); //findAll
    //print_r($c->id);

    ## Customers

    //$customer = $paggi->customers()->findById("customer_7241f2c6-d8d7-4648-9843-e494c1ac881b");
    //$customer = $paggi->customers()->create($customerParams);
    //$customer = $paggi->customers()->update("customer_7c2e30e4-ccbd-4431-afd0-1c93d5641ab5",array("name"=>"ANA PAULA"));
    //$customer = $paggi->customers()->findAll();

    //print_r($customer->total);
    //print_r($customer->result[0]['name']);
    //print_r($customer->name);

    ## Charges

    $charge1 = $paggi->charges()->charge($chargesSimple);
    $charge2 = $paggi->charges()->cancel("charge_8dc93a37-cba4-4201-a122-b4caed0ea20a");
    $charge3 = $paggi->charges()->capture("charge_fb322e1b-b577-485f-828c-56ddca16c522");
    $charge4 = $paggi->charges()->findById("charge_fb322e1b-b577-485f-828c-56ddca16c522");
    $charge5 = $paggi->charges()->findAll();

    echo($charge1->status);
    echo json_encode($charge5->result[0]['status']);

    ## Banks

    //$b = $paggi->banks()->findAll();
    //print_r($b->list);
    //print_r ($b->list[9]->id);


    ## Bank Accounts

    //$bancoAccount = $paggi->bank_accounts()->findById("bank_account_cbf23629-0eb5-47c8-b7ae-cbb9e7360ec8");
    //$bancoAccount = $paggi->bank_accounts()->create($bank_accountParams);
    //$bancoAccount = $paggi->bank_accounts()->findAll();
    //$bancoAccount = $paggi->bank_accounts()->update("bank_account_cbf23629-0eb5-47c8-b7ae-cbb9e7360ec8");


    //print_r($bancoAccount->id);
    //print_r($bancoAccount->result[0]['number']);

    //$paggi2 = $paggi->newCall();
    //$can = $paggi2->charges()->cancel($ch->id);
    //echo json_encode($can)

} catch (Exception $ex) {
    echo($ex->getMessage());
    exit(1);
}

//$cl = $paggi->newCall()->cards()->delete($c->id);

?>