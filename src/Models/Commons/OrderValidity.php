<?php


namespace AdnanHussainTurki\Dhan\Models\Commons;

class OrderValidity
{


    //    DAY IOC
    const DAY = 'DAY';
    const IOC = 'IOC';

    public static function getOrderValidities()
    {
        return [
            self::DAY,
            self::IOC,
        ];
    }
    public static function validate(string $orderValidity)
    {
        if (!in_array($orderValidity, self::getOrderValidities())) {
            throw new \Exception('Invalid Order Validity. Acceptable Order Validity: ' . implode(', ', self::getOrderValidities()));
        }
    }
}
