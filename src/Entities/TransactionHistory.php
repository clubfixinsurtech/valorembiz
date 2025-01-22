<?php

namespace ValoremBiz\Entities;

use ValoremBiz\Contracts\HistoryInterface;
use ValoremBiz\Traits\{ConditionableTrait, HasPayload};
use ValoremBiz\Enums\PaymentStatusEnum;
use ValoremBiz\Helpers\PropertyValidator;

class TransactionHistory implements HistoryInterface
{
    use HasPayload, ConditionableTrait;

    private ?PaymentStatusEnum $Status = null;
    private null|string|\DateTimeInterface $DataInicio = null;
    private null|string|\DateTimeInterface $DataTermino = null;
    private ?int $TamanhoDaPagina = null;
    private ?int $NumeroDaPagina = null;

    public function __construct()
    {
        $this->validate();
    }

    public function validate(): void
    {
        PropertyValidator::validate($this);
    }

    public function getStatus(): ?string
    {
        return $this->Status?->value;
    }

    public function setStatus(?PaymentStatusEnum $Status): self
    {
        $this->Status = $Status;
        $this->validate();
        return $this;
    }

    public function getDataInicio(): ?string
    {
        return $this->DataInicio;
    }

    public function setDataInicio(\DateTimeInterface|string|null $DataInicio): self
    {
        $this->DataInicio = $this->resolveDate($DataInicio);
        $this->validate();
        return $this;
    }

    public function getDataTermino(): ?string
    {
        return $this->DataTermino;
    }

    public function setDataTermino(\DateTimeInterface|string|null $DataTermino): self
    {
        $this->DataTermino = $this->resolveDate($DataTermino);
        $this->validate();
        return $this;
    }

    public function getTamanhoDaPagina(): ?int
    {
        return $this->TamanhoDaPagina;
    }

    public function setTamanhoDaPagina(?int $TamanhoDaPagina): self
    {
        $this->TamanhoDaPagina = $TamanhoDaPagina;
        $this->validate();
        return $this;
    }

    public function getNumeroDaPagina(): ?int
    {
        return $this->NumeroDaPagina;
    }

    public function setNumeroDaPagina(?int $NumeroDaPagina): self
    {
        $this->NumeroDaPagina = $NumeroDaPagina;
        $this->validate();
        return $this;
    }

    protected function resolveDate(\DateTimeInterface|string|null $date): ?string
    {
        if ($date instanceof \DateTimeInterface) {
            return $date->format('Y-m-d');
        }

        return $date;
    }
}