<?php

namespace ValoremBiz;

use Saloon\Http\{BaseResource, Response};
use ValoremBiz\Contracts\HistoryInterface;
use ValoremBiz\Contracts\PaymentInterface;
use ValoremBiz\Requests\Payment\{CancelPaymentRequest, CreatePaymentRequest, TransactionHistoryRequest};

class ValoremBizResource extends BaseResource
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