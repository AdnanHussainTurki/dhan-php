<?php

namespace AdnanHussainTurki\Dhan\Models\Order;

use InvalidArgumentException;
use AdnanHussainTurki\Dhan\Models\Commons\TransactionType;
use AdnanHussainTurki\Dhan\Models\Commons\ExchangeSegment;
use AdnanHussainTurki\Dhan\Models\Commons\ProductType;
use AdnanHussainTurki\Dhan\Models\Commons\OrderType;
use DateTime;

class Trade
{
    private string $dhanClientId;
    private string $orderId;
    private string $exchangeOrderId;
    private string $exchangeTradeId;
    private string $transactionType;
    private string $exchangeSegment;
    private string $productType;
    private string $orderType;
    private string $tradingSymbol;
    private string $securityId;
    private int $tradedQuantity;
    private float $tradedPrice;
    private string $createTime;
    private string $updateTime;
    private string $exchangeTime;
    private ?int $drvExpiryDate = null;
    private ?string $drvOptionType = null;
    private ?float $drvStrikePrice = null;

    private $required = ['dhanClientId', 'orderId', 'exchangeOrderId', 'exchangeTradeId', 'transactionType', 'exchangeSegment', 'productType', 'orderType', 'tradingSymbol', 'securityId', 'tradedQuantity', 'tradedPrice', 'createTime', 'updateTime', 'exchangeTime'];

    public function getDhanClientId(): string
    {
        return $this->dhanClientId;
    }

    public function setDhanClientId(string $dhanClientId): void
    {
        $this->dhanClientId = $dhanClientId;
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
    }

    public function getExchangeOrderId(): string
    {
        return $this->exchangeOrderId;
    }

    public function setExchangeOrderId(string $exchangeOrderId): void
    {
        $this->exchangeOrderId = $exchangeOrderId;
    }

    public function getExchangeTradeId(): string
    {
        return $this->exchangeTradeId;
    }

    public function setExchangeTradeId(string $exchangeTradeId): void
    {
        $this->exchangeTradeId = $exchangeTradeId;
    }

    public function getTransactionType(): string
    {
        return $this->transactionType;
    }

    public function setTransactionType(string $transactionType): void
    {
        TransactionType::validate($transactionType);
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

    public function getTradedQuantity(): int
    {
        return $this->tradedQuantity;
    }

    public function setTradedQuantity(int $tradedQuantity): void
    {
        $this->tradedQuantity = $tradedQuantity;
    }

    public function getTradedPrice(): float
    {
        return $this->tradedPrice;
    }

    public function setTradedPrice(float $tradedPrice): void
    {
        $this->tradedPrice = $tradedPrice;
    }

    public function getCreateTime(): string
    {
        return $this->createTime;
    }

    public function setCreateTime(string $createTime): void
    {
        // Validate date format if needed
        $this->createTime = $createTime;
    }

    public function getUpdateTime(): string
    {
        return $this->updateTime;
    }

    public function setUpdateTime(string $updateTime): void
    {
        // Validate date format if needed
        $this->updateTime = $updateTime;
    }

    public function getExchangeTime(): string
    {
        return $this->exchangeTime;
    }

    public function setExchangeTime(string $exchangeTime): void
    {
        // Validate date format if needed
        $this->exchangeTime = $exchangeTime;
    }

    public function getDrvExpiryDate(): ?int
    {
        return $this->drvExpiryDate;
    }

    public function setDrvExpiryDate(?int $drvExpiryDate): void
    {
        $this->drvExpiryDate = $drvExpiryDate;
    }

    public function getDrvOptionType(): ?string
    {
        return $this->drvOptionType;
    }

    public function setDrvOptionType(?string $drvOptionType): void
    {
        // Validate option type if needed
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
        return get_object_vars($this);
    }

    public function fromArray(array $data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}
