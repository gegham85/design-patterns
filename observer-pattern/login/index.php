<?php

interface Subject
{
    public function attach($observable);
    public function detach($observer);
    public function notify();
}

interface Observer
{
    public function handle();
}

class LogHandler implements Observer
{
    public function handle()
    {
        var_dump("log something important");
    }
}

class EmailNotifier implements Observer
{
    public function handle()
    {
        var_dump("Email to somebody");
    }
}
class LoginReporter implements Observer
{
    public function handle()
    {
        var_dump("This guy logged in");
    }
}

class Login implements Subject
{
    protected $observers = [];

    public function attach($observable)
    {
        if (is_array($observable)) {
            return $this->attachObservers($observable);
        }

        $this->observers[] = $observable;

        return $this;
    }

    private function attachObservers($observable)
    {
        foreach ($observable as $observer) {
            if (! $observer instanceof Observer) {
                throw new \Exception;
            }

            $this->attach($observer);
        }
    }

    public function detach($index)
    {
        unset($this->observers[$index]);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->handle();
        }
    }

    public function fire()
    {
        // perform the login

        $this->notify();
    }
}

$login = new Login();
$login->attach([
    new EmailNotifier,
    new LogHandler,
    new LoginReporter,
]);
// or
//$login->attach(new EmailNotifier)->attach(new LogHandler());

$login->fire();