<?php

namespace ValoremPay\Contracts;

interface HistoryInterface extends HasPayloadInterface
{
    public function validate(): void;
}