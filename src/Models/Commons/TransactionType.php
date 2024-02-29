<?php

namespace AdnanHussainTurki\Dhan\Models\Commons;

class TransactionType
{
    const BUY = 'BUY';
    const SELL = 'SELL';

    public static function getTransactionTypes()
    {
        return [
            self::BUY,
            self::SELL,
        ];
    }
    public static function validate(string $transactionType)
    {
        if (!in_array($transactionType, self::getTransactionTypes())) {
            throw new \Exception('Invalid Transaction Type. Acceptable values: ' . implode(', ', self::getTransactionTypes()));
        }
    }
}
