<?php namespace Acme;

class Produce implements Workshop
{
    public function work()
    {
        echo " Produced.";
    }
}
