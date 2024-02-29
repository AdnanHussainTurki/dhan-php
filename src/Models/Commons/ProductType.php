<?php


namespace AdnanHussainTurki\Dhan\Models\Commons;

class ProductType
{


    const CNC = 'CNC';
    const INTRADAY = 'INTRADAY';
    const MARGIN = 'MARGIN';
    const MTF = 'MTF';
    const CO = 'CO';
    const BO = 'BO';

    public static function getProductTypes()
    {
        return [
            self::CNC,
            self::INTRADAY,
            self::MARGIN,
            self::MTF,
            self::CO,
            self::BO,
        ];
    }
    public static function validate(string $productType)
    {
        if (!in_array($productType, self::getProductTypes())) {
            throw new \Exception('Invalid Product Type. Acceptable Product Types: ' . implode(', ', self::getProductTypes()));
        }
    }
}
