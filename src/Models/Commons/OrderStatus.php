<?php


namespace AdnanHussainTurki\Dhan\Models\Commons;

class OrderStatus
{


    // TRANSIT PENDING REJECTED CANCELLED TRADED EXPIRED
    const TRANSIT = 'TRANSIT';
    const PENDING = 'PENDING';
    const REJECTED = 'REJECTED';
    const CANCELLED = 'CANCELLED';
    const TRADED = 'TRADED';
    const EXPIRED = 'EXPIRED';

    public static function getOrderStatuses()
    {
        return [
            self::TRANSIT,
            self::PENDING,
            self::REJECTED,
            self::CANCELLED,
            self::TRADED,
            self::EXPIRED,
        ];
    }
    public static function validate(string $orderStatus)
    {
        if (!in_array($orderStatus, self::getOrderStatuses())) {
            throw new \Exception('Invalid Order Status. Acceptable Order Status: ' . implode(', ', self::getOrderStatuses()));
        }
    }
}
