<?php

class HomeStatus
{
    public $alarmOn = false;
    public $locked = true;
    public $lightsOff = true;
}

abstract class HomeChecker
{
    protected $successor;

    public function succeedWith(HomeChecker $succesor)
    {
        $this->successor = $succesor;
    }

    public function next(HomeStatus $home)
    {
        if ($this->successor) {
            $this->successor->check($home);
        }
    }

    public abstract function check(HomeStatus $homeStatus);
}


class Locks extends HomeChecker
{
    public function check(HomeStatus $homeStatus)
    {
        if (! $homeStatus->locked) {
            throw new \Exception("it is unlocked! alert!");
        }

        $this->next($homeStatus);
    }
}

class Lights extends HomeChecker
{
    public function check(HomeStatus $homeStatus)
    {
        if (! $homeStatus->lightsOff) {
            throw new \Exception("Lights are not off! alert!");
        }

        $this->next($homeStatus);
    }
}

class Alarm extends HomeChecker
{
    public function check(HomeStatus $homeStatus)
    {
        if (! $homeStatus->alarmOn) {
            throw new \Exception("Alarms are off! alert!");
        }

        $this->next($homeStatus);
    }
}

$lock = new Locks();
$light = new Lights();
$alarm = new Alarm();

$lock->succeedWith($light);
$light->succeedWith($alarm);

try {
    $lock->check(new homestatus());
} catch (\Exception $exception) {
    echo "error: {$exception->getMessage()} \n";
}
