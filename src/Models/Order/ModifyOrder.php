<?php

namespace AdnanHussainTurki\Dhan\Models\Order;

use AdnanHussainTurki\Dhan\Models\Commons\OrderType;
use AdnanHussainTurki\Dhan\Models\Commons\OrderValidity;
use InvalidArgumentException;

class ModifyOrder
{
    private string $dhanClientId;
    private string $orderId;
    private string $orderType;
    private ?string $legName = null;
    private int $quantity;
    private float $price;
    private ?int $disclosedQuantity = null;
    private ?float $triggerPrice = null;
    private string $validity;

    private $required = ['orderId', 'orderType', 'quantity', 'price', 'validity'];

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

    public function getOrderType(): string
    {
        return $this->orderType;
    }

    public function setOrderType(string $orderType): void
    {
        OrderType::validate($orderType);
        $this->orderType = $orderType;
    }

    public function getLegName(): ?string
    {
        return $this->legName;
    }

    public function setLegName(?string $legName): void
    {
        $validLegs = ['ENTRY_LEG', 'TARGET_LEG', 'STOP_LOSS_LEG'];
        if ($legName !== null && !in_array($legName, $validLegs)) {
            throw new InvalidArgumentException('Invalid leg name.');
        }
        $this->legName = $legName;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getDisclosedQuantity(): ?int
    {
        return $this->disclosedQuantity;
    }

    public function setDisclosedQuantity(?int $disclosedQuantity): void
    {
        $this->disclosedQuantity = $disclosedQuantity;
    }

    public function getTriggerPrice(): ?float
    {
        return $this->triggerPrice;
    }

    public function setTriggerPrice(?float $triggerPrice): void
    {
        $this->triggerPrice = $triggerPrice;
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
