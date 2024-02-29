<?php


namespace AdnanHussainTurki\Dhan\Models\Commons;

class AmoTime
{

    const OPEN = 'OPEN';
    const OPEN_30 = 'OPEN_30';
    const OPEN_60 = 'OPEN_60';

    public static function getAmoTimes()
    {
        return [
            self::OPEN,
            self::OPEN_30,
            self::OPEN_60,
        ];
    }
    public static function validate(string $amoTime)
    {
        if (!in_array($amoTime, self::getAmoTimes())) {
            throw new \Exception('Invalid AMO Time. Acceptable AMO Time: ' . implode(', ', self::getAmoTimes()));
        }
    }
}
