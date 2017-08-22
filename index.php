<?php

require __DIR__ . '/vendor/autoload.php';

use Paggi\Paggi;
use Paggi\Cards;

$invalid_token = "1234567890";
$staging_token = "d3606313-bc7e-428d-8254-ec83853bbd72";
$dev_token = "B31DCE74-E768-43ED-86DA-85501612548F";

try {

    $cardParams = array(
        //"customer_id" => "customer_fe6d6d87-4143-476f-80f7-6c52faa90963",
        "name" => "Cartao de teste do Rafa",
        "number" => "4916714249288524",
        "month" => "10",
        "year" => "18",
        "cvc" => "842");

    $customerParams = array(
        "name" => "Rafa Ramos",
        "email" => "rafael.felipe@gmail.com",
        "document"=>"76028147702",
        "card" => $cardParams
    );

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
        "customer_id" => "customer_e80fb1cb-7b83-4f31-8b68-bd64ab4e3ac2",
        "amount" => 1000);
        //"customer_id" => "customer_fe6d6d87-4143-476f-80f7-6c52faa90963");
        //"intermediaries" => $intermediaries);

    $bank_accountParams = array("customer_id" => "customer_fe6d6d87-4143-476f-80f7-6c52faa90963",
        "bank_id" => "bank_7c3fd982-4d39-40c3-acd0-38a293ea3fd1",
        "number" => "12345",
        "digit" => "2",
        "branch" => "3343",
        "branch_digit" => "1");


    Paggi::setApiKey($staging_token);
    Paggi::setStaging(true);

    //$card1 = Cards::create($cardParams);
    //$cards = Cards::findAll();
    //$card2 = Cards::findById("card_98fd0450-7bef-4ff0-a277-cc57a6c216be");
    //$card2 = $card1->delete(); //parametro/objecto

    //foreach ($cards->result as $card){
    //$card2 = Cards::findById($card->id);
    //print_r($card2->brand);
    //}

    //print_r($cards->result[0]['brand']);
    //print_r($cards->result[0]['brand']);
    //print_r($card2->id);
    //print_r($del->id);
    //print_r($card2);

    //$customer = \Paggi\Customers::create($customerParams);

    //$customers = \Paggi\Customers::findAll();
    //$customer = \Paggi\Customers::findById("customer_fe6d6d87-4143-476f-80f7-6c52faa90963");
    //$customer = $customer->update(array("name"=>"Rafael Felipe de Souza"));

    //print_r($customer->cards[0]['name']);


    //foreach ($customers->result as $customer) {
        //$customer = \Paggi\Customers::findById($customer->id);
        //$c = $customer->update(array("name"=>"Thiago Lima"));
        //print_r($c->name);
    //}


    //print_r($customer->id);
    //print_r($customers->total);
    //print_r($customers->list[0]['name']);
    //print_r($customer->name);

    //$bank_account = \Paggi\Bank_accounts::create($bank_accountParams);
    //$bank_account1 = \Paggi\Bank_accounts::findById("bank_account_20f2e3a1-f153-47e4-9384-1693d5cc830b");
    //$banks_accounts = \Paggi\Bank_accounts::findAll();
    //$bank_account1 = $bank_account1->update(array("bank_id"=>"bank_a52f2faa-913f-4c2c-b4f1-c9a050460e5f"));

    //foreach ($banks_accounts->result as $bank_account){
        //$bank_account = $bank->update($bank_accountParams);
        //print_r($bank_account->bank['name']);
    //}


    //print_r($bank_account1->bank['name']);
    //print_r($banks->result[0]['id']);
    //print_r($bank_account2->id);

    //$charge = \Paggi\Charges::create($chargesSimple);
    //$charges = \Paggi\Charges::findAll();
    //$charge = \Paggi\Charges::findById("charge_bbcc55da-ef3b-463a-aa1a-2fe35b4375d9");
    //$charge = $charge->cancel();
    //$charge = $charge->capture();


    //echo json_encode($charge);
    //print_r($charge->id);

    //print_r($charges->total);
    /*foreach ($charges->result as $charge){
        $charge = $charge->cancel();
        print_r($charge->status);
    }*/


    //print_r($charge->status);

    //$banks = \Paggi\Banks::findAll();

    //print_r($banks);

    //foreach ($banks->result as $bank){
    //    print_r($bank->name);
    //}


} catch (Exception $ex) {
    echo($ex->getMessage());
    exit(1);
}

?>