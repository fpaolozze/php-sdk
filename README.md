# Paggi PHP SDK

Use esse SDK para integrar sua aplicação com a nossa API [Paggi API](https://docs.paggi.com) 

## Instalação 

Instale via [composer](https://getcomposer.org/)

```sh
composer require paggi/sdk
```

## Como usar

Exemplos de integração

```php
use \Paggi\Paggi;
use \Paggi\Charge;

#API Key
Paggi::setApiKey('B31DCE74-E768-43ED-86DA-85501612548F');

// Criar customer
$customerParams = ["name"=>"name","email"=>"email@paggi.com"];
$customer = Customer::create($customerParams);

// Criar cartão
$cardParams = 
  ["customer_id"=> $customer->id,
  "name"=>"nome portador", 
  "number"=>"5526866710825215",
  "month"=>"10",
  "year"=>"20",
  "cvc"=>"123"];
  
$card = Card::create($cardArray);

// Enviar transação 
// Uma transação pode ser efetuada no cartão 'default' do cliente ou em cartão especifico, para mais detalhes verifique a documentação.
$array = ["customer_id"=> $customer->id, "card_id" => $card->id "amount"=>30000];
$charge = Charge::create($array);

// Listar transações
$charges = Charge::findAll();
$charge0  = $charges['result'][0];

$charge0->cancel();
```

Para mais detalhes visite nossa documentação [API documentation](https://docs.paggi.com/docs)
