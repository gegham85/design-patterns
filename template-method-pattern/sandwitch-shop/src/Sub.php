<?php namespace Acme;

abstract class Sub
{
    final public function make()
    {
        $this->layBread()
            ->addLettuce()
            ->addPrimaryToppings()
            ->addVineger();
    }

    protected function layBread()
    {
        var_dump("laying down the bread");

        return $this;
    }

    protected function addLettuce()
    {
        var_dump("add some lettuce");

        return $this;
    }

    protected function addVineger()
    {
        var_dump("add some vineger");

        return $this;
    }

    abstract protected function addPrimaryToppings();
}
