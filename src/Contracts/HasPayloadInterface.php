<?php

namespace ValoremBiz\Contracts;

interface HasPayloadInterface extends \JsonSerializable
{
    public function payload(): array;
}