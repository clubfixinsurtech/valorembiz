<?php

namespace ValoremBiz\Requests\Payment;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use ValoremBiz\Contracts\HistoryInterface;

class TransactionHistoryRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly HistoryInterface $history,
    )
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/Pagamento/historico-transacoes';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    protected function defaultQuery(): array
    {
        return $this->history->payload();
    }
}