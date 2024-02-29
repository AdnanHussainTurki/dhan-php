<?php

namespace AdnanHussainTurki\Dhan\Models\Order;

use InvalidArgumentException;
use AdnanHussainTurki\Dhan\Models\Commons\OrderStatus;
use AdnanHussainTurki\Dhan\Models\Commons\TransactionType;
use AdnanHussainTurki\Dhan\Models\Commons\ExchangeSegment;
use AdnanHussainTurki\Dhan\Models\Commons\ProductType;
use AdnanHussainTurki\Dhan\Models\Commons\OrderType;
use AdnanHussainTurki\Dhan\Models\Commons\OrderValidity;
use AdnanHussainTurki\Dhan\Models\Commons\LegName;
use DateTime;

class Order
{
    private string $dhanClientId;
    private string $orderId;
    private string $correlationId;
    private string $orderStatus;
    private string $transactionType;
    private string $exchangeSegment;
    private string $productType;
    private string $orderType;
    private string $validity;
    private string $tradingSymbol;
    private string $securityId;
    private int $quantity;
    private int $disclosedQuantity;
    private float $price;
    private ?float $triggerPrice = null;
    private bool $afterMarketOrder = false;
    private ?float $boProfitValue = null;
    private ?float $boStopLossValue = null;
    private ?string $legName = null;
    private string $createTime;
    private string $updateTime;
    private string $exchangeTime;
    private ?string $drvExpiryDate = null;
    private ?string $drvOptionType = null;
    private ?float $drvStrikePrice = null;
    private ?string $omsErrorCode = null;
    private ?string $omsErrorDescription = null;
    private ?int $filledQuantity = null;
    private ?string $algoId = null;

    private $required = ['orderId'];

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

    public function getCorrelationId(): string
    {
        return $this->correlationId;
    }

    public function setCorrelationId(string $correlationId): void
    {
        $this->correlationId = $correlationId;
    }

    public function getOrderStatus(): string
    {
        return $this->orderStatus;
    }

    public function setOrderStatus(string $orderStatus): void
    {
        OrderStatus::validate($orderStatus);
        $this->orderStatus = $orderStatus;
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

    public function getDisclosedQuantity(): int
    {
        return $this->disclosedQuantity;
    }

    public function setDisclosedQuantity(int $disclosedQuantity): void
    {
        $this->disclosedQuantity = $disclosedQuantity;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
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

    public function isAfterMarketOrder(): bool
    {
        return $this->afterMarketOrder;
    }

    public function setAfterMarketOrder(bool $afterMarketOrder): void
    {
        $this->afterMarketOrder = $afterMarketOrder;
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

    public function getLegName(): ?string
    {
        return $this->legName;
    }

    public function setLegName(?string $legName): void
    {
        LegName::validate($legName);
        $this->legName = $legName;
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

    public function getOmsErrorCode(): ?string
    {
        return $this->omsErrorCode;
    }

    public function setOmsErrorCode(?string $omsErrorCode): void
    {
        $this->omsErrorCode = $omsErrorCode;
    }

    public function getOmsErrorDescription(): ?string
    {
        return $this->omsErrorDescription;
    }

    public function setOmsErrorDescription(?string $omsErrorDescription): void
    {
        $this->omsErrorDescription = $omsErrorDescription;
    }

    public function getFilledQuantity(): ?int
    {
        return $this->filledQuantity;
    }

    public function setFilledQuantity(?int $filledQuantity): void
    {
        $this->filledQuantity = $filledQuantity;
    }

    public function getAlgoId(): ?string
    {
        return $this->algoId;
    }

    public function setAlgoId(?string $algoId): void
    {
        $this->algoId = $algoId;
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

    public function fromArray(array $data)
    {
        foreach ($data as $key => $value) {

            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function __toString()
    {
        return json_encode($this->toArray());
    }
}
