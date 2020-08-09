<?php namespace Acme;

class Socket implements EuropeanSocketInterface
{
    public function earth()
    {
        return 0;
    }

    public function live()
    {
        return 1;
    }

    public function neutral()
    {
        return -1;
    }

    public function voltage()
    {
        return 230;
    }
}