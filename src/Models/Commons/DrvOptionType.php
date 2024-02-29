<?php


namespace AdnanHussainTurki\Dhan\Models\Commons;

class DrvOptionType
{
    const CALL = 'CALL';
    const PUT = 'PUT';

    public static function getDrvOptionTypes()
    {
        return [
            self::CALL,
            self::PUT,
        ];
    }
    public static function validate(string $drvOptionType)
    {
        if (!in_array($drvOptionType, self::getDrvOptionTypes())) {
            throw new \Exception('Invalid DRV Option Type. Acceptable DRV Option Type: ' . implode(', ', self::getDrvOptionTypes()));
        }
    }
}
