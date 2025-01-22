<?php

/**
 * @var \ValoremBiz\ValoremBizConnector $connector
 */
$connector = include __DIR__ . '/connector.php';

// Create payment
$payment = new \ValoremBiz\Entities\CreatePayment(
    valor: 99.99,
    numeroDeParcelas: 1,
    qtdeCartoes: \ValoremBiz\Enums\CardQuantityEnum::ONE,
);
$payment->setCartoes(
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
