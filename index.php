<?php

require __DIR__ . '/vendor/autoload.php';

use Paggi\Paggi;
use Paggi\Cards;

$invalid_token = "1234567890";
$staging_token = "d3606313-bc7e-428d-8254-ec83853bbd72";
$dev_token = "B31DCE74-E768-43ED-86DA-85501612548F";

try {

    $cardParams = array(
        "customer_id" => "customer_10426432-ac74-48e3-8d7f-8f410e50c938",
        "name" => "Cartao testando",
        "number" => "5478991791114004",
        "month" => "10",
        "year" => "19",
        "cvc" => "123");

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
        "intermediaries" => $intermediaries);

    $bank_accountParams = array("customer_id" => "customer_8057b7ef-80e0-4732-a226-7e024a84b42b",
        "bank_id" => "bank_30860418-f51d-423f-812a-4d7cb659ac82",
        "number" => "0123456",
        "digit" => "1",
        "branch" => "333",
        "branch_digit" => "1");


    Paggi::setApiKey($dev_token);
    Paggi::setStaging(false);

    //$card1 = Cards::create($cardParams);
    //$cards = Cards::findAll();
    //$card2 = Cards::findById($card1->id);
    //$card2 = $card1->delete(); //parametro/objecto

    //foreach ($cards->result as $card){
    //$card2 = Cards::findById($card->id);
    //print_r($card2->brand);
    //}

    //print_r($cards->result[0]['brand']);
    //print_r($cards->result[0]['brand']);
    //print_r($card1->id);
    //print_r($del->id);
    //print_r($card2);

    //$customer = \Paggi\Customers::create($customerParams);
    //$customers = \Paggi\Customers::findAll();
    //$customer = \Paggi\Customers::findById($customer->id);
    //$customer = $customer->update(array("name"=>"Rafael Ramos"));

    //foreach ($customers->result as $customer) {
        //$customer = \Paggi\Customers::findById($customer->id);
        //print_r($customer->name);
    //}


    //print_r($customer->name);
    //print_r($customers->total);
    //print_r($customers->list[0]['name']);
    //print_r($customer->name);

    //$bank_account = \Paggi\Bank_accounts::create($bank_accountParams);
    //$bank_account1 = \Paggi\Bank_accounts::findById($bank_account->id);
    //$banks = \Paggi\Bank_accounts::findAll();
    //$bank_account = $bank_account1->update($bank_accountParams);

    //foreach ($banks->result as $bank){
        //$bank_account = $bank->update($bank_accountParams);
        //print_r($bank_account->number);
    //}


    //print_r($bank_account->branch);
    //print_r($banks->result[0]['id']);
    //print_r($bank_account2->id);

    //$charge = \Paggi\Charges::create($chargesSimple);
    //$charges = \Paggi\Charges::findAll();
    //$charge = \Paggi\Charges::findById($charge->id);
    //$charge = $charge->cancel();
    //$charge = $charge->capture();


    //echo json_encode($charge);
    //print_r($charge->status);

    //print_r($charges->total);
    /*foreach ($charges->result as $charge){
        $charge = $charge->cancel();
        print_r($charge->status);
    }*/


    //print_r($charge->status);

    //$banks = \Paggi\Banks::findAll();
    //foreach ($banks->result as $bank){
        //print_r($bank->name);
    //}


} catch (Exception $ex) {
    echo($ex->getMessage());
    exit(1);
}

?>