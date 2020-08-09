<?php namespace Acme;

class TurkeySub extends Sub
{
    protected function addPrimaryToppings()
    {
        var_dump("add some Turkey");

        return $this;
    }
}
