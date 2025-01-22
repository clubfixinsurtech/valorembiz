<?php

/**
 * @var \ValoremBiz\ValoremBizConnector $connector
 */
$connector = include __DIR__ . '/connector.php';

// Transaction history
$history = new \ValoremBiz\Entities\TransactionHistory();
$history->setStatus(\ValoremBiz\Enums\PaymentStatusEnum::SUCCESS);

$request = $connector->valoremBiz()->getTransactionHistory($history);
$response = $request->json();

dump($request, $response);
