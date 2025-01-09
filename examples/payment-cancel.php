<?php

/**
 * @var \ValoremPay\ValoremPayConnector $connector
 */
$connector = include __DIR__ . '/connector.php';

// Transaction history
$history = new \ValoremPay\Entities\TransactionHistory();
$history->setStatus(\ValoremPay\Enums\PaymentStatusEnum::SUCCESS);
$history->setTamanhoDaPagina(1);

$request = $connector->valoremPay()->getTransactionHistory($history);
$paymentId = $request->json('data.itens.0.pagamentoId');
if (!$paymentId) {
    throw new \Exception('Payment not found');
}

// Cancel payment
$request = $connector->valoremPay()->cancelPayment($paymentId);
$response = $request->json();

dump($request, $response);
