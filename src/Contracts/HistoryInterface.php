<?php

namespace ValoremBiz\Contracts;

interface HistoryInterface extends HasPayloadInterface
{
    public function validate(): void;
}