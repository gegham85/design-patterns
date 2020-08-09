<?php namespace Acme;

class LenovaBios implements Bios
{
    public function execute()
    {
        var_dump("execute LenovaBios");
    }

    public function launch(OperatingSystem $os)
    {
        var_dump("launch LenovaBios");
    }

    public function powerDown()
    {
        var_dump("power down LenovaBios");
    }

    public function waitForKeyPress()
    {
        var_dump("waiting for key press LenovaBios");
    }
}
