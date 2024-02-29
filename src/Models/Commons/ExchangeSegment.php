<?php

namespace AdnanHussainTurki\Dhan\Models\Commons;

class ExchangeSegment
{

    const NSE_EQ = 'NSE_EQ';
    const NSE_FNO = 'NSE_FNO';
    const NSE_CURRENCY = 'NSE_CURRENCY';
    const BSE_EQ = 'BSE_EQ';
    const BSE_FNO = 'BSE_FNO';
    const BSE_CURRENCY = 'BSE_CURRENCY';
    const MCX_COMM = 'MCX_COMM';

    public static function getExchangeSegments()
    {
        return [
            self::NSE_EQ,
            self::NSE_FNO,
            self::NSE_CURRENCY,
            self::BSE_EQ,
            self::BSE_FNO,
            self::BSE_CURRENCY,
            self::MCX_COMM,
        ];
    }
    public static function validate(string $exchangeSegment)
    {
        if (!in_array($exchangeSegment, self::getExchangeSegments())) {
            throw new \Exception('Invalid Exchange Segment. Acceptable Segments: ' . implode(', ', self::getExchangeSegments()));
        }
    }
}
