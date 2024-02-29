# adnanhussainturki/dhan-php

PHP Wrapper for Dhan Trading API

## Installation

Install the package via Composer:

    composer require adnanhussainturki/dhan-php

## Requirements

- PHP >= 7.4
- [Guzzle HTTP client](https://github.com/guzzle/guzzle)

## Usage

Initialize the Dhan client:

    // Initialize Dhan client
    $dhan = new Dhan($clientId, $accessToken);

Example usage:

    // Place an order
    $newOrder = new NewOrder();
    $newOrder->setTransactionType(TransactionType::BUY);
    $newOrder->setSecurityId("505685"); // TAPARIA
    $newOrder->setQuantity(1);
    $newOrder->setPrice(3.21);
    $newOrder->setOrderType(OrderType::LIMIT);
    $newOrder->setExchangeSegment(ExchangeSegment::BSE_EQ);
    $newOrder->setProductType(ProductType::CNC);
    $newOrder->setValidity(OrderValidity::DAY);

    try {
        $orderManager->placeOrder($newOrder);
    } catch (\Throwable $th) {
        echo "ERROR: " . $th->getMessage() . "\n";
    }

## License

MIT License

## Author

Adnan Hussain Turki <adnanhussainturki@gmail.com>
