<?php

namespace ValoremPay\Enums;

enum CardQuantityEnum: string
{
    case ONE = 'Um';
    case TWO = 'Dois';
    case THREE = 'Tres';

    public static function fromInt(int $quantity): self
    {
        return match ($quantity) {
            1 => self::ONE,
            2 => self::TWO,
            3 => self::THREE,
            default => throw new \InvalidArgumentException("Invalid card quantity: {$quantity}"),
        };
    }
}
