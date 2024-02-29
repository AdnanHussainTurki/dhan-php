<?php

namespace AdnanHussainTurki\Dhan\Managers;

use AdnanHussainTurki\Dhan\Exceptions\DhanException;
use AdnanHussainTurki\Dhan\Models\Order\MiniOrder;
use AdnanHussainTurki\Dhan\Models\Order\ModifyOrder;
use AdnanHussainTurki\Dhan\Models\Order\NewOrder;
use AdnanHussainTurki\Dhan\Models\Order\Order as OrderOrder;
use AdnanHussainTurki\Dhan\Models\Order\Trade;
use GuzzleHttp\Client;



class Order
{


    private $baseUrl = 'https://api.dhan.co/';
    private $accessToken;
    private $clientId;

    private $client;

    public function __construct($clientId, $accessToken)
    {
        $this->accessToken = $accessToken;
        $this->clientId = $clientId;
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Content-Type' => 'application/json',
                'access-token' => $this->accessToken,
            ]
        ]);
    }

    public function placeOrder(NewOrder $order): MiniOrder
    {
        $order->setDhanClientId($this->clientId);
        $orderResponse = $this->sendRequest('POST', 'orders', $order->toArray());

        $miniOrder = new MiniOrder();
        $miniOrder->fromArray($orderResponse);
        try {
            $miniOrder->validate();
        } catch (\Throwable $th) {
            throw new DhanException($orderResponse);
        }
        return $miniOrder;
    }

    public function modifyOrder(string $orderId, ModifyOrder $order): MiniOrder
    {
        $order->setDhanClientId($this->clientId);
        $orderResponse = $this->sendRequest('PUT', "orders/{$orderId}", $order->toArray());
        $miniOrder = new MiniOrder();
        $miniOrder->fromArray($orderResponse);
        try {
            $miniOrder->validate();
        } catch (\Throwable $th) {
            throw new DhanException($orderResponse);
        }
        return $miniOrder;
    }

    public function cancelOrder($orderId): MiniOrder
    {
        $orderResponse =  $this->sendRequest('DELETE', "orders/{$orderId}");
        $miniOrder = new MiniOrder();
        $miniOrder->fromArray($orderResponse);
        try {
            $miniOrder->validate();
        } catch (\Throwable $th) {
            throw new DhanException($orderResponse);
        }
        return $miniOrder;
    }

    public function sliceOrder(NewOrder $order): array
    {
        $order->setDhanClientId($this->clientId);

        $orderResponses =  $this->sendRequest('POST', "orders/slicing", $order->toArray());
        $miniOrders = [];
        foreach ($orderResponses as $orderResponse) {
            $miniOrder = new MiniOrder();
            $miniOrder->fromArray($orderResponse);
            $miniOrders[] = $miniOrder;
            try {
                $miniOrder->validate();
            } catch (\Throwable $th) {
                throw new DhanException($orderResponse);
            }
        }
        return $miniOrders;
    }

    public function getOrders(): array
    {
        $orderResponses =  $this->sendRequest('GET', 'orders');
        $orders = [];
        foreach ($orderResponses as $orderResponse) {
            $order = new \AdnanHussainTurki\Dhan\Models\Order\Order();
            $order->fromArray($orderResponse);

            $orders[] = $order;
        }
        return $orders;
    }

    public function getOrderByOrderId(string $orderId): OrderOrder
    {
        $orderResponse =  $this->sendRequest('GET', "orders/{$orderId}");
        $order = new OrderOrder();
        $order->fromArray($orderResponse);
        try {
            $order->validate();
        } catch (\Throwable $th) {
            throw new DhanException($orderResponse);
        }
        return $order;
    }


    public function getOrderStatusByCorrelationId(string $correlationId): OrderOrder
    {
        $orderResponse = $this->sendRequest('GET', "orders/external/{$correlationId}");
        $order = new OrderOrder();
        $order->fromArray($orderResponse);
        try {
            $order->validate();
        } catch (\Throwable $th) {
            throw new DhanException($orderResponse);
        }
        return $order;
    }

    public function getTradeList(): array
    {
        $orderResponses =  $this->sendRequest('GET', 'trades');
        $trades = [];
        foreach ($orderResponses as $orderResponse) {
            $trade = new Trade();
            $trade->fromArray($orderResponse);
            $trades[] = $trade;
        }
        return $trades;
    }

    public function getTradeDetailsByOrderId(string  $orderId): Trade
    {
        $orderResponse =  $this->sendRequest('GET', "trades/{$orderId}");
        $trade = new Trade();
        $trade->fromArray($orderResponse);
        try {
            $trade->validate();
        } catch (\Throwable $th) {
            throw new DhanException($orderResponse);
        }
        return $trade;
    }

    private function sendRequest($method, $endpoint, $data = [])
    {
        try {
            $response = $this->client->request($method, $endpoint, ['json' => $data]);
            // var_dump(json_decode($response->getBody()));
            return json_decode($response->getBody(), true);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            throw new DhanException(json_decode($e->getResponse()->getBody(), true));
        }
    }
}
