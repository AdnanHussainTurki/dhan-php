<?php

use AdnanHussainTurki\Dhan\Dhan;
use AdnanHussainTurki\Dhan\Models\Commons\ExchangeSegment;
use AdnanHussainTurki\Dhan\Models\Commons\OrderType;
use AdnanHussainTurki\Dhan\Models\Commons\OrderValidity;
use AdnanHussainTurki\Dhan\Models\Commons\ProductType;
use AdnanHussainTurki\Dhan\Models\Commons\TransactionType;
use AdnanHussainTurki\Dhan\Models\Order\NewOrder;
use Dotenv\Dotenv;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$clientId = $_ENV['CLIENT_ID'];
$accessToken = $_ENV['ACCESS_TOKEN'];


echo "Client ID: $clientId\n";
echo "Access Token: " . substr($accessToken, 0, 100) . "...\n";

$dhan = new Dhan($clientId, $accessToken);
$orderManager = $dhan->order();

// Get all orders 
echo "\n\nAll Orders:\n";
$orders = $orderManager->getOrders();
foreach ($orders as $order) {
    echo "Order: " . strval($order) . "\n";
}
echo "\n\n";

echo "\n\nGet specific order:\n";
$orderId = "472402292124";
$order = $orderManager->getOrderByOrderId($orderId);
echo "Order: " . strval($order) . "\n";
echo "\n\n";

// Place an order
echo "\nPlace Order:\n";
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
