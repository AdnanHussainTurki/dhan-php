<?php


namespace AdnanHussainTurki\Dhan\Models\Commons;

class LegName
{
    // ENTRY_LEG TARGET_LEG STOP_LOSS_LEG
    const ENTRY_LEG = 'ENTRY_LEG';
    const TARGET_LEG = 'TARGET_LEG';
    const STOP_LOSS_LEG = 'STOP_LOSS_LEG';

    public static function getLegNames()
    {
        return [
            self::ENTRY_LEG,
            self::TARGET_LEG,
            self::STOP_LOSS_LEG,
        ];
    }
    public static function validate(string $legName)
    {
        if (!in_array($legName, self::getLegNames())) {
            throw new \Exception('Invalid Leg Names. Acceptable Leg Names: ' . implode(', ', self::getLegNames()));
        }
    }
}
