<?php


namespace AdnanHussainTurki\Dhan\Models\Commons;

class OrderType
{


    // LIMIT  MARKET  STOP_LOSS  STOP_LOSS_MARKET
    const LIMIT = 'LIMIT';
    const MARKET = 'MARKET';
    const STOP_LOSS = 'STOP_LOSS';
    const STOP_LOSS_MARKET = 'STOP_LOSS_MARKET';

    public static function getOrderTypes()
    {
        return [
            self::LIMIT,
            self::MARKET,
            self::STOP_LOSS,
            self::STOP_LOSS_MARKET,
        ];
    }
    public static function validate(string $orderType)
    {
        if (!in_array($orderType, self::getOrderTypes())) {
            throw new \Exception('Invalid Order Type. Acceptable Order Types: ' . implode(', ', self::getOrderTypes()));
        }
    }
}
