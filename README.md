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

# First, set your API Key
Paggi::setApiKey('B31DCE74-E768-43ED-86DA-85501612548F');

$charges = Charge::findAll();
$charge  = $charges['result'][0];

$charge->cancel();
```

TO see more details, visit our [API documentation](https://docs.paggi.com/docs)
