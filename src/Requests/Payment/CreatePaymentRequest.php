<?php

namespace ValoremBiz\Requests\Payment;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use ValoremBiz\Contracts\PaymentInterface;

class CreatePaymentRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected PaymentInterface $payment
    )
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/Pagamento';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    protected function defaultBody(): array
    {
        return $this->payment->payload();
    }
}