# Valorem Checkout Business @ClubFix

[![Maintainer](http://img.shields.io/badge/maintainer-@clubfixinsurtech-blue.svg?style=flat-square)](https://twitter.com/WilderAmorim)
[![Source Code](http://img.shields.io/badge/source-clubfixinsurtech/valorembiz-blue.svg?style=flat-square)](https://github.com/clubfixinsurtech/valorembiz)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/clubfixinsurtech/valorembiz.svg?style=flat-square)](https://packagist.org/packages/clubfixinsurtech/valorembiz)
[![Latest Version](https://img.shields.io/github/release/clubfixinsurtech/valorembiz.svg?style=flat-square)](https://github.com/clubfixinsurtech/valorembiz/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build](https://img.shields.io/scrutinizer/build/g/clubfixinsurtech/valorembiz.svg?style=flat-square)](https://scrutinizer-ci.com/g/clubfixinsurtech/valorembiz)
[![Quality Score](https://img.shields.io/scrutinizer/g/clubfixinsurtech/valorembiz.svg?style=flat-square)](https://scrutinizer-ci.com/g/clubfixinsurtech/valorembiz)
[![Total Downloads](https://img.shields.io/packagist/dt/clubfixinsurtech/valorembiz.svg?style=flat-square)](https://packagist.org/packages/clubfixinsurtech/valorembiz)

###### Integration with the ValoremPay payment gateway.

Integração com o Gateway de Pagamento Valorem Pay Checkout Business.

### Highlights

- Simple installation (Instalação simples)
- Composer ready and PSR-2 compliant (Pronto para o composer e compatível com PSR-2)

### Available services

* Fluxo de pagamento Checkout Transparente
* Estorno do pagamento
* Histórico de transações

## Installation

Valorem Pay is available via Composer:

```bash
composer require clubfixinsurtech/valorembiz
```

## Documentation

###### For more details on how to use it, see the "examples" folder in the component's directory. It contains an example of how to use the class. It works as follows:

Para obter mais detalhes sobre como utilizar, consulte a pasta "examples" no diretório do componente. Nela, haverá um exemplo de utilização da classe. O funcionamento é o seguinte:

##### Basic Usage:

```php
<?php

$token = '';
$isSandbox = true;

$connector = new \ValoremBiz\ValoremBizConnector(token: $token, isSandbox: $isSandbox);

// Create payment
$payment = (new \ValoremBiz\Entities\CreatePayment(
    valor: 99.99,
    numeroDeParcelas: 1,
    qtdeCartoes: \ValoremBiz\Enums\CardQuantityEnum::ONE,
))->setCartoes(
    new \ValoremBiz\Entities\Card(
        valor: 99.99,
        numeroDoCartao: '5448280000000007',
        codigoSeguranca: '123',
        mesVencimento: 1,
        anoVencimento: 2028,
        nomeTitular: 'John Doe',
        cpfCnpj: '40834380960',
    )
);

$request = $connector->valoremBiz()->createPayment($payment);
$response = $request->json();

dump($request, $response);
```

## Credits

- [Clubfix](https://clubfix.com.br) (Team)

## License

The MIT License (MIT). Please see [License File](https://github.com/clubfixinsurtech/valorembiz/blob/master/LICENSE) for more information.