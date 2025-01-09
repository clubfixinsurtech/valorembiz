<?php

/**
 * @var \ValoremPay\ValoremPayConnector $connector
 */
$connector = include __DIR__ . '/connector.php';

// Transaction history
$history = new \ValoremPay\Entities\TransactionHistory();
$history->setStatus(\ValoremPay\Enums\PaymentStatusEnum::SUCCESS);

$request = $connector->valoremPay()->getTransactionHistory($history);
$response = $request->json();

dump($request, $response);
