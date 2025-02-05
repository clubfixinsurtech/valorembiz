<?php

namespace ValoremBiz;

use Saloon\Http\Connector;

class ValoremBizConnector extends Connector
{
    public function __construct(
        private readonly string $token,
        private readonly bool   $isSandbox = true,
    )
    {
        //
    }

    public function resolveBaseUrl(): string
    {
        if ($this->isSandbox === true) {
            return 'https://external-api-homolog.checkout.valorem.com.br/api/v1';
        }

        return 'https://external-api.checkout.valorem.com.br/api/v1';
    }

    public function valoremBiz(): ValoremBizResource
    {
        return new ValoremBizResource($this);
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'token' => $this->token,
        ];
    }
}
