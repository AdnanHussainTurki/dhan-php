<?php

namespace AdnanHussainTurki\Dhan\Models\Order;

use InvalidArgumentException;
use AdnanHussainTurki\Dhan\Models\Commons\OrderStatus;

class MiniOrder
{
    private string $orderId;
    private string $orderStatus;

    private $required = ['orderId', 'orderStatus'];

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
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
