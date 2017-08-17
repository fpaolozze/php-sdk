<?php

require __DIR__ . '/vendor/autoload.php';

use Paggi\Paggi;
use Paggi\Customers;
use Paggi\Cards;
use Paggi\Bank_accounts;
use Paggi\Charges;
use Paggi\Custom;

$dev_token = "B31DCE74-E768-43ED-86DA-85501612548F";
$staging_token = "d3606313-bc7e-428d-8254-ec83853bbd72";

Paggi::init($dev_token, true);

//CARDS ##############################

//$cards = new Cards();

$metadata = array("internal_id" => "84372");

$cardParams = array("customer_id" => "customer_7241f2c6-d8d7-4648-9843-e494c1ac881b",
    "name" => "Cartao testando",
    "number" => "5514967494092156",
    "month" => "12",
    "year" => "20",
    "cvc" => "210",
    "card_alias" => "Cartao dourado");

$params = array("bank_id" => "bank_30860418-f51d-423f-812a-4d7cb659ac82",
    "customer_id" => "customer_7241f2c6-d8d7-4648-9843-e494c1ac881b",
    "number" => "123445",//012922
    "digit" => "1",
    "branch" => "333",
    "branch_digit" => "1");

//$res = $cards->findAll(); //implementar findAll
//$res = $cards->findById("card_79ca5b97-3d40-42d6-ae85-21fa26e737e2");
//echo json_encode($res);

//BANK_ACCOUNTS #########################

//$bank_accounts = new Bank_accounts($params);

/*$array = ($bank_accounts->findAll()->result);
foreach ($array as $account){
    print_r(json_encode($account)."<p>");
}*/

//echo json_encode($bank_accounts);

//$res = ($bank_accounts->findAll());
//$res =  ($bank_accounts->findById("bank_account_bfbbd2f5-c3f2-41db-9b69-c97f3fa580bc"));//->number
//$res =  ($bank_accounts->create($params)->customer_id);//bank['name']
//$res = $bank_accounts->update("bank_account_bfbbd2f5-c3f2-41db-9b69-c97f3fa580bc",$params); //->number

//$res = $bank_accounts->create();
//echo json_encode($res);

//CHARGES #######################################

$chargesSimple = array(
    "amount"=>100,
    "customer_id"=>"customer_ab32d26f-f396-460e-a2c4-7963543055b4");

$charges = new Charges($chargesSimple);
$res = $charges->charge();
//$res = $charges->cancel("charge_1b3a31a8-78b8-4ae7-a6e3-9f0776c4f2d9");
//$res = $charges->findAll();
echo (json_encode($res));//->customer


//Requests

$banks = new Banks();
$list = $banks->getList();

$customers = new Customers($params);
$customers->create();
$customers->findById("id");
$customers->findAll();

$cards = new Cards($params);
$cards->create();
$cards->findAll();
$cards->findById("id");

$charges = new Charges($params);
$charges->create();
$charges->findById("id");
$charges->findAll();






?>
