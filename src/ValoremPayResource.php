<?php

namespace ValoremPay;

use Saloon\Http\{BaseResource, Response};
use ValoremPay\Contracts\HistoryInterface;
use ValoremPay\Contracts\PaymentInterface;
use ValoremPay\Requests\Payment\{CancelPaymentRequest, CreatePaymentRequest, TransactionHistoryRequest};

class ValoremPayResource extends BaseResource
{
    public function createPayment(PaymentInterface $payment): Response
    {
        return $this->connector->send(new CreatePaymentRequest($payment));
    }

    public function cancelPayment(string $paymentId): Response
    {
        return $this->connector->send(new CancelPaymentRequest($paymentId));
    }

    public function getTransactionHistory(HistoryInterface $history): Response
    {
        return $this->connector->send(new TransactionHistoryRequest($history));
    }
}