<?php

/**
 * @var \ValoremBiz\ValoremBizConnector $connector
 */
$connector = include __DIR__ . '/connector.php';

// Transaction history
$history = new \ValoremBiz\Entities\TransactionHistory();
$history->setStatus(\ValoremBiz\Enums\PaymentStatusEnum::SUCCESS);
$history->setTamanhoDaPagina(1);

$request = $connector->valoremBiz()->getTransactionHistory($history);
$paymentId = $request->json('data.itens.0.pagamentoId');
if (!$paymentId) {
    throw new \Exception('Payment not found');
}

// Cancel payment
$request = $connector->valoremBiz()->cancelPayment($paymentId);
$response = $request->json();

dump($request, $response);
