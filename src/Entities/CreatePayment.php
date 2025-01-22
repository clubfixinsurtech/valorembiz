<?php

namespace ValoremBiz\Entities;

use ValoremBiz\Contracts\PaymentInterface;
use ValoremBiz\Enums\CardQuantityEnum;
use ValoremBiz\Helpers\{PropertyValidator, RequiredFields};
use ValoremBiz\Traits\{ConditionableTrait, HasPayload};

class CreatePayment implements PaymentInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [
        'valor',
        'numeroDeParcelas',
        'qtdeCartoes',
    ];

    private ?string $tributo = null;
    private ?string $idExterno = null;
    private ?array $cartoes = null;

    public function __construct(
        private float            $valor,
        private int              $numeroDeParcelas,
        private CardQuantityEnum $qtdeCartoes = CardQuantityEnum::ONE,
    )
    {
        $this->validate();
    }

    public function validate(): void
    {
        RequiredFields::check($this->required, $this);
        PropertyValidator::validate($this);
    }

    public function getRequired(): array
    {
        return $this->required;
    }

    public function setRequired(array $required): self
    {
        $this->required = $required;
        return $this;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function setValor(float $valor): self
    {
        $this->valor = $valor;
        $this->validate();
        return $this;
    }

    public function getNumeroDeParcelas(): int
    {
        return $this->numeroDeParcelas;
    }

    public function setNumeroDeParcelas(int $numeroDeParcelas): self
    {
        $this->numeroDeParcelas = $numeroDeParcelas;
        $this->validate();
        return $this;
    }

    public function getQtdeCartoes(): CardQuantityEnum
    {
        return $this->qtdeCartoes;
    }

    public function setQtdeCartoes(CardQuantityEnum $qtdeCartoes): self
    {
        $this->qtdeCartoes = $qtdeCartoes;
        $this->validate();
        return $this;
    }

    public function getTributo(): ?string
    {
        return $this->tributo;
    }

    public function setTributo(?string $tributo): self
    {
        $this->tributo = $tributo;
        $this->validate();
        return $this;
    }

    public function getIdExterno(): ?string
    {
        return $this->idExterno;
    }

    public function setIdExterno(?string $idExterno): self
    {
        $this->idExterno = $idExterno;
        $this->validate();
        return $this;
    }

    public function getCartoes(): ?array
    {
        return $this->cartoes;
    }

    public function setCartoes(Card $card): self
    {
        $this->cartoes[] = $card->payload();
        $this->validate();
        return $this;
    }
}