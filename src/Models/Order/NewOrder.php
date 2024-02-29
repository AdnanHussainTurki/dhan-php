<?php

namespace AdnanHussainTurki\Dhan\Models\Order;

use AdnanHussainTurki\Dhan\Models\Commons\AmoTime;
use AdnanHussainTurki\Dhan\Models\Commons\DrvOptionType;
use AdnanHussainTurki\Dhan\Models\Commons\ExchangeSegment;
use AdnanHussainTurki\Dhan\Models\Commons\OrderType;
use AdnanHussainTurki\Dhan\Models\Commons\OrderValidity;
use AdnanHussainTurki\Dhan\Models\Commons\ProductType;
use InvalidArgumentException;

class NewOrder
{
    private string $dhanClientId;
    private string $correlationId;
    private string $transactionType;
    private string $exchangeSegment;
    private string $productType;
    private string $orderType;
    private string $validity;
    private string $tradingSymbol;
    private string $securityId;
    private int $quantity;
    private ?int $disclosedQuantity = null;
    private ?float $price = null;
    private ?float $triggerPrice = null;
    private bool $afterMarketOrder = false;
    private ?string $amoTime = null;
    private ?float $boProfitValue = null;
    private ?float $boStopLossValue = null;
    private ?string $drvExpiryDate = null;
    private ?string $drvOptionType = null;
    private ?float $drvStrikePrice = null;

    private $required = ['transactionType', 'exchangeSegment', 'productType', 'orderType', 'validity', 'securityId', 'quantity', 'price'];

    public function getDhanClientId(): string
    {
        return $this->dhanClientId;
    }

    public function setDhanClientId(string $dhanClientId): void
    {
        $this->dhanClientId = $dhanClientId;
    }

    public function getCorrelationId(): string
    {
        return $this->correlationId;
    }

    public function setCorrelationId(string $correlationId): void
    {
        $this->correlationId = $correlationId;
    }

    public function getTransactionType(): string
    {
        return $this->transactionType;
    }

    public function setTransactionType(string $transactionType): void
    {
        $validTypes = ['BUY', 'SELL'];
        if (!in_array($transactionType, $validTypes)) {
            throw new InvalidArgumentException('Invalid transaction type.');
        }
        $this->transactionType = $transactionType;
    }

    public function getExchangeSegment(): string
    {
        return $this->exchangeSegment;
    }

    public function setExchangeSegment(string $exchangeSegment): void
    {
        ExchangeSegment::validate($exchangeSegment);
        $this->exchangeSegment = $exchangeSegment;
    }

    public function getProductType(): string
    {
        return $this->productType;
    }

    public function setProductType(string $productType): void
    {
        ProductType::validate($productType);
        $this->productType = $productType;
    }

    public function getOrderType(): string
    {
        return $this->orderType;
    }

    public function setOrderType(string $orderType): void
    {
        OrderType::validate($orderType);
        $this->orderType = $orderType;
    }

    public function getValidity(): string
    {
        return $this->validity;
    }

    public function setValidity(string $validity): void
    {
        OrderValidity::validate($validity);
        $this->validity = $validity;
    }

    public function getTradingSymbol(): string
    {
        return $this->tradingSymbol;
    }

    public function setTradingSymbol(string $tradingSymbol): void
    {
        $this->tradingSymbol = $tradingSymbol;
    }

    public function getSecurityId(): string
    {
        return $this->securityId;
    }

    public function setSecurityId(string $securityId): void
    {
        $this->securityId = $securityId;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getDisclosedQuantity(): ?int
    {
        return $this->disclosedQuantity;
    }

    public function setDisclosedQuantity(?int $disclosedQuantity): void
    {
        $this->disclosedQuantity = $disclosedQuantity;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): void
    {
        $this->price = $price;
    }

    public function getTriggerPrice(): ?float
    {
        return $this->triggerPrice;
    }

    public function setTriggerPrice(?float $triggerPrice): void
    {
        $this->triggerPrice = $triggerPrice;
    }

    public function getAfterMarketOrder(): bool
    {
        return $this->afterMarketOrder;
    }

    public function setAfterMarketOrder(bool $afterMarketOrder): void
    {
        $this->afterMarketOrder = $afterMarketOrder;
    }

    public function getAmoTime(): ?string
    {
        return $this->amoTime;
    }

    public function setAmoTime(?string $amoTime): void
    {
        AmoTime::validate($amoTime);

        $this->amoTime = $amoTime;
    }

    public function getBoProfitValue(): ?float
    {
        return $this->boProfitValue;
    }

    public function setBoProfitValue(?float $boProfitValue): void
    {
        $this->boProfitValue = $boProfitValue;
    }

    public function getBoStopLossValue(): ?float
    {
        return $this->boStopLossValue;
    }

    public function setBoStopLossValue(?float $boStopLossValue): void
    {
        $this->boStopLossValue = $boStopLossValue;
    }

    public function getDrvExpiryDate(): ?string
    {
        return $this->drvExpiryDate;
    }

    public function setDrvExpiryDate(?string $drvExpiryDate): void
    {
        $this->drvExpiryDate = $drvExpiryDate;
    }

    public function getDrvOptionType(): ?string
    {
        return $this->drvOptionType;
    }

    public function setDrvOptionType(?string $drvOptionType): void
    {
        DrvOptionType::validate($drvOptionType);
        $this->drvOptionType = $drvOptionType;
    }

    public function getDrvStrikePrice(): ?float
    {
        return $this->drvStrikePrice;
    }


    public function setDrvStrikePrice(?float $drvStrikePrice): void
    {
        $this->drvStrikePrice = $drvStrikePrice;
    }

    public function validate()
    {
        foreach ($this->required as $field) {
            if (empty($this->$field)) {
                throw new InvalidArgumentException("Field $field is required.");
            }
        }
    }

    public function toArray(): array
    {
        $this->validate();
        if (empty($this->dhanClientId)) {
            throw new InvalidArgumentException("Field dhanClientId is required.");
        }
        return get_object_vars($this);
    }
}
