<?php

namespace ValoremPay\Entities;

use ValoremPay\Contracts\HasPayloadInterface;
use ValoremPay\Helpers\{PropertyValidator, RequiredFields};
use ValoremPay\Traits\{ConditionableTrait, HasPayload};

class Card implements HasPayloadInterface
{
    use HasPayload, ConditionableTrait;

    protected array $required = [
        'valor',
        'numeroDoCartao',
        'codigoSeguranca',
        'mesVencimento',
        'anoVencimento',
        'nomeTitular',
        'cpfCnpj',
    ];

    private ?string $telefone = null;
    private ?string $email = null;
    private ?string $cep = null;
    private ?string $logradouro = null;
    private ?string $numero = null;
    private ?string $bairro = null;
    private ?string $cidade = null;
    private ?string $uf = null;
    private ?string $complemento = null;

    public function __construct(
        private float  $valor,
        private string $numeroDoCartao,
        private string $codigoSeguranca,
        private int    $mesVencimento,
        private int    $anoVencimento,
        private string $nomeTitular,
        private string $cpfCnpj,
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

    public function getNumeroDoCartao(): string
    {
        return $this->numeroDoCartao;
    }

    public function setNumeroDoCartao(string $numeroDoCartao): self
    {
        $this->numeroDoCartao = $numeroDoCartao;
        $this->validate();
        return $this;
    }

    public function getCodigoSeguranca(): string
    {
        return $this->codigoSeguranca;
    }

    public function setCodigoSeguranca(string $codigoSeguranca): self
    {
        $this->codigoSeguranca = $codigoSeguranca;
        $this->validate();
        return $this;
    }

    public function getMesVencimento(): int
    {
        return $this->mesVencimento;
    }

    public function setMesVencimento(int $mesVencimento): self
    {
        $this->mesVencimento = $mesVencimento;
        $this->validate();
        return $this;
    }

    public function getAnoVencimento(): int
    {
        return $this->anoVencimento;
    }

    public function setAnoVencimento(int $anoVencimento): self
    {
        $this->anoVencimento = $anoVencimento;
        $this->validate();
        return $this;
    }

    public function getNomeTitular(): string
    {
        return $this->nomeTitular;
    }

    public function setNomeTitular(string $nomeTitular): self
    {
        $this->nomeTitular = $nomeTitular;
        $this->validate();
        return $this;
    }

    public function getCpfCnpj(): string
    {
        return $this->cpfCnpj;
    }

    public function setCpfCnpj(string $cpfCnpj): self
    {
        $this->cpfCnpj = $cpfCnpj;
        $this->validate();
        return $this;
    }

    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function setTelefone(?string $telefone): self
    {
        $this->telefone = $telefone;
        $this->validate();
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        $this->validate();
        return $this;
    }

    public function getCep(): ?string
    {
        return $this->cep;
    }

    public function setCep(?string $cep): self
    {
        $this->cep = $cep;
        $this->validate();
        return $this;
    }

    public function getLogradouro(): ?string
    {
        return $this->logradouro;
    }

    public function setLogradouro(?string $logradouro): self
    {
        $this->logradouro = $logradouro;
        $this->validate();
        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $numero): self
    {
        $this->numero = $numero;
        $this->validate();
        return $this;
    }

    public function getBairro(): ?string
    {
        return $this->bairro;
    }

    public function setBairro(?string $bairro): self
    {
        $this->bairro = $bairro;
        $this->validate();
        return $this;
    }

    public function getCidade(): ?string
    {
        return $this->cidade;
    }

    public function setCidade(?string $cidade): self
    {
        $this->cidade = $cidade;
        $this->validate();
        return $this;
    }

    public function getUf(): ?string
    {
        return $this->uf;
    }

    public function setUf(?string $uf): self
    {
        $this->uf = $uf;
        $this->validate();
        return $this;
    }

    public function getComplemento(): ?string
    {
        return $this->complemento;
    }

    public function setComplemento(?string $complemento): self
    {
        $this->complemento = $complemento;
        $this->validate();
        return $this;
    }
}