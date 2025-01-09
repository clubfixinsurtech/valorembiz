<?php

/**
 * @var \ValoremPay\ValoremPayConnector $connector
 */
$connector = include __DIR__ . '/connector.php';

// Create payment
$payment = new \ValoremPay\Entities\CreatePayment(
    valor: 99.99,
    numeroDeParcelas: 1,
    qtdeCartoes: \ValoremPay\Enums\CardQuantityEnum::ONE,
);
$payment->setCartoes(
    new \ValoremPay\Entities\Card(
        valor: 99.99,
        numeroDoCartao: '5448280000000007',
        codigoSeguranca: '123',
        mesVencimento: 1,
        anoVencimento: 2028,
        nomeTitular: 'John Doe',
        cpfCnpj: '40834380960',
    )
);

$request = $connector->valoremPay()->createPayment($payment);
$response = $request->json();

dump($request, $response);
