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
use \Paggi\Customer;
use \Paggi\Card;

// Paggi::setStaging(true);

#API Key
Paggi::setApiKey('B31DCE74-E768-43ED-86DA-85501612548F');

// Criar customer
$customerParams = [
  "name" => "Customer name",
  "email" => "customer@email.com", 
  "document" => "85895152000152"
];

$customer = Customer::create($customerParams);
//echo json_encode($customer);

// Criar cartão
$cardParams = [
  "customer_id"=> $customer->id,
  "name"=>"card holder name", 
  "number"=>"5526866710825215",
  "month"=>"10",
  "year"=>"20",
  "cvc"=>"123"
];
  
$card = Card::create($cardParams);
//echo json_encode($card);

// Enviar transação 
// Uma transação pode ser efetuada no cartão 'default' do cliente ou em cartão especifico, 
// para mais detalhes verifique a documentação.
$array = [
  "customer_id"=> $customer->id, 
  "card_id" => $card->id, 
  "amount"=>30000
];
$chargeCreated = Charge::create($array);
echo json_encode($chargeCreated);

// Listar transações
$charges = Charge::findAll();
//echo json_encode($charges);

// Obtendo uma determinada transação
$charge0 = $charges['result'][0];
//echo json_encode($charge0);

// Cancelar uma transção
$chargeCancelled = $charge0->cancel();
//echo json_encode($chargeCancelled)
```

Para mais detalhes visite nossa documentação [API documentation](https://docs.paggi.com/docs)
