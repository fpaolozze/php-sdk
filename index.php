<?php

require __DIR__ . '/vendor/autoload.php';

use Paggi\Paggi;
use Paggi\Customers;
use Paggi\Cards;
use Paggi\model\Card;
use Paggi\Bank_accounts;

$dev_token = "B31DCE74-E768-43ED-86DA-85501612548F";
$staging_token = "d3606313-bc7e-428d-8254-ec83853bbd72";

Paggi::init($dev_token, true);


$card = new Card();
$cards = new Cards();
$bank_accounts = new Bank_accounts();

$metadata = array("internal_id" => "84372");

$cardParams = array("customer_id" => "customer_7241f2c6-d8d7-4648-9843-e494c1ac881b",
    "name" => "Cartao testando",
    "number" => "5514967494092156",
    "month" => "12",
    "year" => "20",
    "cvc" => "210",
    "card_alias" => "Cartao dourado");

//$cardIdStaging = "card_6d502929-c214-4c3f-8e4d-191bd42edafa"; //DevStaging


$params = array("bank_id" => "bank_30860418-f51d-423f-812a-4d7cb659ac82",
    "customer_id" => "customer_7241f2c6-d8d7-4648-9843-e494c1ac881b",
    "number" => "012922",
    "digit" => "1",
    "branch" => "333",
    "branch_digit" => "1");

/*$array = ($bank_accounts->findAll()->result);
foreach ($array as $account){
    print_r(json_encode($account)."<p>");
}*/
//$res1 = ($cards->findAll());

//$res =  ($bank_accounts->findById("bank_account_bfbbd2f5-c3f2-41db-9b69-c97f3fa580bc"));//->number
//$res =  ($bank_accounts->create($params)->customer_id);//bank['name']
//$res = $bank_accounts->update("bank_account_bfbbd2f5-c3f2-41db-9b69-c97f3fa580bc",$params); //->number

//$res = $cards->findAll();
//$res = $cards->findById("card_79ca5b97-3d40-42d6-ae85-21fa26e737e2");
//$res = $cards->create($cardParams);

echo(json_encode($res));


?>
