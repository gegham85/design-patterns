<?php

interface MobileAlertState
{
    public function alert(AlertStateContext $ctx);
}

class AlertStateContext
{
    private $currentState;

    public function __construct()
    {
        $this->currentState = new Vibration();
    }

    public function setState(MobileAlertState $state)
    {
        $this->currentState = $state;
    }

    public function alert()
    {
        $this->currentState->alert($this);
    }
}

class Vibration implements MobileAlertState
{
    public function alert(AlertStateContext $ctx)
    {
        echo "Vibration...\n";
    }
}

class Silent implements MobileAlertState
{
    public function alert(AlertStateContext $ctx)
    {
        echo "Silent..\n";
    }
}

$stateContext = new AlertStateContext();
$stateContext->alert();
$stateContext->alert();
$stateContext->setState(new Silent());
$stateContext->alert();
$stateContext->alert();
$stateContext->alert();
