<?php

namespace ValoremPay\Requests\Payment;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class CancelPaymentRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $paymentId
    )
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/Pagamento/Cancelamento';
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
        return [
            'idPagamento' => $this->paymentId,
        ];
    }
}