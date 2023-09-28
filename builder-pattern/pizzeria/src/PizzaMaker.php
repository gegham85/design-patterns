<?php

namespace src;

class PizzaMaker
{
    public function makePizza(PizzaBuilder $builder, $size)
    {
        $builder->setSize($size);
        $builder->addCheese();
        return $builder->build();
    }
}
