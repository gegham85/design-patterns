<?php namespace Acme;


class Adapter implements USASocketInterface
{
    protected $socket;

    public function __construct(EuropeanSocketInterface $socket)
    {
        $this->socket = $socket;
    }

    public function live()
    {
        return $this->socket->live();
    }

    public function neutral()
    {
        return $this->socket->neutral();
    }

    public function voltage()
    {
        return 110;
    }
}