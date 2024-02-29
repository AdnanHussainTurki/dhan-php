<?php


namespace AdnanHussainTurki\Dhan;

use AdnanHussainTurki\Dhan\Managers\Order;

class Dhan
{
    protected $clientId = null;
    protected $accessToken = null;
    public function __construct($clientId, $accessToken)
    {
        $this->clientId = $clientId;
        $this->accessToken = $accessToken;
    }
    public function order()
    {
        return new Order($this->clientId, $this->accessToken);
    }
}
