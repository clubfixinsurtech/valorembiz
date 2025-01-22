<?php

namespace ValoremBiz\Enums;

enum PaymentStatusEnum: int
{
    case PENDING = 1;
    case SUCCESS = 2;
    case ERROR = 3;

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $status): string
    {
        return match ($status) {
            self::PENDING => 'Pendente',
            self::SUCCESS => 'Sucesso',
            self::ERROR => 'Erro',
        };
    }
}
