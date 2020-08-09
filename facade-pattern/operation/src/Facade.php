<?php namespace Acme;

class Facade
{
    protected $subSystem1;

    protected $subSystem2;

    public function __construct($subSystem1, $subSystem2)
    {
        $this->subSystem1 = $subSystem1 ?: new SubSystem1;
        $this->subSystem2 = $subSystem2 ?: new SubSystem2;
    }

    public function operation() : string
    {
        $result = "Facade initializes subsystem:\n";
        $result .= $this->subSystem1->operation1();
        $result .= $this->subSystem2->operation1();
        $result .= "Facade orders subsystems to perform the action:\n";
        $result .= $this->subSystem1->operationN();
        $result .= $this->subSystem2->operationZ();

        return $result;
    }
}
